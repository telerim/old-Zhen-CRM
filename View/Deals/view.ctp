<div class="deals view">
<h2><?php  echo __('Deal');?></h2>
<div id="tr_indexview_actions">
	<div class="actions">
	<ul>	
		<li><?php echo $this->Html->link($this->Html->image('tr/Edit.png') . ' ' . __('Edit Deal'), array('action' => 'edit', $deal['Deal']['id']), array('escape' => false)); ?></li>
		<li><?php echo $this->Html->link($this->Html->image('tr/Copy.png') . ' ' . __('Copy Deal'), array('action' => 'edit', $deal['Deal']['id'], 'copy'), array('escape' => false)); ?></li>
		<li><?php echo $this->Form->postLink($this->Html->image('tr/Delete.png') . ' ' . __('Delete Deal'), array('action' => 'delete', $deal['Deal']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $deal['Deal']['id'])); ?></li>
	</ul>
	</div>
</div>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($deal['Deal']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($deal['Deal']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time'); ?></dt>
		<dd>
			<?php echo h($deal['Deal']['time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact'); ?></dt>
		<dd>
			<?php echo $this->Html->link($deal['Contact']['name'], array('controller' => 'contacts', 'action' => 'view', $deal['Contact']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($deal['User']['name'], array('controller' => 'users', 'action' => 'view', $deal['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deal Status'); ?></dt>
		<dd>
			<?php echo $this->Html->link($deal['DealStatus']['name'], array('controller' => 'deal_statuses', 'action' => 'view', $deal['DealStatus']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($deal['Deal']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($deal['Deal']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($deal['Deal']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
<br/><br/>
<div class="related">
	<h3><?php echo __('Associated Deal Notes');?></h3>
	<?php if (!empty($deal['DealNote'])):?>
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
		foreach ($deal['DealNote'] as $dealNote): ?>
		<tr>
			<td><?php echo $dealNote['id'];?></td>
			<td><?php echo $this->Html->link($dealNote['name'], array('controller' => 'deal_notes', 'action' => 'view', $dealNote['id'])); ?></td>
			<td><?php echo $dealNote['description'];?></td>
			<td><?php echo $dealNote['time'];?></td>
			<td><?php echo $dealNote['created'];?></td>
			<td><?php echo $dealNote['updated'];?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Deal Note'), array('controller' => 'deal_notes', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<br/><br/>
<div class="related">
	<h3><?php echo __('Associated Tags');?></h3>
	<?php if (!empty($deal['Tag'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($deal['Tag'] as $tag): ?>
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
			<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
</div>
<div class="actions">
	<?php echo $this->element('tr_menu'); ?></div>
