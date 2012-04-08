<div class="eventTypes form">
<?php echo $this->Form->create('EventType');?>
	<fieldset>
		<legend><?php echo __('Add Event Type'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('color');
	?>
	</fieldset>
<?php echo $this->Form->submit(__('Submit'));?>
<?php echo $this->Html->link(__('Cancel'), array('action' => 'index'));?>
<?php echo $this->Form->end();?>
</div>
<div class="actions">
	<?php echo $this->element('tr_menu'); ?></div>
