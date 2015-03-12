<?php

App::uses("AppModel", "Model");

/**
 * 
 */
class Inlineitem extends AppModel {

    public $belongsTo = array(
        'Order' => array(
            'className' => 'Order',
            'foreignKey' => 'order_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Pdetail' => array(
            'className' => 'Pdetail',
            'foreignKey' => 'pdetail_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Product' => array(
            'className' => 'Product',
            'foreignKey' => 'product_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
    );

}

?>
