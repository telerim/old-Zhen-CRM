<?php
App::uses('AppController', 'Controller');
/**
 * EventsTags Controller
 *
 * @property EventsTag $EventsTag
 */
class EventsTagsController extends AppController {


    var $filters = array (  
            'index' => array (  
                'EventsTag' => array (
                    'EventsTag.name',  
                )  
            )  
    );  

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->EventsTag->recursive = 0;
		$this->set('eventsTags', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->EventsTag->id = $id;
		if (!$this->EventsTag->exists()) {
			throw new NotFoundException(__('Invalid events tag'));
		}
		$this->set('eventsTag', $this->EventsTag->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EventsTag->create();
			if ($this->EventsTag->save($this->request->data)) {
				$this->Session->setFlash(__('The events tag has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The events tag could not be saved. Please, try again.'));
			}
		}
		$trparams = $this->params['named'];
		foreach ($trparams as $model=>$id) {
		        $this->request->data['EventsTag'][$model . '_id'] = $id;
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null, $type = null) {
		$this->EventsTag->id = $id;
		if (!$this->EventsTag->exists()) {
			throw new NotFoundException(__('Invalid events tag'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($type === 'copy') {
				unset($this->request->data['EventsTag']['id']);
				$this->EventsTag->create();
			}
			if ($this->EventsTag->save($this->request->data)) {
				$this->Session->setFlash(__('The events tag has been saved'));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The events tag could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->EventsTag->read(null, $id);
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
		$this->EventsTag->id = $id;
		if (!$this->EventsTag->exists()) {
			throw new NotFoundException(__('Invalid events tag'));
		}
		if ($this->EventsTag->delete()) {
			$this->Session->setFlash(__('Events tag deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Events tag was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}
