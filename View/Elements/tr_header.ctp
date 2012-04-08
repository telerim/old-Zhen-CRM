<div class="actions">
<ul>
        <li><?php echo $this->Html->link($this->Html->image("tr/Contacts_Add.png") . " " . __('New Contact'), array('controller' => 'contacts', 'action' => 'add', 'plugin' => ''), array('escape' => false)); ?> </li>
        <li><?php echo $this->Html->link($this->Html->image("tr/Events_Add.png") . " " . __('New Event'), array('controller' => 'events', 'action' => 'add', 'plugin' => 'full_calendar'), array('escape' => false)); ?> </li>
        <li><?php echo $this->Html->link($this->Html->image("tr/Deals_Add.png") . " " . __('New Deal'), array('controller' => 'deals', 'action' => 'add', 'plugin' => ''), array('escape' => false)); ?> </li>
</ul>
</div>
