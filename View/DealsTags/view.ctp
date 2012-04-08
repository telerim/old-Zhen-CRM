<div class="dealsTags view">
<h2><?php  echo __('Deals Tag');?></h2>
<div id="tr_indexview_actions">
	<div class="actions">
	<ul>	
		<li><?php echo $this->Html->link($this->Html->image('tr/Edit.png') . ' ' . __('Edit Deals Tag'), array('action' => 'edit', $dealsTag['DealsTag']['id']), array('escape' => false)); ?></li>
		<li><?php echo $this->Html->link($this->Html->image('tr/Copy.png') . ' ' . __('Copy Deals Tag'), array('action' => 'edit', $dealsTag['DealsTag']['id'], 'copy'), array('escape' => false)); ?></li>
		<li><?php echo $this->Form->postLink($this->Html->image('tr/Delete.png') . ' ' . __('Delete Deals Tag'), array('action' => 'delete', $dealsTag['DealsTag']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $dealsTag['DealsTag']['id'])); ?></li>
	</ul>
	</div>
</div>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($dealsTag['DealsTag']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deal'); ?></dt>
		<dd>
			<?php echo $this->Html->link($dealsTag['Deal']['name'], array('controller' => 'deals', 'action' => 'view', $dealsTag['Deal']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tag'); ?></dt>
		<dd>
			<?php echo $this->Html->link($dealsTag['Tag']['name'], array('controller' => 'tags', 'action' => 'view', $dealsTag['Tag']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($dealsTag['DealsTag']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($dealsTag['DealsTag']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<?php echo $this->element('tr_menu'); ?></div>
