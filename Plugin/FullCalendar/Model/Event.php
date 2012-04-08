<?php
/*
 * Model/Event.php
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */
 
class Event extends FullCalendarAppModel {
	var $name = 'Event';
	var $displayField = 'title';
	var $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
		'start' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		)
	);

	var $belongsTo = array(
		'EventType' => array(
			'className' => 'FullCalendar.EventType',
			'foreignKey' => 'event_type_id'
		)
	);

        public $hasAndBelongsToMany = array(
                'Tag' => array(
                        'className' => 'Tag',
                        'joinTable' => 'events_tags',
                        'foreignKey' => 'event_id',
                        'associationForeignKey' => 'tag_id',
                        'unique' => 'keepExisting',
                        'conditions' => '',
                        'fields' => '',
                        'order' => '',
                        'limit' => '',
                        'offset' => '',
                        'finderQuery' => '',
                        'deleteQuery' => '',
                        'insertQuery' => ''
                ),
                'User' => array(
                        'className' => 'User',
                        'joinTable' => 'events_users',
                        'foreignKey' => 'event_id',
                        'associationForeignKey' => 'user_id',
                        'unique' => 'keepExisting',
                        'conditions' => '',
                        'fields' => '',
                        'order' => '',
                        'limit' => '',
                        'offset' => '',
                        'finderQuery' => '',
                        'deleteQuery' => '',
                        'insertQuery' => ''
                )
        );

}
?>
