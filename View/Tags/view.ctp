<div class="tags view">
<h2><?php  echo __('Tag');?></h2>
<div id="tr_indexview_actions">
	<div class="actions">
	<ul>	
		<li><?php echo $this->Html->link($this->Html->image('tr/Edit.png') . ' ' . __('Edit Tag'), array('action' => 'edit', $tag['Tag']['id']), array('escape' => false)); ?></li>
		<li><?php echo $this->Html->link($this->Html->image('tr/Copy.png') . ' ' . __('Copy Tag'), array('action' => 'edit', $tag['Tag']['id'], 'copy'), array('escape' => false)); ?></li>
		<li><?php echo $this->Form->postLink($this->Html->image('tr/Delete.png') . ' ' . __('Delete Tag'), array('action' => 'delete', $tag['Tag']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $tag['Tag']['id'])); ?></li>
	</ul>
	</div>
</div>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tag['Tag']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($tag['Tag']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($tag['Tag']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($tag['Tag']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
<br/><br/>
<div class="related">
	<h3><?php echo __('Associated Contacts');?></h3>
	<?php if (!empty($tag['Contact'])):?>
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
		foreach ($tag['Contact'] as $contact): ?>
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
<br/><br/>
<div class="related">
	<h3><?php echo __('Associated Deals');?></h3>
	<?php if (!empty($tag['Deal'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Time'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($tag['Deal'] as $deal): ?>
		<tr>
			<td><?php echo $deal['id'];?></td>
			<td><?php echo $this->Html->link($deal['name'], array('controller' => 'deals', 'action' => 'view', $deal['id'])); ?></td>
			<td><?php echo $deal['time'];?></td>
			<td><?php echo $deal['description'];?></td>
			<td><?php echo $deal['created'];?></td>
			<td><?php echo $deal['updated'];?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Deal'), array('controller' => 'deals', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<br/><br/>
<div class="related">
	<h3><?php echo __('Associated Events');?></h3>
	<?php if (!empty($tag['Event'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Details'); ?></th>
		<th><?php echo __('Start'); ?></th>
		<th><?php echo __('End'); ?></th>
		<th><?php echo __('All Day'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($tag['Event'] as $event): ?>
		<tr>
			<td><?php echo $event['id'];?></td>
			<td><?php echo $event['title'];?></td>
			<td><?php echo $event['details'];?></td>
			<td><?php echo $event['start'];?></td>
			<td><?php echo $event['end'];?></td>
			<td><?php echo $event['all_day'];?></td>
			<td><?php echo $event['status'];?></td>
			<td><?php echo $event['active'];?></td>
			<td><?php echo $event['created'];?></td>
			<td><?php echo $event['modified'];?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
</div>
<div class="actions">
	<?php echo $this->element('tr_menu'); ?></div>
