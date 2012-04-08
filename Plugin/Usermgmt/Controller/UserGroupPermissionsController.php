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
class UserGroupPermissionsController extends UserMgmtAppController {

	var $uses = array('Usermgmt.UserGroupPermission','Usermgmt.UserGroup');
	var $components=array('Usermgmt.ControllerList','RequestHandler');
	/**
	 * Used to display all permissions of site by Admin
	 *
	 * @access public
	 * @return array
	 */
	public function index() {
		$c=-2;
		if (isset($_GET['c']) && $_GET['c'] !='') {
			$c=$_GET['c'];
		}
		$this->set('c',$c);
		$allControllers=$this->ControllerList->getControllers();
		$this->set('allControllers',$allControllers);
		if ($c >-2) {
			$con=array();
			$conAll=$this->ControllerList->get();
			if ($c ==-1) {
				$con=$conAll;
				$user_group_permissions=$this->UserGroupPermission->find('all', array('order'=>array('controller', 'action')));
			} else {
				$user_group_permissions=$this->UserGroupPermission->find('all', array('order'=>array('controller', 'action'), 'conditions'=>array('controller'=>$allControllers[$c])));
				$con[$allControllers[$c]]= (isset($conAll[$allControllers[$c]])) ? $conAll[$allControllers[$c]] : array();
			}
			foreach ($user_group_permissions as $row) {
				$cont=$row['UserGroupPermission']['controller'];
				$act=$row['UserGroupPermission']['action'];
				$ugname=$row['UserGroup']['name'];
				$allowed=$row['UserGroupPermission']['allowed'];
				$con[$cont][$act][$ugname]=$allowed;
			}
			$this->set('controllers',$con);
			$result=$this->UserGroup->getGroupNames();
			$groups='';
			for ($i=0; $i<count($result); $i++) {
				$groups.= ($i==0) ? $result[$i] : ",".$result[$i];
			}
			$this->set('user_groups',$result);
			$this->set('groups',$groups);
		}
	}
	/**
	 *  Used to update permissions of site using Ajax by Admin
	 *
	 * @access public
	 * @return integer
	 */
	public function update() {
		$this->autoRender = false;
		$controller=$this->params['data']['controller'];
		$action=$this->params['data']['action'];
		$result=$this->UserGroup->getGroupNamesAndIds();
		$success=0;
		foreach ($result as $row) {
			if (isset($this->params['data'][$row['name']])) {
				$res=$this->UserGroupPermission->find('first',array('conditions' => array('controller'=>$controller,'action'=>$action,'user_group_id'=>$row['id'])));
				if (empty($res)) {
					$data=array();
					$data['UserGroupPermission']['user_group_id']=$row['id'];
					$data['UserGroupPermission']['controller']=$controller;
					$data['UserGroupPermission']['action']=$action;
					$data['UserGroupPermission']['allowed']=$this->params['data'][$row['name']];
					$data['UserGroupPermission']['id']=null;
					$rtn=$this->UserGroupPermission->save($data);
					if ($rtn) {
						$success=1;
					}
				} else {
					if ($this->params['data'][$row['name']] !=$res['UserGroupPermission']['allowed']) {
						$data=array();
						$data['UserGroupPermission']['allowed']=$this->params['data'][$row['name']];
						$data['UserGroupPermission']['id']=$res['UserGroupPermission']['id'];
						$rtn=$this->UserGroupPermission->save($data);
						if ($rtn) {
							$success=1;
						}
					} else {
						 $success=1;
					}
				}
			}
		}
		echo $success;
		$this->__deleteCache();
	}
	/**
	 * Used to delete cache of permissions and used when any permission gets changed by Admin
	 *
	 * @access private
	 * @return void
	 */
	private function __deleteCache() {
		$iterator = new RecursiveDirectoryIterator(CACHE);
		foreach (new RecursiveIteratorIterator($iterator, RecursiveIteratorIterator::CHILD_FIRST) as $file) {
			$path_info = pathinfo($file);
			if ($path_info['dirname']==ROOT.DS."app".DS."tmp".DS."cache" && $path_info['basename']!='.svn') {
				if (!is_dir($file->getPathname())) {
					unlink($file->getPathname());
				}
			}
		}
	}
}