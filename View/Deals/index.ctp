<div class="deals index">
	<h2><?php echo __('Deals');?></h2>
<div id="tr_indexview_actions">
	<div class="actions">
	<ul>
		<li>
		<?php echo $this->Html->link($this->Html->image('tr/Add.png') . " " . __('New Deal'), array('action' => 'add'), array('escape' => false)); ?>
		</li>
		<li><a href="javascript:toggleTrFilter()"><?php echo $this->Html->image('tr/Search.png'); ?> Search / Filter</a></li>
	</ul>
	</div>
</div>
<div id="tr_indexview_filter">
		<?php echo $this->Filter->filterForm('Deal', array('legend' => 'Search')); ?>
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
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('time');?></th>
			<th><?php echo $this->Paginator->sort('contact_id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('deal_status_id');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($deals as $deal): ?>
	<tr>
		<td><?php echo h($deal['Deal']['id']); ?>&nbsp;</td>
		<td><?php echo $this->Html->link(h($deal['Deal']['name']), array('action' => 'view', $deal['Deal']['id']), array('escape' => false)); ?>&nbsp;</td>
		<td><?php echo $this->Time->nice(h($deal['Deal']['time'])); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($deal['Contact']['name'], array('controller' => 'contacts', 'action' => 'view', $deal['Contact']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($deal['User']['name'], array('controller' => 'users', 'action' => 'view', $deal['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($this->Html->image("statuses/deal/" . strtolower($deal['DealStatus']['name']) . ".png", array('alt'=>$deal['DealStatus']['name'])), array('controller' => 'deal_statuses', 'action' => 'view', $deal['DealStatus']['id']), array('escape' => false)); ?>
		</td>
		<td><?php echo h($deal['Deal']['description']); ?>&nbsp;</td>
		<td><?php echo $this->Time->nice(h($deal['Deal']['created'])); ?>&nbsp;</td>
		<td><?php echo $this->Time->nice(h($deal['Deal']['updated'])); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $deal['Deal']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $deal['Deal']['id']), null, __('Are you sure you want to delete # %s?', $deal['Deal']['id'])); ?>
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
