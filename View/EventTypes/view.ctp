<div class="eventTypes view">
<h2><?php  echo __('Event Type');?></h2>
<div id="tr_indexview_actions">
	<div class="actions">
	<ul>	
		<li><?php echo $this->Html->link($this->Html->image('tr/Edit.png') . ' ' . __('Edit Event Type'), array('action' => 'edit', $eventType['EventType']['id']), array('escape' => false)); ?></li>
		<li><?php echo $this->Html->link($this->Html->image('tr/Copy.png') . ' ' . __('Copy Event Type'), array('action' => 'edit', $eventType['EventType']['id'], 'copy'), array('escape' => false)); ?></li>
		<li><?php echo $this->Form->postLink($this->Html->image('tr/Delete.png') . ' ' . __('Delete Event Type'), array('action' => 'delete', $eventType['EventType']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $eventType['EventType']['id'])); ?></li>
	</ul>
	</div>
</div>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($eventType['EventType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($eventType['EventType']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Color'); ?></dt>
		<dd>
			<?php echo h($eventType['EventType']['color']); ?>
			&nbsp;
		</dd>
	</dl>
<br/><br/>
<div class="related">
	<h3><?php echo __('Associated Events');?></h3>
	<?php if (!empty($eventType['Event'])):?>
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
		foreach ($eventType['Event'] as $event): ?>
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
			<li><?php echo $this->Html->link(__('New Event'), '/events/add/eventType:' . $eventType['EventType']['id']);?> </li>
		</ul>
	</div>
</div>
</div>
<div class="actions">
	<?php echo $this->element('tr_menu'); ?></div>
