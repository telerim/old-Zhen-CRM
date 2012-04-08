<div class="dealsTags index">
	<h2><?php echo __('Deals Tags');?></h2>
<div id="tr_indexview_actions">
	<div class="actions">
	<ul>
		<li>
		<?php echo $this->Html->link($this->Html->image('tr/Add.png') . " " . __('New Deals Tag'), array('action' => 'add'), array('escape' => false)); ?>
		</li>
		<li><a href="javascript:toggleTrFilter()"><?php echo $this->Html->image('tr/Search.png'); ?> Search / Filter</a></li>
	</ul>
	</div>
</div>
<div id="tr_indexview_filter">
		<?php echo $this->Filter->filterForm('Deals Tag', array('legend' => 'Search')); ?>
</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('deal_id');?></th>
			<th><?php echo $this->Paginator->sort('tag_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($dealsTags as $dealsTag): ?>
	<tr>
		<td><?php echo h($dealsTag['DealsTag']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($dealsTag['Deal']['name'], array('controller' => 'deals', 'action' => 'view', $dealsTag['Deal']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($dealsTag['Tag']['name'], array('controller' => 'tags', 'action' => 'view', $dealsTag['Tag']['id'])); ?>
		</td>
		<td><?php echo $this->Time->nice(h($dealsTag['DealsTag']['created'])); ?>&nbsp;</td>
		<td><?php echo $this->Time->nice(h($dealsTag['DealsTag']['updated'])); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $dealsTag['DealsTag']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $dealsTag['DealsTag']['id']), null, __('Are you sure you want to delete # %s?', $dealsTag['DealsTag']['id'])); ?>
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
