<?php
/*
	This file is part of UserMgmt.

	Author: Chetan Varshney (http://ektasoftwares.com)

	UserMgmt is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	UserMgmt is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
*/
App::uses('UserMgmtAppController', 'Usermgmt.Controller');
class UserGroupsController extends UserMgmtAppController {
	public $uses = array('Usermgmt.UserGroup');
	/**
	 * Used to view all groups by Admin
	 *
	 * @access public
	 * @return array
	 */
	public function index() {
		$this->UserGroup->unbindModel( array('hasMany' => array('UserGroupPermission')));
		$userGroups=$this->UserGroup->find('all', array('order'=>'UserGroup.id'));
		$this->set('userGroups', $userGroups);
	}
	/**
	 * Used to add group on the site by Admin
	 *
	 * @access public
	 * @return void
	 */
	public function addGroup() {
		if ($this->request -> isPost()) {
			$this->UserGroup->set($this->data);
			if ($this->UserGroup->addValidate()) {
				$this->UserGroup->save($this->request->data,false);
				$this->Session->setFlash(__('The group is successfully added'));
				$this->redirect('/addGroup');
			}
		}
	}
	/**
	 * Used to edit group on the site by Admin
	 *
	 * @access public
	 * @param integer $groupId group id
	 * @return void
	 */
	public function editGroup($groupId=null) {
		if (!empty($groupId)) {
			if ($this->request -> isPut()) {
				$this->UserGroup->set($this->data);
				if ($this->UserGroup->addValidate()) {
					$this->UserGroup->save($this->request->data,false);
					$this->Session->setFlash(__('The group is successfully updated'));
					$this->redirect('/allGroups');
				}
			} else {
				$this->request->data = $this->UserGroup->read(null, $groupId);
			}
		} else {
			$this->redirect('/allGroups');
		}
	}
	/**
	 * Used to delete group on the site by Admin
	 *
	 * @access public
	 * @param integer $userId group id
	 * @return void
	 */
	public function deleteGroup($groupId = null) {
		if (!empty($groupId)) {
			if ($this->request -> isPost()) {
				if ($this->UserGroup->delete($groupId, false)) {
					$this->Session->setFlash(__('Group is successfully deleted'));
				}
			}
			$this->redirect('/allGroups');
		} else {
			$this->redirect('/allGroups');
		}
	}
}