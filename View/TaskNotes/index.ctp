<div class="taskNotes index">
	<h2><?php echo __('Task Notes');?></h2>
<div id="tr_indexview_actions">
	<div class="actions">
	<ul>
		<li>
		<?php echo $this->Html->link($this->Html->image('tr/Add.png') . " " . __('New Task Note'), array('action' => 'add'), array('escape' => false)); ?>
		</li>
		<li><a href="javascript:toggleTrFilter()"><?php echo $this->Html->image('tr/Search.png'); ?> Search / Filter</a></li>
	</ul>
	</div>
</div>
<div id="tr_indexview_filter">
		<?php echo $this->Filter->filterForm('Task Note', array('legend' => 'Search')); ?>
</div>

<?php
        $filterString = '';
        foreach ($this->viewVars['viewFilterParams'] as $filter2) {
                if (!isset($filter2['options']['value'])) continue;
                $value = $filter2['options']['value'];
                $name = $filter2['name'];
                if (!($filterString === '')) $filterString .= ', ';
                $filterString .= "<b>$value</b> " . __('in') .
                        " <i>$name</i>";
        }
        if (!($filterString === '')) {
		echo '<div id="tr_filterinfo">';
                echo __('Filtered by') . ': ' . $filterString;
		echo '</div>';
	}
?>	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('event_id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('time');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($taskNotes as $taskNote): ?>
	<tr>
		<td><?php echo h($taskNote['TaskNote']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($taskNote['Event']['title'], array('controller' => 'events', 'action' => 'view', $taskNote['Event']['id'])); ?>
		</td>
		<td><?php echo $this->Html->link(h($taskNote['TaskNote']['name']), array('action' => 'view', $taskNote['TaskNote']['id'])); ?>&nbsp;</td>
		<td><?php echo h($taskNote['TaskNote']['description']); ?>&nbsp;</td>
		<td><?php echo $this->Time->nice(h($taskNote['TaskNote']['time'])); ?>&nbsp;</td>
		<td><?php echo $this->Time->nice(h($taskNote['TaskNote']['created'])); ?>&nbsp;</td>
		<td><?php echo $this->Time->nice(h($taskNote['TaskNote']['updated'])); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $taskNote['TaskNote']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $taskNote['TaskNote']['id']), null, __('Are you sure you want to delete # %s?', $taskNote['TaskNote']['id'])); ?>
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
