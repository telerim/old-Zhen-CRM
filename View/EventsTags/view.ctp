<div class="eventsTags view">
<h2><?php  echo __('Events Tag');?></h2>
<div id="tr_indexview_actions">
	<div class="actions">
	<ul>	
		<li><?php echo $this->Html->link($this->Html->image('tr/Edit.png') . ' ' . __('Edit Events Tag'), array('action' => 'edit', $eventsTag['EventsTag']['id']), array('escape' => false)); ?></li>
		<li><?php echo $this->Html->link($this->Html->image('tr/Copy.png') . ' ' . __('Copy Events Tag'), array('action' => 'edit', $eventsTag['EventsTag']['id'], 'copy'), array('escape' => false)); ?></li>
		<li><?php echo $this->Form->postLink($this->Html->image('tr/Delete.png') . ' ' . __('Delete Events Tag'), array('action' => 'delete', $eventsTag['EventsTag']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $eventsTag['EventsTag']['id'])); ?></li>
	</ul>
	</div>
</div>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($eventsTag['EventsTag']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($eventsTag['Event']['title'], array('controller' => 'events', 'action' => 'view', $eventsTag['Event']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tag'); ?></dt>
		<dd>
			<?php echo $this->Html->link($eventsTag['Tag']['name'], array('controller' => 'tags', 'action' => 'view', $eventsTag['Tag']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($eventsTag['EventsTag']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($eventsTag['EventsTag']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<?php echo $this->element('tr_menu'); ?></div>
