<?php

App::uses('AppController', 'Controller');

/**
 * Coupans Controller
 *
 * @property Coupan $Coupan
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CoupansController extends AppController {
    
      public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array('contact'));
    }

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');
    
    
    public function get(){
        if(!$this->request->is(array('post'))){
            throw new NotFoundException("Page Not Found");
        }
        $x = $this->Coupan->find("first",array(
            "conditions"=>array(
                "Coupan.coupanname" => $this->request->data['code']
            )
        ));
        $res = array(
            "count" => 0,
            "data" => "Invalid Coupon Code"
        );
        if(!empty($x)){
            $res = array(
                "count" => 1,
                "data" => $x
            );
        }
        $this->autoRender = false;
        $this->response->type('json');
        $this->response->body(json_encode($res));
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Coupan->recursive = 0;
        $this->set('contacts', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Coupan->exists($id)) {
            throw new NotFoundException(__('Invalid contact'));
        }
        $options = array('conditions' => array('Coupan.' . $this->Coupan->primaryKey => $id));
        $this->set('contact', $this->Coupan->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function contact() {
        if ($this->request->is('post')) {
            $this->Coupan->create();
            if ($this->Coupan->save($this->request->data)) {
                $this->Session->setFlash(__('The contact has been saved.'));
                return $this->redirect(array('action' => 'contact'));
            } else {
                $this->Session->setFlash(__('The contact could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Coupan->exists($id)) {
            throw new NotFoundException(__('Invalid contact'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Coupan->save($this->request->data)) {
                $this->Session->setFlash(__('The contact has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The contact could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Coupan.' . $this->Coupan->primaryKey => $id));
            $this->request->data = $this->Coupan->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Coupan->id = $id;
        if (!$this->Coupan->exists()) {
            throw new NotFoundException(__('Invalid contact'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Coupan->delete()) {
            $this->Session->setFlash(__('The contact has been deleted.'));
        } else {
            $this->Session->setFlash(__('The contact could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->layout = "admin";
        $this->Coupan->recursive = 0;
        $this->set('contacts', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
         $this->layout = "admin";
        if (!$this->Coupan->exists($id)) {
            throw new NotFoundException(__('Invalid contact'));
        }
        $options = array('conditions' => array('Coupan.' . $this->Coupan->primaryKey => $id));
        $this->set('contact', $this->Coupan->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
            $this->layout = "admin";
        if ($this->request->is('post')) {
            $this->Coupan->create();
            if ($this->Coupan->save($this->request->data)) {
                $this->Session->setFlash(__('The coupan has been saved.'));
                return $this->redirect(array('action' => 'add'));
            } else {
                $this->Session->setFlash(__('The coupan could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Coupan->exists($id)) {
            throw new NotFoundException(__('Invalid contact'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Coupan->save($this->request->data)) {
                $this->Session->setFlash(__('The contact has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The contact could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Coupan.' . $this->Coupan->primaryKey => $id));
            $this->request->data = $this->Coupan->find('first', $options);
        }
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Coupan->id = $id;
        if (!$this->Coupan->exists()) {
            throw new NotFoundException(__('Invalid contact'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Coupan->delete()) {
            $this->Session->setFlash(__('The contact has been deleted.'));
        } else {
            $this->Session->setFlash(__('The contact could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
     
    public function test(){
        $this->loadModel('User');
        $res=  $this->User->find('all',array('fields'=>'username'));
        $this->set("res",$res);
    }
}
