<?php
App::uses("AppModel", "Model");
/**
 * 
 */

class Order extends AppModel {

//    public $belongsTo = array(
//
//        'Details' => array(
//
//            'className' => 'Details',
//
//            'foreignKey' => 'detail_id',
//
//            'conditions' => '',
//
//            'fields' => '',
//
//            'order' => ''
//
//        )
//
//    );

    public $hasMany = array(
        'Inlineitem' => array(
            'className' => 'Inlineitem',
            'foreignKey' => 'order_id',
            'dependent' => true,
            'fields' => '',
            //'conditions' => array('Inlineitem.status' => '1'),
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
    );

    public function beforeSave($options = array()) {
        parent::beforeSave($options);
        $this->data[$this->alias]['created_on'] = time();
    }

}
?>

