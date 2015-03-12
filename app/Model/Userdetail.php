<?php



/*

 * To change this license header, choose License Headers in Project Properties.

 * To change this template file, choose Tools | Templates

 * and open the template in the editor.

 */



App::uses("AppModel", "Model");



class Userdetail extends AppModel {



    public $belongsTo = array(

        'Details' => array(

            'className' => 'Details',

            'foreignKey' => 'detail_id',

            'conditions' => '',

            'fields' => '',

            'order' => ''

        )

    );
    
 
}



?>

