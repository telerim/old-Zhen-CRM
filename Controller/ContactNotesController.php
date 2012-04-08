<?php
App::uses('AppController', 'Controller');
/**
 * ContactNotes Controller
 *
 * @property ContactNote $ContactNote
 */
class ContactNotesController extends AppController {


    var $filters = array  
        (  
            'index' => array  
            (  
                'ContactNote' => array  
                (
                    'ContactNote.name',  
                    'ContactNote.description'  
                )  
            )  
        );  

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ContactNote->recursive = 0;
		$this->set('contactNotes', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ContactNote->id = $id;
		if (!$this->ContactNote->exists()) {
			throw new NotFoundException(__('Invalid contact note'));
		}
		$this->set('contactNote', $this->ContactNote->read(null, $id));
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
			$this->ContactNote->create();
			if ($this->ContactNote->save($this->request->data)) {
				$this->Session->setFlash(__('The contact note has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contact note could not be saved. Please, try again.'));
			}
		}
		$contacts = $this->ContactNote->Contact->find('list');
		$this->set(compact('contacts'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null, $type = null) {
		$this->ContactNote->id = $id;
		if (!$this->ContactNote->exists()) {
			throw new NotFoundException(__('Invalid contact note'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($type === 'copy') {
				unset($this->request->data['ContactNote']['id']);
				$this->ContactNote->create();
			}
			if ($this->ContactNote->save($this->request->data)) {
				$this->Session->setFlash(__('The contact note has been saved'));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The contact note could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ContactNote->read(null, $id);
		}
		$contacts = $this->ContactNote->Contact->find('list');
		$this->set(compact('contacts'));
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
		$this->ContactNote->id = $id;
		if (!$this->ContactNote->exists()) {
			throw new NotFoundException(__('Invalid contact note'));
		}
		if ($this->ContactNote->delete()) {
			$this->Session->setFlash(__('Contact note deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Contact note was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}
