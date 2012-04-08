<div class="contactsTags index">
	<h2><?php echo __('Contacts Tags');?></h2>
<div id="tr_indexview_actions">
	<div class="actions">
	<ul>
		<li>
		<?php echo $this->Html->link($this->Html->image('tr/Add.png') . " " . __('New Contacts Tag'), array('action' => 'add'), array('escape' => false)); ?>
		</li>
		<li><a href="javascript:toggleTrFilter()"><?php echo $this->Html->image('tr/Search.png'); ?> Search / Filter</a></li>
	</ul>
	</div>
</div>
<div id="tr_indexview_filter">
		<?php echo $this->Filter->filterForm('Contacts Tag', array('legend' => 'Search')); ?>
</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('contact_id');?></th>
			<th><?php echo $this->Paginator->sort('tag_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($contactsTags as $contactsTag): ?>
	<tr>
		<td><?php echo h($contactsTag['ContactsTag']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($contactsTag['Contact']['name'], array('controller' => 'contacts', 'action' => 'view', $contactsTag['Contact']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($contactsTag['Tag']['name'], array('controller' => 'tags', 'action' => 'view', $contactsTag['Tag']['id'])); ?>
		</td>
		<td><?php echo $this->Time->nice(h($contactsTag['ContactsTag']['created'])); ?>&nbsp;</td>
		<td><?php echo $this->Time->nice(h($contactsTag['ContactsTag']['updated'])); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $contactsTag['ContactsTag']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $contactsTag['ContactsTag']['id']), null, __('Are you sure you want to delete # %s?', $contactsTag['ContactsTag']['id'])); ?>
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
