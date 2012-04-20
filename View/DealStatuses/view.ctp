<div class="dealStatuses view">
<h2><?php  echo __('Deal Status');?></h2>
<div id="tr_indexview_actions">
	<div class="actions">
	<ul>	
		<li><?php echo $this->Html->link($this->Html->image('tr/Edit.png') . ' ' . __('Edit Deal Status'), array('action' => 'edit', $dealStatus['DealStatus']['id']), array('escape' => false)); ?></li>
		<li><?php echo $this->Html->link($this->Html->image('tr/Copy.png') . ' ' . __('Copy Deal Status'), array('action' => 'edit', $dealStatus['DealStatus']['id'], 'copy'), array('escape' => false)); ?></li>
		<li><?php echo $this->Form->postLink($this->Html->image('tr/Delete.png') . ' ' . __('Delete Deal Status'), array('action' => 'delete', $dealStatus['DealStatus']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $dealStatus['DealStatus']['id'])); ?></li>
	</ul>
	</div>
</div>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($dealStatus['DealStatus']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($dealStatus['DealStatus']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($dealStatus['DealStatus']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($dealStatus['DealStatus']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
<br/><br/>
<div class="related">
	<h3><?php echo __('Associated Deals');?></h3>
	<?php if (!empty($dealStatus['Deal'])):?>
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
		foreach ($dealStatus['Deal'] as $deal): ?>
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
			<li><?php echo $this->Html->link(__('New Deal'), '/deals/add/dealStatus:' . $dealStatus['DealStatus']['id']);?> </li>
		</ul>
	</div>
</div>
</div>
<div class="actions">
	<?php echo $this->element('tr_menu'); ?></div>
