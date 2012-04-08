<div class="dealNotes view">
<h2><?php  echo __('Deal Note');?></h2>
<div id="tr_indexview_actions">
	<div class="actions">
	<ul>	
		<li><?php echo $this->Html->link($this->Html->image('tr/Edit.png') . ' ' . __('Edit Deal Note'), array('action' => 'edit', $dealNote['DealNote']['id']), array('escape' => false)); ?></li>
		<li><?php echo $this->Html->link($this->Html->image('tr/Copy.png') . ' ' . __('Copy Deal Note'), array('action' => 'edit', $dealNote['DealNote']['id'], 'copy'), array('escape' => false)); ?></li>
		<li><?php echo $this->Form->postLink($this->Html->image('tr/Delete.png') . ' ' . __('Delete Deal Note'), array('action' => 'delete', $dealNote['DealNote']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $dealNote['DealNote']['id'])); ?></li>
	</ul>
	</div>
</div>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($dealNote['DealNote']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deal'); ?></dt>
		<dd>
			<?php echo $this->Html->link($dealNote['Deal']['name'], array('controller' => 'deals', 'action' => 'view', $dealNote['Deal']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($dealNote['DealNote']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($dealNote['DealNote']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time'); ?></dt>
		<dd>
			<?php echo h($dealNote['DealNote']['time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($dealNote['DealNote']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($dealNote['DealNote']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<?php echo $this->element('tr_menu'); ?></div>
