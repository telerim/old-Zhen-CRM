<?php
App::uses('AppController', 'Controller');
/**
 * DealNotes Controller
 *
 * @property DealNote $DealNote
 */
class DealNotesController extends AppController {


    var $filters = array (  
            'index' => array (  
                'DealNote' => array (
                    'DealNote.name',  
                )  
            )  
    );  

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->DealNote->recursive = 0;
		$this->set('dealNotes', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->DealNote->id = $id;
		if (!$this->DealNote->exists()) {
			throw new NotFoundException(__('Invalid deal note'));
		}
		$this->set('dealNote', $this->DealNote->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DealNote->create();
			if ($this->DealNote->save($this->request->data)) {
				$this->Session->setFlash(__('The deal note has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The deal note could not be saved. Please, try again.'));
			}
		}
		$trparams = $this->params['named'];
		foreach ($trparams as $model=>$id) {
		        $this->request->data['DealNote'][$model . '_id'] = $id;
		}
		$deals = $this->DealNote->Deal->find('list');
		$this->set(compact('deals'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null, $type = null) {
		$this->DealNote->id = $id;
		if (!$this->DealNote->exists()) {
			throw new NotFoundException(__('Invalid deal note'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($type === 'copy') {
				unset($this->request->data['DealNote']['id']);
				$this->DealNote->create();
			}
			if ($this->DealNote->save($this->request->data)) {
				$this->Session->setFlash(__('The deal note has been saved'));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The deal note could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->DealNote->read(null, $id);
		}
		$deals = $this->DealNote->Deal->find('list');
		$this->set(compact('deals'));
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
		$this->DealNote->id = $id;
		if (!$this->DealNote->exists()) {
			throw new NotFoundException(__('Invalid deal note'));
		}
		if ($this->DealNote->delete()) {
			$this->Session->setFlash(__('Deal note deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Deal note was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}
