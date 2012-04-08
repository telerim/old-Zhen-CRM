<div class="contactsTags view">
<h2><?php  echo __('Contacts Tag');?></h2>
<div id="tr_indexview_actions">
	<div class="actions">
	<ul>	
		<li><?php echo $this->Html->link($this->Html->image('tr/Edit.png') . ' ' . __('Edit Contacts Tag'), array('action' => 'edit', $contactsTag['ContactsTag']['id']), array('escape' => false)); ?></li>
		<li><?php echo $this->Html->link($this->Html->image('tr/Copy.png') . ' ' . __('Copy Contacts Tag'), array('action' => 'edit', $contactsTag['ContactsTag']['id'], 'copy'), array('escape' => false)); ?></li>
		<li><?php echo $this->Form->postLink($this->Html->image('tr/Delete.png') . ' ' . __('Delete Contacts Tag'), array('action' => 'delete', $contactsTag['ContactsTag']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $contactsTag['ContactsTag']['id'])); ?></li>
	</ul>
	</div>
</div>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($contactsTag['ContactsTag']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact'); ?></dt>
		<dd>
			<?php echo $this->Html->link($contactsTag['Contact']['name'], array('controller' => 'contacts', 'action' => 'view', $contactsTag['Contact']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tag'); ?></dt>
		<dd>
			<?php echo $this->Html->link($contactsTag['Tag']['name'], array('controller' => 'tags', 'action' => 'view', $contactsTag['Tag']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($contactsTag['ContactsTag']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($contactsTag['ContactsTag']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<?php echo $this->element('tr_menu'); ?></div>
