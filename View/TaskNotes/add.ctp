<div class="taskNotes form">
<?php echo $this->Form->create('TaskNote');?>
	<fieldset>
		<legend><?php echo __('Add Task Note'); ?></legend>
	<?php
		echo $this->Form->input('event_id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('time');
	?>
	</fieldset>
<?php echo $this->Form->submit(__('Submit'));?>
<?php echo $this->Html->link(__('Cancel'), array('action' => 'index'));?>
<?php echo $this->Form->end();?>
</div>
<div class="actions">
	<?php echo $this->element('tr_menu'); ?></div>
