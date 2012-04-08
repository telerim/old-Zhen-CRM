<div class="deals form">
<?php echo $this->Form->create('Deal');?>
	<fieldset>
		<legend><?php echo __('Add Deal'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('time');
		echo $this->Form->input('contact_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('deal_status_id');
		echo $this->Form->input('description');
		echo $this->Form->input('Tag');
	?>
	</fieldset>
<?php echo $this->Form->submit(__('Submit'));?>
<?php echo $this->Html->link(__('Cancel'), array('action' => 'index'));?>
<?php echo $this->Form->end();?>
</div>
<div class="actions">
	<?php echo $this->element('tr_menu'); ?></div>
