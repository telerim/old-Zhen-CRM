<?php
App::uses('AppController', 'Controller');
/**
 * DealStatuses Controller
 *
 * @property DealStatus $DealStatus
 */
class DealStatusesController extends AppController {


    var $filters = array (  
            'index' => array (  
                'DealStatus' => array (
                    'DealStatus.name',  
                )  
            )  
    );  

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->DealStatus->recursive = 0;
		$this->set('dealStatuses', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->DealStatus->id = $id;
		if (!$this->DealStatus->exists()) {
			throw new NotFoundException(__('Invalid deal status'));
		}
		$this->set('dealStatus', $this->DealStatus->read(null, $id));
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
			$this->DealStatus->create();
			if ($this->DealStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The deal status has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The deal status could not be saved. Please, try again.'));
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
		$this->DealStatus->id = $id;
		if (!$this->DealStatus->exists()) {
			throw new NotFoundException(__('Invalid deal status'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($type === 'copy') {
				unset($this->request->data['DealStatus']['id']);
				$this->DealStatus->create();
			}
			if ($this->DealStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The deal status has been saved'));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The deal status could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->DealStatus->read(null, $id);
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
		$this->DealStatus->id = $id;
		if (!$this->DealStatus->exists()) {
			throw new NotFoundException(__('Invalid deal status'));
		}
		if ($this->DealStatus->delete()) {
			$this->Session->setFlash(__('Deal status deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Deal status was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}
