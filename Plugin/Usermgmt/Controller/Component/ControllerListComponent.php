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
class ControllerListComponent extends Component {
	/**
	 * Used to get all controllers with all methods for permissions
	 *
	 * @access public
	 * @return array
	 */
	public function get() {
		$controllerClasses = App::objects('Controller');
		$superParentActions = get_class_methods('Controller');
		$parentActions = get_class_methods('AppController');
		$parentActionsDefined=$this->_removePrivateActions($parentActions);
		$parentActionsDefined = array_diff($parentActionsDefined, $superParentActions);
		$controllers= array();
		foreach ($controllerClasses as $controller) {
			$controllername=str_replace('Controller', '',$controller);
			$actions= $this->__getControllerMethods($controllername, $superParentActions, $parentActions);
			if (!empty($actions)) {
				$controllers[$controllername] = $actions;
			}
		}
		$plugins = App::objects('plugins');
		foreach ($plugins as $p) {
			$pluginControllerClasses = App::objects($p.'.Controller');
			foreach ($pluginControllerClasses as $controller) {
				$controllername=str_replace('Controller', '',$controller);
				$actions= $this->__getControllerMethods($controllername, $superParentActions, $parentActions, $p);
				if (!empty($actions)) {
					$controllers[$controllername] = $actions;
				}
			}
		}
		return $controllers;
	}
	/**
	 * Used to delete private actions from list of controller's methods
	 *
	 * @access private
	 * @param array $actions Controller's action
	 * @return array
	 */
	private function _removePrivateActions($actions) {
		foreach ($actions as $k => $v) {
			if ($v{0} == '_') {
				unset($actions[$k]);
			}
		}
		return $actions;
	}
	/**
	 * Used to get methods of controller
	 *
	 * @access private
	 * @param string $controllername Controller name
	 * @param array $superParentActions Controller class methods
	 * @param array $parentActions App Controller class methods
	 * @param string $p plugin name
	 * @return array
	 */
	private function __getControllerMethods($controllername, $superParentActions, $parentActions, $p=null) {
		if (empty($p)) {
			App::import('Controller', $controllername);
		} else {
			App::import('Controller', $p.'.'.$controllername);
		}
		$actions = get_class_methods($controllername."Controller");
		if (!empty($actions)) {
			$actions=$this->_removePrivateActions($actions);
			$actions= ($controllername=='App') ? array_diff($actions, $superParentActions) : array_diff($actions, $parentActions);
		}
		return $actions;
	}
	/**
	 *  Used to get controller's list
	 *
	 * @access public
	 * @return array
	 */
	public function getControllers() {
		$controllerClasses = App::objects('Controller');
		foreach ($controllerClasses as $key=>$value) {
			$controllerClasses[$key]=str_replace('Controller', '',$value);
		}
		$controllerClasses[-2]="Select Controller";
		$controllerClasses[-1]="All";
		$plugins = App::objects('plugins');
		foreach ($plugins as $p) {
			$pluginControllerClasses = App::objects($p.'.Controller');
			foreach ($pluginControllerClasses as $controller) {
				$controllerClasses[]=str_replace('Controller', '',$controller);
			}
		}
		ksort($controllerClasses);
		return $controllerClasses;
	}
}