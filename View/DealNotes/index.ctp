<div class="dealNotes index">
	<h2><?php echo __('Deal Notes');?></h2>
<div id="tr_indexview_actions">
	<div class="actions">
	<ul>
		<li>
		<?php echo $this->Html->link($this->Html->image('tr/Add.png') . " " . __('New Deal Note'), array('action' => 'add'), array('escape' => false)); ?>
		</li>
		<li><a href="javascript:toggleTrFilter()"><?php echo $this->Html->image('tr/Search.png'); ?> Search / Filter</a></li>
	</ul>
	</div>
</div>
<div id="tr_indexview_filter">
		<?php echo $this->Filter->filterForm('Deal Note', array('legend' => 'Search')); ?>
</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('deal_id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('time');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($dealNotes as $dealNote): ?>
	<tr>
		<td><?php echo h($dealNote['DealNote']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($dealNote['Deal']['name'], array('controller' => 'deals', 'action' => 'view', $dealNote['Deal']['id'])); ?>
		</td>
		<td><?php echo $this->Html->link(h($dealNote['DealNote']['name']), array('action' => 'view', $dealNote['DealNote']['id'])); ?>&nbsp;</td>
		<td><?php echo h($dealNote['DealNote']['description']); ?>&nbsp;</td>
		<td><?php echo $this->Time->nice(h($dealNote['DealNote']['time'])); ?>&nbsp;</td>
		<td><?php echo $this->Time->nice(h($dealNote['DealNote']['created'])); ?>&nbsp;</td>
		<td><?php echo $this->Time->nice(h($dealNote['DealNote']['updated'])); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $dealNote['DealNote']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $dealNote['DealNote']['id']), null, __('Are you sure you want to delete # %s?', $dealNote['DealNote']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>

	<div class="paging">
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<?php echo $this->element('tr_menu'); ?></div>
