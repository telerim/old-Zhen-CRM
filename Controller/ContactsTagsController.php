<?php
App::uses('AppController', 'Controller');
/**
 * ContactsTags Controller
 *
 * @property ContactsTag $ContactsTag
 */
class ContactsTagsController extends AppController {


    var $filters = array (  
            'index' => array (  
                'ContactsTag' => array (
                    'ContactsTag.name',  
                )  
            )  
    );  

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ContactsTag->recursive = 0;
		$this->set('contactsTags', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ContactsTag->id = $id;
		if (!$this->ContactsTag->exists()) {
			throw new NotFoundException(__('Invalid contacts tag'));
		}
		$this->set('contactsTag', $this->ContactsTag->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ContactsTag->create();
			if ($this->ContactsTag->save($this->request->data)) {
				$this->Session->setFlash(__('The contacts tag has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contacts tag could not be saved. Please, try again.'));
			}
		}
		$trparams = $this->params['named'];
		foreach ($trparams as $model=>$id) {
		        $this->request->data['ContactsTag'][$model . '_id'] = $id;
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null, $type = null) {
		$this->ContactsTag->id = $id;
		if (!$this->ContactsTag->exists()) {
			throw new NotFoundException(__('Invalid contacts tag'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($type === 'copy') {
				unset($this->request->data['ContactsTag']['id']);
				$this->ContactsTag->create();
			}
			if ($this->ContactsTag->save($this->request->data)) {
				$this->Session->setFlash(__('The contacts tag has been saved'));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The contacts tag could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ContactsTag->read(null, $id);
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
		$this->ContactsTag->id = $id;
		if (!$this->ContactsTag->exists()) {
			throw new NotFoundException(__('Invalid contacts tag'));
		}
		if ($this->ContactsTag->delete()) {
			$this->Session->setFlash(__('Contacts tag deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Contacts tag was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}
