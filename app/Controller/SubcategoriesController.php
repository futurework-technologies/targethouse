<?php

App::uses('AppController', 'Controller');

/** * Subcategories Controller * * @property Subcategory $Subcategory * @property 
  PaginatorComponent $Paginator * @property SessionComponent $Session */
class SubcategoriesController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array('admin_add', 'flakater', 'test', 'admin_view', 'admin_edit', 'admin_index', 'test'));
    }

    /**     * Components * * @var array */
    public $components = array('Paginator', 'Session');

    public function test($id = null) {
        $data = $this->Subcategory->find('first', array('conditions' => array('Subcategory.id' => $id)));
        // debug($data); exit;
        $this->set('category', $data);
    }

    public function admin_add() {
        $this->layout = "admin";		if ($this->request->is('post')) {            $one = $this->request->data['Subcategory']['image'];            $image_name = $this->request->data['Subcategory']['image'] = date('dmHis') . $one['name'];            $this->Subcategory->create();            if ($this->Subcategory->save($this->request->data)) {                if ($one['error'] == 0) {                    $pth = 'files' . DS . 'logos' . DS . $image_name;                    move_uploaded_file($one['tmp_name'], $pth);                }                $this->Session->setFlash(__('The Subcategory has been saved'));                $this->redirect(array('action' => 'add'));            } else {                $this->Session->setFlash(__('The Subcategory could not be saved. Please, try again.'));            }          }
        $this->loadModel('Category');
        $payment_types = $this->Category->find('all');
        $this->set('payment_types', $payment_types);
}

    //}
}
