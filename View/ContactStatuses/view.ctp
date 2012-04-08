<div class="contactStatuses view">
<h2><?php  echo __('Contact Status');?></h2>
<div id="tr_indexview_actions">
	<div class="actions">
	<ul>	
		<li><?php echo $this->Html->link($this->Html->image('tr/Edit.png') . ' ' . __('Edit Contact Status'), array('action' => 'edit', $contactStatus['ContactStatus']['id']), array('escape' => false)); ?></li>
		<li><?php echo $this->Html->link($this->Html->image('tr/Copy.png') . ' ' . __('Copy Contact Status'), array('action' => 'edit', $contactStatus['ContactStatus']['id'], 'copy'), array('escape' => false)); ?></li>
		<li><?php echo $this->Form->postLink($this->Html->image('tr/Delete.png') . ' ' . __('Delete Contact Status'), array('action' => 'delete', $contactStatus['ContactStatus']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $contactStatus['ContactStatus']['id'])); ?></li>
	</ul>
	</div>
</div>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($contactStatus['ContactStatus']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($contactStatus['ContactStatus']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($contactStatus['ContactStatus']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($contactStatus['ContactStatus']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
<br/><br/>
<div class="related">
	<h3><?php echo __('Associated Contacts');?></h3>
	<?php if (!empty($contactStatus['Contact'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Company Name'); ?></th>
		<th><?php echo __('Address1'); ?></th>
		<th><?php echo __('Address2'); ?></th>
		<th><?php echo __('City'); ?></th>
		<th><?php echo __('State'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($contactStatus['Contact'] as $contact): ?>
		<tr>
			<td><?php echo $contact['id'];?></td>
			<td><?php echo $this->Html->link($contact['name'], array('controller' => 'contacts', 'action' => 'view', $contact['id'])); ?></td>
			<td><?php echo $this->Html->link($contact['company_name'], array('controller' => 'contacts', 'action' => 'view', $contact['id'])); ?></td>
			<td><?php echo $contact['address1'];?></td>
			<td><?php echo $contact['address2'];?></td>
			<td><?php echo $contact['city'];?></td>
			<td><?php echo $contact['state'];?></td>
			<td><?php echo $contact['phone'];?></td>
			<td><?php echo $contact['email'];?></td>
			<td><?php echo $contact['created'];?></td>
			<td><?php echo $contact['updated'];?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Contact'), array('controller' => 'contacts', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
</div>
<div class="actions">
	<?php echo $this->element('tr_menu'); ?></div>
