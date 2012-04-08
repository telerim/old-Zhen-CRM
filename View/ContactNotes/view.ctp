<div class="contactNotes view">
<h2><?php  echo __('Contact Note');?></h2>
<div id="tr_indexview_actions">
	<div class="actions">
	<ul>	
		<li><?php echo $this->Html->link($this->Html->image('tr/Edit.png') . ' ' . __('Edit Contact Note'), array('action' => 'edit', $contactNote['ContactNote']['id']), array('escape' => false)); ?></li>
		<li><?php echo $this->Html->link($this->Html->image('tr/Copy.png') . ' ' . __('Copy Contact Note'), array('action' => 'edit', $contactNote['ContactNote']['id'], 'copy'), array('escape' => false)); ?></li>
		<li><?php echo $this->Form->postLink($this->Html->image('tr/Delete.png') . ' ' . __('Delete Contact Note'), array('action' => 'delete', $contactNote['ContactNote']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $contactNote['ContactNote']['id'])); ?></li>
	</ul>
	</div>
</div>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($contactNote['ContactNote']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact'); ?></dt>
		<dd>
			<?php echo $this->Html->link($contactNote['Contact']['name'], array('controller' => 'contacts', 'action' => 'view', $contactNote['Contact']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($contactNote['ContactNote']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($contactNote['ContactNote']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time'); ?></dt>
		<dd>
			<?php echo h($contactNote['ContactNote']['time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($contactNote['ContactNote']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($contactNote['ContactNote']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<?php echo $this->element('tr_menu'); ?></div>
