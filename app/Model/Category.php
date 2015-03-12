<?php

App::uses('AppModel', 'Model');

/** * Subcategory Model * * @property 
  Categories $Categories */
class Category extends AppModel {

    /**     * Display field * * @var string */
    public $displayField = 'categorie_name';
//The Associations below have been created with all possible keys, those that are not needed can be removed
    /**     * belongsTo associations * * @var array */
        public $hasMany = array(
		'Article' => array(
			'className' => 'Article',
			'foreignKey' => 'Category',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
       );

    
    
}
