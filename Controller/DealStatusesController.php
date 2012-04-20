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
		$trparams = $this->params['named'];
		foreach ($trparams as $model=>$id) {
		        $this->request->data['DealStatus'][$model . '_id'] = $id;
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
