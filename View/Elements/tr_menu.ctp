        <ul>
                <li><?php echo $this->Html->link($this->Html->image("tr/Contacts.png") . " " .  __('Contacts'), array('controller' => 'contacts', 'action' => 'index', 'plugin' => ''), array('escape' => false)); ?> </li>
                <li><?php echo $this->Html->link($this->Html->image("tr/Tags.png") . " " .  __('Tags'), array('controller' => 'tags', 'action' => 'index', 'plugin' => ''), array('escape' => false)); ?> </li>
                <li><?php echo $this->Html->link($this->Html->image("tr/Calendar.png") . " " .  __('Calendar'), array('controller' => '', 'action' => 'index', 'plugin' => 'full_calendar'), array('escape' => false)); ?> </li>
                <li><?php echo $this->Html->link($this->Html->image("tr/Events.png") . " " .  __('Events'), array('controller' => 'events', 'action' => 'index', 'plugin' => 'full_calendar'), array('escape' => false)); ?> </li>
                <li><?php echo $this->Html->link($this->Html->image("tr/Deals.png") . " " .  __('Deals'), array('controller' => 'deals', 'action' => 'index', 'plugin' => ''), array('escape' => false)); ?> </li>
		<br/>
                <li><?php echo $this->Html->link($this->Html->image("tr/Reports.png") . " " .  __('Reports'), array('controller' => 'reports', 'action' => 'index', 'plugin' => 'report_manager'), array('escape' => false)); ?> </li>
                <li><?php echo $this->Html->link($this->Html->image("tr/Users.png") . " " .  __('Users'), array('controller' => '', 'action' => 'user_dashboard', 'plugin' => ''), array('escape' => false)); ?> </li>
        </ul>
