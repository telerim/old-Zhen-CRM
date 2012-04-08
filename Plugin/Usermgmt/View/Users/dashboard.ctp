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
?>
<div class="umtop">
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->element('dashboard'); ?>
	<div class="um_box_up"></div>
	<div class="um_box_mid">
		<div class="um_box_mid_content">
			<div class="um_box_mid_content_top">
				<span class="umstyle1"><?php echo __('Dashboard'); ?></span>
				<span class="umstyle2" style="float:right"><?php echo $this->Html->link(__("Home",true),"/") ?></span>
				<div style="clear:both"></div>
			</div>
			<div class="umhr"></div>
			<div class="um_box_mid_content_mid">
				<div class="um_box_mid_content_mid_left">
					Hello <?php echo h($user['User']['name']); ?>
					<br/><br/>
			<?php   if ($this->UserAuth->getGroupName()=='Admin') { ?>
						<span  class="umstyle6"><?php echo $this->Html->link(__("Add User",true),"/addUser") ?></span><br/><br/>
						<span  class="umstyle6"><?php echo $this->Html->link(__("All Users",true),"/allUsers") ?></span><br/><br/>
						<span  class="umstyle6"><?php echo $this->Html->link(__("Add Group",true),"/addGroup") ?></span><br/><br/>
						<span  class="umstyle6"><?php echo $this->Html->link(__("All Groups",true),"/allGroups") ?></span><br/><br/>
						<span  class="umstyle6"><?php echo $this->Html->link(__("Permissions",true),"/permissions") ?></span><br/><br/>
						<span  class="umstyle6"><?php echo $this->Html->link(__("Profile",true),"/viewUser/".$this->UserAuth->getUserId()) ?></span><br/><br/>
						<span  class="umstyle6"><?php echo $this->Html->link(__("Edit Profile",true),"/editUser/".$this->UserAuth->getUserId()) ?></span><br/><br/>
			<?php   } ?>
						<span  class="umstyle6"><?php echo $this->Html->link(__("Change Password",true),"/changePassword") ?></span><br/><br/>
						<span  class="umstyle6"><?php echo $this->Html->link(__("Profile",true),"/myprofile") ?></span><br/><br/>
				</div>
				<div class="um_box_mid_content_mid_right" align="right"></div>
				<div style="clear:both"></div>
			</div>
		</div>
	</div>
	<div class="um_box_down"></div>
</div>
