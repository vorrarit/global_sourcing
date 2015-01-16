<?php
App::uses('AppModel', 'Model');
/**
 * SubKlass Model
 *
 * @property Division $Division
 * @property Department $Department
 * @property Klass $Klass
 * @property Product $Product
 */
class SubKlass extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Division' => array(
			'className' => 'Division',
			'foreignKey' => 'division_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Department' => array(
			'className' => 'Department',
			'foreignKey' => 'department_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Klass' => array(
			'className' => 'Klass',
			'foreignKey' => 'klass_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'sub_klass_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
