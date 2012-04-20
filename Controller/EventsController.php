<?php
App::uses('AppController', 'Controller');
/**
 * Events Controller
 *
 * @property Event $Event
 */
class EventsController extends AppController {


    var $filters = array (  
            'index' => array (  
                'Event' => array (
                    'Event.name',  
                )  
            )  
    );  

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Event->recursive = 0;
		$this->set('events', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Event->id = $id;
		if (!$this->Event->exists()) {
			throw new NotFoundException(__('Invalid event'));
		}
		$this->set('event', $this->Event->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Event->create();
			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash(__('The event has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.'));
			}
		}
		$trparams = $this->params['named'];
		foreach ($trparams as $model=>$id) {
		        $this->request->data['Event'][$model . '_id'] = $id;
		}
		$eventTypes = $this->Event->EventType->find('list');
		$tags = $this->Event->Tag->find('list');
		$users = $this->Event->User->find('list');
		$this->set(compact('eventTypes', 'tags', 'users'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null, $type = null) {
		$this->Event->id = $id;
		if (!$this->Event->exists()) {
			throw new NotFoundException(__('Invalid event'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($type === 'copy') {
				unset($this->request->data['Event']['id']);
				$this->Event->create();
			}
			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash(__('The event has been saved'));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Event->read(null, $id);
		}
		$eventTypes = $this->Event->EventType->find('list');
		$tags = $this->Event->Tag->find('list');
		$users = $this->Event->User->find('list');
		$this->set(compact('eventTypes', 'tags', 'users'));
/* TR: Authorization */
                $currentUser = $this->UserAuth->getUser();
                $currentUserId = $currentUser['User']['id'];
                $ownerId = $this->request->data['Event']['user_id'];
                $isOwner = ($currentUserId == $ownerId);
                $isAdmin = ($currentUser['UserGroup']['id'] == 1);
                if (!($isOwner || $isAdmin)) {
                        $this->Session->setFlash(__('You do not have the permissions to edit this Event. Please ask the owner.'));
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
		$this->Event->id = $id;
		if (!$this->Event->exists()) {
			throw new NotFoundException(__('Invalid event'));
		}
		if ($this->Event->delete()) {
			$this->Session->setFlash(__('Event deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Event was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}
