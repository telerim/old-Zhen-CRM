<div class="dealStatuses form">
<?php echo $this->Form->create('DealStatus');?>
	<fieldset>
		<legend><?php echo __('Edit Deal Status'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->submit(__('Submit'));?>
<?php echo $this->Html->link(__('Cancel'), array('action' => 'index'));?>
<?php echo $this->Form->end();?>
</div>
<div class="actions">
	<?php echo $this->element('tr_menu'); ?></div>
