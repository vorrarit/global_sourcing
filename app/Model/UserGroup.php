<?php
App::uses('AppModel', 'Model');
/**
 * UserGroup Model
 *
 * @property User $User
 */
class UserGroup extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_group_id',
                        'conditions' => '',
                        'fields' => '',
			'order' => ''
		)
	);

}
