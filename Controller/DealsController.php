<?php
App::uses('AppController', 'Controller');
/**
 * Deals Controller
 *
 * @property Deal $Deal
 */
class DealsController extends AppController {


    var $filters = array (  
            'index' => array (  
                'Deal' => array (
                    'Deal.name',  
                )  
            )  
    );  

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Deal->recursive = 0;
		$this->set('deals', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Deal->id = $id;
		if (!$this->Deal->exists()) {
			throw new NotFoundException(__('Invalid deal'));
		}
		$this->set('deal', $this->Deal->read(null, $id));
		/* If users are in array, then add this ownership check */
		if (in_array("'users'", $compact)) {
		echo "/* TR: Authorization */
                \$currentUser = \$this->UserAuth->getUser();
                \$currentUserId = \$currentUser['User']['id'];
                \$ownerId = \$this->request->data['$currentModelName']['user_id'];
                \$isOwner = (\$currentUserId == \$ownerId);
                \$isAdmin = (\$currentUser['UserGroup']['id'] == 1);
                if (!(\$isOwner || \$isAdmin)) {
                        \$this->Session->setFlash(__('You do not have the permissions to edit this $currentModelName. Please ask the owner.'));
                        \$this->redirect(array('action' => 'index'));
                }";
		}
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Deal->create();
			if ($this->Deal->save($this->request->data)) {
				$this->Session->setFlash(__('The deal has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The deal could not be saved. Please, try again.'));
			}
		}
		$contacts = $this->Deal->Contact->find('list');
		$users = $this->Deal->User->find('list');
		$dealStatuses = $this->Deal->DealStatus->find('list');
		$tags = $this->Deal->Tag->find('list');
		$this->set(compact('contacts', 'users', 'dealStatuses', 'tags'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null, $type = null) {
		$this->Deal->id = $id;
		if (!$this->Deal->exists()) {
			throw new NotFoundException(__('Invalid deal'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($type === 'copy') {
				unset($this->request->data['Deal']['id']);
				$this->Deal->create();
			}
			if ($this->Deal->save($this->request->data)) {
				$this->Session->setFlash(__('The deal has been saved'));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The deal could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Deal->read(null, $id);
		}
		$contacts = $this->Deal->Contact->find('list');
		$users = $this->Deal->User->find('list');
		$dealStatuses = $this->Deal->DealStatus->find('list');
		$tags = $this->Deal->Tag->find('list');
		$this->set(compact('contacts', 'users', 'dealStatuses', 'tags'));
/* TR: Authorization */
                $currentUser = $this->UserAuth->getUser();
                $currentUserId = $currentUser['User']['id'];
                $ownerId = $this->request->data['Deal']['user_id'];
                $isOwner = ($currentUserId == $ownerId);
                $isAdmin = ($currentUser['UserGroup']['id'] == 1);
                if (!($isOwner || $isAdmin)) {
                        $this->Session->setFlash(__('You do not have the permissions to edit this Deal. Please ask the owner.'));
                        $this->redirect(array('action' => 'index'));
                }	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Deal->id = $id;
		if (!$this->Deal->exists()) {
			throw new NotFoundException(__('Invalid deal'));
		}
		if ($this->Deal->delete()) {
			$this->Session->setFlash(__('Deal deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Deal was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}
