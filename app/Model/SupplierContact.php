<?php
App::uses('AppModel', 'Model');
/**
 * SupplierContact Model
 *
 * @property Supplier $Supplier
 */
class SupplierContact extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Supplier' => array(
			'className' => 'Supplier',
			'foreignKey' => 'supplier_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
