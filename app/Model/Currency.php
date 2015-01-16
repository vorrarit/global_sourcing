<?php
App::uses('AppModel', 'Model');
/**
 * Currency Model
 *
 * @property Product $Product
 * @property SupplierProduct $SupplierProduct
 */
class Currency extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'currency_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'SupplierProduct' => array(
			'className' => 'SupplierProduct',
			'foreignKey' => 'currency_id',
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
