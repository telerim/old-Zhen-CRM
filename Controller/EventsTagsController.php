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
			$this->EventsTag->create();
			if ($this->EventsTag->save($this->request->data)) {
				$this->Session->setFlash(__('The events tag has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The events tag could not be saved. Please, try again.'));
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
