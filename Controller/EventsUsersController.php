<?php
App::uses('AppController', 'Controller');
/**
 * EventsUsers Controller
 *
 * @property EventsUser $EventsUser
 */
class EventsUsersController extends AppController {


    var $filters = array  
        (  
            'index' => array  
            (  
                'EventsUser' => array  
                (
                    'EventsUser.name',  
                    'EventsUser.description'  
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
			$this->EventsUser->create();
			if ($this->EventsUser->save($this->request->data)) {
				$this->Session->setFlash(__('The events user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The events user could not be saved. Please, try again.'));
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
