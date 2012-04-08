<div class="contactsTags form">
<?php echo $this->Form->create('ContactsTag');?>
	<fieldset>
		<legend><?php echo __('Edit Contacts Tag'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('contact_id');
		echo $this->Form->input('tag_id');
	?>
	</fieldset>
<?php echo $this->Form->submit(__('Submit'));?>
<?php echo $this->Html->link(__('Cancel'), array('action' => 'index'));?>
<?php echo $this->Form->end();?>
</div>
<div class="actions">
	<?php echo $this->element('tr_menu'); ?></div>
