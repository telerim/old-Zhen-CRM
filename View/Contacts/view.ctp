<div class="contacts view">
<h2><?php  echo __('Contact');?></h2>
<div id="tr_indexview_actions">
	<div class="actions">
	<ul>	
		<li><?php echo $this->Html->link($this->Html->image('tr/Edit.png') . ' ' . __('Edit Contact'), array('action' => 'edit', $contact['Contact']['id']), array('escape' => false)); ?></li>
		<li><?php echo $this->Html->link($this->Html->image('tr/Copy.png') . ' ' . __('Copy Contact'), array('action' => 'edit', $contact['Contact']['id'], 'copy'), array('escape' => false)); ?></li>
		<li><?php echo $this->Form->postLink($this->Html->image('tr/Delete.png') . ' ' . __('Delete Contact'), array('action' => 'delete', $contact['Contact']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $contact['Contact']['id'])); ?></li>
	</ul>
	</div>
</div>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($contact['Contact']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($contact['Contact']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company Name'); ?></dt>
		<dd>
			<?php echo h($contact['Contact']['company_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact Status'); ?></dt>
		<dd>
			<?php echo $this->Html->link($contact['ContactStatus']['name'], array('controller' => 'contact_statuses', 'action' => 'view', $contact['ContactStatus']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address1'); ?></dt>
		<dd>
			<?php echo h($contact['Contact']['address1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address2'); ?></dt>
		<dd>
			<?php echo h($contact['Contact']['address2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($contact['Contact']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo h($contact['Contact']['state']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($contact['Contact']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($contact['Contact']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($contact['User']['name'], array('controller' => 'users', 'action' => 'view', $contact['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($contact['Contact']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($contact['Contact']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
<br/><br/>
<div class="related">
	<h3><?php echo __('Associated Contact Notes');?></h3>
	<?php if (!empty($contact['ContactNote'])):?>
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
		foreach ($contact['ContactNote'] as $contactNote): ?>
		<tr>
			<td><?php echo $contactNote['id'];?></td>
			<td><?php echo $this->Html->link($contactNote['name'], array('controller' => 'contact_notes', 'action' => 'view', $contactNote['id'])); ?></td>
			<td><?php echo $contactNote['description'];?></td>
			<td><?php echo $contactNote['time'];?></td>
			<td><?php echo $contactNote['created'];?></td>
			<td><?php echo $contactNote['updated'];?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Contact Note'), '/contact_notes/add/contact:' . $contact['Contact']['id']);?> </li>
		</ul>
	</div>
</div>
<br/><br/>
<div class="related">
	<h3><?php echo __('Associated Deals');?></h3>
	<?php if (!empty($contact['Deal'])):?>
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
		foreach ($contact['Deal'] as $deal): ?>
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
			<li><?php echo $this->Html->link(__('New Deal'), '/deals/add/contact:' . $contact['Contact']['id']);?> </li>
		</ul>
	</div>
</div>
<br/><br/>
<div class="related">
	<h3><?php echo __('Associated Tags');?></h3>
	<?php if (!empty($contact['Tag'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($contact['Tag'] as $tag): ?>
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
			<li><?php echo $this->Html->link(__('New Tag'), '/tags/add/contact:' . $contact['Contact']['id']);?> </li>
		</ul>
	</div>
</div>
</div>
<div class="actions">
	<?php echo $this->element('tr_menu'); ?></div>
