<?php

App::uses('AppController', 'Controller');

/**
 * Pdetails Controller
 *
 * @property Pdetail $Pdetail
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PdetailsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array('detail_form', 'submit_form','detail','material','chk'));
    }

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Pdetail->recursive = 0;
        $this->set('details', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Pdetail->exists($id)) {
            throw new NotFoundException(__('Invalid detail'));
        }
        $options = array('conditions' => array('Pdetail.' . $this->Pdetail->primaryKey => $id));
        $this->set('detail', $this->Pdetail->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Pdetail->create();
            if ($this->Pdetail->save($this->request->data)) {
                $this->Session->setFlash(__('The detail has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The detail could not be saved. Please, try again.'));
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
        if (!$this->Pdetail->exists($id)) {
            throw new NotFoundException(__('Invalid detail'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Pdetail->save($this->request->data)) {
                $this->Session->setFlash(__('The detail has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The detail could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Pdetail.' . $this->Pdetail->primaryKey => $id));
            $this->request->data = $this->Pdetail->find('first', $options);
        }
    }

    public function test() {
        if ($this->request->is('post')) {
            $this->Pdetail->create();
            $id = $this->request->data['Pdetail']['id'];
            if ($this->Pdetail->save($this->request->data)) {
                $this->set("res", array(
                    'r' => 1,
                    'id' => $id
                ));
                $this->response->type('json');
                $this->render('/Common/ajax', 'ajax');
            }
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
        $this->Pdetail->id = $id;
        if (!$this->Pdetail->exists()) {
            throw new NotFoundException(__('Invalid detail'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Pdetail->delete()) {
            $this->Session->setFlash(__('The detail has been deleted.'));
        } else {
            $this->Session->setFlash(__('The detail could not be deleted. Please, try again.'));
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
        $this->Pdetail->recursive = 0;
        $this->set('details', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Pdetail->exists($id)) {
            throw new NotFoundException(__('Invalid detail'));
        }
        $options = array('conditions' => array('Pdetail.' . $this->Pdetail->primaryKey => $id));
        $this->set('detail', $this->Pdetail->find('first', $options));
    }

    public function detail($id = null) {
             $this->loadModel('Article');
        $data = $this->Article->find('first', array('conditions' => array('Article.id' => $id)));
        //debug($data); exit;
        $this->set('category', $data);
       
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        $this->layout = "admin";

      
         
         $this->loadModel('Article');
        $payment = $this->Article->find('all');
        $this->set('payments', $payment);

        if ($this->request->is('post')) {
            $one = $this->request->data['Pdetail']['image'];
            $image_name = $this->request->data['Pdetail']['image'] = time() . "-" . $one['name'];
            $this->Pdetail->create();
            if ($this->Pdetail->save($this->request->data)) {
                if ($one['error'] == 0) {
                    $pth = 'files' . DS . 'logos' . DS . $image_name;
                    move_uploaded_file($one['tmp_name'], $pth);
                }
                $this->Session->setFlash(__('The Pdetail has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The Pdetail could not be saved. Please, try again.'));
            }
        }
          $this->loadModel('Category');
        $payment_types = $this->Category->find('all');
         $this->set('payment_types', $payment_types);
        
        
    }

    public function submit_form($id = null) {
          //$this->layout = "ajax";
        $data = $this->Pdetail->find('first', array('conditions' => array('Pdetail.id' => $id)));
        //debug($data); exit;
        $this->set('category', $data);

        $product = $this->Pdetail->find('all');
        // debug($product);exit;
        $this->set('products', $product);
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Pdetail->exists($id)) {
            throw new NotFoundException(__('Invalid detail'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Pdetail->save($this->request->data)) {
                $this->Session->setFlash(__('The detail has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The detail could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Pdetail.' . $this->Pdetail->primaryKey => $id));
            $this->request->data = $this->Pdetail->find('first', $options);
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
        $this->Pdetail->id = $id;
        if (!$this->Pdetail->exists()) {
            throw new NotFoundException(__('Invalid detail'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Pdetail->delete()) {
            $this->Session->setFlash(__('The detail has been deleted.'));
        } else {
            $this->Session->setFlash(__('The detail could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function chk() {
        if ($this->request->is('post')) {
            $Pid = $this->request->data;
            $res = $this->Pdetail->find('first', array('conditions' => array('Pdetail.size' => $Pid)));
            $this->set("res", $res);
            $this->response->type('json');
            $this->render('/Common/ajax', 'ajax');
        }
    }

    public function imagesize() {
        if ($this->request->is('post')) {
            $title = $this->request->data;
            $res = $this->Detail->find('first', array('conditions' => array('Detail.size' => $title)));
            $this->set("res", $res);
            $this->response->type('json');
            $this->render('/Common/ajax', 'ajax');
        }
    }

//    public function detail_form($id=null) {
//        $payment_types = $this->Pdetail->find('all');
//        $this->set('payment_types', $payment_types);
//        
//          $this->loadModel('Userdetail');
//           $image = $this->Userdetail->find("first", array('conditions' => array('Userdetail.user_id'=>$this->Auth->user('id'))));
//           //debug($image);exit;
//           $this->set("ord", $image);
//           
//           $this->loadModel('Order');
//           if ($this->request->is(array('post', 'put'))) {
//			if ($this->Order->save($this->request->data)) {
//				$this->Session->setFlash(__('The detail has been saved.'));
//				return $this->redirect(array('controller'=>'orders', 'action' => 'orders',$id));
//			} else {
//				$this->Session->setFlash(__('The detail could not be saved. Please, try again.'));
//			}
//		}
//        }
    
    
    public function material($catname="null"){
            $this->paginate = $this->paginate = array('conditions'=>array('Pdetail.Article'=>$catname),'order'=>array('Pdetail.id'=>'DESC'),'limit'=>10);
         $res=$this->paginate('Pdetail');
//        $res=  $this->Product->find("all",array('conditions'=>array('Product.categorie_name'=>$catname)));   
        //debug($res);
        $this->set("flakater",$res);
    }
    
    
}
