<?php
App::uses('AppController', 'Controller');
/**
 * ContactStatuses Controller
 *
 * @property ContactStatus $ContactStatus
 */
class ContactStatusesController extends AppController {


    var $filters = array  
        (  
            'index' => array  
            (  
                'ContactStatus' => array  
                (
                    'ContactStatus.name',  
                    'ContactStatus.description'  
                )  
            )  
        );  

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ContactStatus->recursive = 0;
		$this->set('contactStatuses', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ContactStatus->id = $id;
		if (!$this->ContactStatus->exists()) {
			throw new NotFoundException(__('Invalid contact status'));
		}
		$this->set('contactStatus', $this->ContactStatus->read(null, $id));
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
			$this->ContactStatus->create();
			if ($this->ContactStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The contact status has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contact status could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null, $type = null) {
		$this->ContactStatus->id = $id;
		if (!$this->ContactStatus->exists()) {
			throw new NotFoundException(__('Invalid contact status'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($type === 'copy') {
				unset($this->request->data['ContactStatus']['id']);
				$this->ContactStatus->create();
			}
			if ($this->ContactStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The contact status has been saved'));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The contact status could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ContactStatus->read(null, $id);
		}
	}

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
		$this->ContactStatus->id = $id;
		if (!$this->ContactStatus->exists()) {
			throw new NotFoundException(__('Invalid contact status'));
		}
		if ($this->ContactStatus->delete()) {
			$this->Session->setFlash(__('Contact status deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Contact status was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}
