<?php
App::uses('AppModel', 'Model');
/**
 * Payment Model
 *
 * @property User $User
 * @property Shop $Shop
 * @property PaypalTransaction $PaypalTransaction
 */
class Payment extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Order' => array(
			'className' => 'Order',
			'foreignKey' => 'order_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);
}
