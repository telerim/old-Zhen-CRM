<?php
App::uses('AppController', 'Controller');
/**
 * ContactStatuses Controller
 *
 * @property ContactStatus $ContactStatus
 */
class ContactStatusesController extends AppController {


    var $filters = array (  
            'index' => array (  
                'ContactStatus' => array (
                    'ContactStatus.name',  
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
		$trparams = $this->params['named'];
		foreach ($trparams as $model=>$id) {
		        $this->request->data['ContactStatus'][$model . '_id'] = $id;
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
