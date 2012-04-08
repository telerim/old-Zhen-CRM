<div class="contactNotes form">
<?php echo $this->Form->create('ContactNote');?>
	<fieldset>
		<legend><?php echo __('Edit Contact Note'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('contact_id');
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
