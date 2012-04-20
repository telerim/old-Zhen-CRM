<?php
App::uses('AppController', 'Controller');
/**
 * EventsUsers Controller
 *
 * @property EventsUser $EventsUser
 */
class EventsUsersController extends AppController {


    var $filters = array (  
            'index' => array (  
                'EventsUser' => array (
                    'EventsUser.name',  
                )  
            )  
    );  

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->EventsUser->recursive = 0;
		$this->set('eventsUsers', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->EventsUser->id = $id;
		if (!$this->EventsUser->exists()) {
			throw new NotFoundException(__('Invalid events user'));
		}
		$this->set('eventsUser', $this->EventsUser->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EventsUser->create();
			if ($this->EventsUser->save($this->request->data)) {
				$this->Session->setFlash(__('The events user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The events user could not be saved. Please, try again.'));
			}
		}
		$trparams = $this->params['named'];
		foreach ($trparams as $model=>$id) {
		        $this->request->data['EventsUser'][$model . '_id'] = $id;
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null, $type = null) {
		$this->EventsUser->id = $id;
		if (!$this->EventsUser->exists()) {
			throw new NotFoundException(__('Invalid events user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($type === 'copy') {
				unset($this->request->data['EventsUser']['id']);
				$this->EventsUser->create();
			}
			if ($this->EventsUser->save($this->request->data)) {
				$this->Session->setFlash(__('The events user has been saved'));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The events user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->EventsUser->read(null, $id);
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
		$this->EventsUser->id = $id;
		if (!$this->EventsUser->exists()) {
			throw new NotFoundException(__('Invalid events user'));
		}
		if ($this->EventsUser->delete()) {
			$this->Session->setFlash(__('Events user deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Events user was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}
