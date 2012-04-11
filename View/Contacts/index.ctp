<div class="contacts index">
	<h2><?php echo __('Contacts');?></h2>
<div id="tr_indexview_actions">
	<div class="actions">
	<ul>
		<li>
		<?php echo $this->Html->link($this->Html->image('tr/Add.png') . " " . __('New Contact'), array('action' => 'add'), array('escape' => false)); ?>
		</li>
		<li><a href="javascript:toggleTrFilter()"><?php echo $this->Html->image('tr/Search.png'); ?> Search / Filter</a></li>
	</ul>
	</div>
</div>
<div id="tr_indexview_filter">
		<?php echo $this->Filter->filterForm('Contact', array('legend' => 'Search')); ?>
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
			<th><?php echo $this->Paginator->sort('company_name');?></th>
			<th><?php echo $this->Paginator->sort('contact_status_id');?></th>
			<th><?php echo $this->Paginator->sort('address1');?></th>
			<th><?php echo $this->Paginator->sort('address2');?></th>
			<th><?php echo $this->Paginator->sort('city');?></th>
			<th><?php echo $this->Paginator->sort('state');?></th>
			<th><?php echo $this->Paginator->sort('phone');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($contacts as $contact): ?>
	<tr>
		<td><?php echo h($contact['Contact']['id']); ?>&nbsp;</td>
		<td><?php echo $this->Html->link(h($contact['Contact']['name']), array('action' => 'view', $contact['Contact']['id'])); ?>&nbsp;</td>
		<td><?php echo $this->Html->link(h($contact['Contact']['company_name']), array('action' => 'view', $contact['Contact']['id'])); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($this->Html->image("statuses/contact/" . strtolower($contact['ContactStatus']['name']) . ".png", array('alt'=>$contact['ContactStatus']['name'])), array('controller' => 'contact_statuses', 'action' => 'view', $contact['ContactStatus']['id']), array('escape' => false)); ?>
		</td>
		<td><?php echo h($contact['Contact']['address1']); ?>&nbsp;</td>
		<td><?php echo h($contact['Contact']['address2']); ?>&nbsp;</td>
		<td><?php echo h($contact['Contact']['city']); ?>&nbsp;</td>
		<td><?php echo h($contact['Contact']['state']); ?>&nbsp;</td>
		<td><?php echo h($contact['Contact']['phone']); ?>&nbsp;</td>
		<td><?php echo h($contact['Contact']['email']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($contact['User']['name'], array('controller' => 'users', 'action' => 'view', $contact['User']['id'])); ?>
		</td>
		<td><?php echo $this->Time->nice(h($contact['Contact']['created'])); ?>&nbsp;</td>
		<td><?php echo $this->Time->nice(h($contact['Contact']['updated'])); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $contact['Contact']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $contact['Contact']['id']), null, __('Are you sure you want to delete # %s?', $contact['Contact']['id'])); ?>
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
