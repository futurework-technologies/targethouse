<?php
App::uses("AppController","Controller");

class ErrorsController extends AppController{
    public $name = 'Errors';

    public function beforeFilter() {
        $this->layout = "error";
        parent::beforeFilter();
        $this->Auth->allow('error404','error400','error500');
    }

    public function error404() {
        //$this->layout = 'default';
    }
    public function error400(){
        
    }
}