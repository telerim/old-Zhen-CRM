<div class="events view">
<h2><?php  echo __('Event');?></h2>
<div id="tr_indexview_actions">
	<div class="actions">
	<ul>	
		<li><?php echo $this->Html->link($this->Html->image('tr/Edit.png') . ' ' . __('Edit Event'), array('action' => 'edit', $event['Event']['id']), array('escape' => false)); ?></li>
		<li><?php echo $this->Html->link($this->Html->image('tr/Copy.png') . ' ' . __('Copy Event'), array('action' => 'edit', $event['Event']['id'], 'copy'), array('escape' => false)); ?></li>
		<li><?php echo $this->Form->postLink($this->Html->image('tr/Delete.png') . ' ' . __('Delete Event'), array('action' => 'delete', $event['Event']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $event['Event']['id'])); ?></li>
	</ul>
	</div>
</div>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($event['Event']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($event['EventType']['name'], array('controller' => 'event_types', 'action' => 'view', $event['EventType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($event['Event']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Details'); ?></dt>
		<dd>
			<?php echo h($event['Event']['details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start'); ?></dt>
		<dd>
			<?php echo h($event['Event']['start']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End'); ?></dt>
		<dd>
			<?php echo h($event['Event']['end']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('All Day'); ?></dt>
		<dd>
			<?php echo h($event['Event']['all_day']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($event['Event']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($event['Event']['active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($event['Event']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($event['Event']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
<br/><br/>
<div class="related">
	<h3><?php echo __('Associated Task Notes');?></h3>
	<?php if (!empty($event['TaskNote'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Time'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($event['TaskNote'] as $taskNote): ?>
		<tr>
			<td><?php echo $taskNote['id'];?></td>
			<td><?php echo $this->Html->link($taskNote['name'], array('controller' => 'task_notes', 'action' => 'view', $taskNote['id'])); ?></td>
			<td><?php echo $taskNote['description'];?></td>
			<td><?php echo $taskNote['time'];?></td>
			<td><?php echo $taskNote['created'];?></td>
			<td><?php echo $taskNote['updated'];?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Task Note'), '/task_notes/add/event:' . $event['Event']['id']);?> </li>
		</ul>
	</div>
</div>
<br/><br/>
<div class="related">
	<h3><?php echo __('Associated Tags');?></h3>
	<?php if (!empty($event['Tag'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($event['Tag'] as $tag): ?>
		<tr>
			<td><?php echo $tag['id'];?></td>
			<td><?php echo $this->Html->link($tag['name'], array('controller' => 'tags', 'action' => 'view', $tag['id'])); ?></td>
			<td><?php echo $tag['created'];?></td>
			<td><?php echo $tag['updated'];?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Tag'), '/tags/add/event:' . $event['Event']['id']);?> </li>
		</ul>
	</div>
</div>
<br/><br/>
<div class="related">
	<h3><?php echo __('Associated Users');?></h3>
	<?php if (!empty($event['User'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($event['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id'];?></td>
			<td><?php echo $this->Html->link($user['username'], array('controller' => 'users', 'action' => 'view', $user['id'])); ?></td>
			<td><?php echo $user['password'];?></td>
			<td><?php echo $user['email'];?></td>
			<td><?php echo $this->Html->link($user['name'], array('controller' => 'users', 'action' => 'view', $user['id'])); ?></td>
			<td><?php echo $user['active'];?></td>
			<td><?php echo $user['created'];?></td>
			<td><?php echo $user['modified'];?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), '/users/add/event:' . $event['Event']['id']);?> </li>
		</ul>
	</div>
</div>
</div>
<div class="actions">
	<?php echo $this->element('tr_menu'); ?></div>
