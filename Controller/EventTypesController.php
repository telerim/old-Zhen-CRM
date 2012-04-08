<?php
App::uses('AppController', 'Controller');
/**
 * EventTypes Controller
 *
 * @property EventType $EventType
 */
class EventTypesController extends AppController {


    var $filters = array  
        (  
            'index' => array  
            (  
                'EventType' => array  
                (
                    'EventType.name',  
                    'EventType.description'  
                )  
            )  
        );  

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->EventType->recursive = 0;
		$this->set('eventTypes', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->EventType->id = $id;
		if (!$this->EventType->exists()) {
			throw new NotFoundException(__('Invalid event type'));
		}
		$this->set('eventType', $this->EventType->read(null, $id));
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
			$this->EventType->create();
			if ($this->EventType->save($this->request->data)) {
				$this->Session->setFlash(__('The event type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event type could not be saved. Please, try again.'));
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
		$this->EventType->id = $id;
		if (!$this->EventType->exists()) {
			throw new NotFoundException(__('Invalid event type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($type === 'copy') {
				unset($this->request->data['EventType']['id']);
				$this->EventType->create();
			}
			if ($this->EventType->save($this->request->data)) {
				$this->Session->setFlash(__('The event type has been saved'));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The event type could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->EventType->read(null, $id);
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
		$this->EventType->id = $id;
		if (!$this->EventType->exists()) {
			throw new NotFoundException(__('Invalid event type'));
		}
		if ($this->EventType->delete()) {
			$this->Session->setFlash(__('Event type deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Event type was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}
