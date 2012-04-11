<?php
App::uses('AppController', 'Controller');
/**
 * Contacts Controller
 *
 * @property Contact $Contact
 */
class ContactsController extends AppController {


    var $filters = array (  
            'index' => array (  
                'Contact' => array (
                    'Contact.name',  
                )  
            )  
    );  

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Contact->recursive = 0;
		$this->set('contacts', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Contact->id = $id;
		if (!$this->Contact->exists()) {
			throw new NotFoundException(__('Invalid contact'));
		}
		$this->set('contact', $this->Contact->read(null, $id));
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
			$this->Contact->create();
			if ($this->Contact->save($this->request->data)) {
				$this->Session->setFlash(__('The contact has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contact could not be saved. Please, try again.'));
			}
		}
		$contactStatuses = $this->Contact->ContactStatus->find('list');
		$users = $this->Contact->User->find('list');
		$tags = $this->Contact->Tag->find('list');
		$this->set(compact('contactStatuses', 'users', 'tags'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null, $type = null) {
		$this->Contact->id = $id;
		if (!$this->Contact->exists()) {
			throw new NotFoundException(__('Invalid contact'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($type === 'copy') {
				unset($this->request->data['Contact']['id']);
				$this->Contact->create();
			}
			if ($this->Contact->save($this->request->data)) {
				$this->Session->setFlash(__('The contact has been saved'));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The contact could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Contact->read(null, $id);
		}
		$contactStatuses = $this->Contact->ContactStatus->find('list');
		$users = $this->Contact->User->find('list');
		$tags = $this->Contact->Tag->find('list');
		$this->set(compact('contactStatuses', 'users', 'tags'));
/* TR: Authorization */
                $currentUser = $this->UserAuth->getUser();
                $currentUserId = $currentUser['User']['id'];
                $ownerId = $this->request->data['Contact']['user_id'];
                $isOwner = ($currentUserId == $ownerId);
                $isAdmin = ($currentUser['UserGroup']['id'] == 1);
                if (!($isOwner || $isAdmin)) {
                        $this->Session->setFlash(__('You do not have the permissions to edit this Contact. Please ask the owner.'));
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
		$this->Contact->id = $id;
		if (!$this->Contact->exists()) {
			throw new NotFoundException(__('Invalid contact'));
		}
		if ($this->Contact->delete()) {
			$this->Session->setFlash(__('Contact deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Contact was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}
