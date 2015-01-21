<?php
App::uses('AppModel', 'Model');
/**
 * SupplierType Model
 *
 * @property SupplierProduct $SupplierProduct
 */
class SupplierType extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'SupplierProduct' => array(
			'className' => 'SupplierProduct',
			'foreignKey' => 'supplier_type_id',
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
