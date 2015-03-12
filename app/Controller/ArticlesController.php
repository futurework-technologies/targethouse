<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * CakePHP ArticlesController.php
 * @author Ajay_WD
 */
class ArticlesController extends AppController {

public function index($id){

}


 public function admin_add() {
        $this->layout = "admin";
        
        $this->loadModel('Category');
        $payment_types = $this->Category->find('all');
        $this->set('payment_types', $payment_types);
        
        if ($this->request->is('post')) {
            $one = $this->request->data['Article']['image'];
            $image_name = $this->request->data['Article']['image'] = date('dmHis') . $one['name'];
            $this->Article->create();
            if ($this->Article->save($this->request->data)) {
                if ($one['error'] == 0) {
                    $pth = 'files' . DS . 'logos' . DS . $image_name;
                    move_uploaded_file($one['tmp_name'], $pth);
                }
                $this->Session->setFlash(__('The Article has been saved'));
                $this->redirect(array('action' => 'add'));
            } else {
                $this->Session->setFlash(__('The Article could not be saved. Please, try again.'));
            }
        }
    } 
}
