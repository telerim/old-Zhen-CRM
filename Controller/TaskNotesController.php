<?php
App::uses('AppController', 'Controller');
/**
 * TaskNotes Controller
 *
 * @property TaskNote $TaskNote
 */
class TaskNotesController extends AppController {


    var $filters = array (  
            'index' => array (  
                'TaskNote' => array (
                    'TaskNote.name',  
                )  
            )  
    );  

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TaskNote->recursive = 0;
		$this->set('taskNotes', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->TaskNote->id = $id;
		if (!$this->TaskNote->exists()) {
			throw new NotFoundException(__('Invalid task note'));
		}
		$this->set('taskNote', $this->TaskNote->read(null, $id));
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
			$this->TaskNote->create();
			if ($this->TaskNote->save($this->request->data)) {
				$this->Session->setFlash(__('The task note has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The task note could not be saved. Please, try again.'));
			}
		}
		$events = $this->TaskNote->Event->find('list');
		$this->set(compact('events'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null, $type = null) {
		$this->TaskNote->id = $id;
		if (!$this->TaskNote->exists()) {
			throw new NotFoundException(__('Invalid task note'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($type === 'copy') {
				unset($this->request->data['TaskNote']['id']);
				$this->TaskNote->create();
			}
			if ($this->TaskNote->save($this->request->data)) {
				$this->Session->setFlash(__('The task note has been saved'));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The task note could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->TaskNote->read(null, $id);
		}
		$events = $this->TaskNote->Event->find('list');
		$this->set(compact('events'));
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
		$this->TaskNote->id = $id;
		if (!$this->TaskNote->exists()) {
			throw new NotFoundException(__('Invalid task note'));
		}
		if ($this->TaskNote->delete()) {
			$this->Session->setFlash(__('Task note deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Task note was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}
