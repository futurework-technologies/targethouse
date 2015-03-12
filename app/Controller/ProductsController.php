<?php

App::uses('AppController', 'Controller');

/**
 * Products Controller
 *
 * @property Product $Product
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ProductsController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array('admin_add','admin_login','userlogin','register','product'));
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

        $this->Product->recursive = 0;
        $this->set('products', $x = $this->Paginator->paginate());
        debug($x);
        exit;
    }
    
    
    
      public function product_detail($id = null) {
               
           $data = $this->Product->find('first', array('conditions' => array('Product.id' => $id)));
          // debug($data); exit;
           $this->set('category', $data);

        $product = $this->Product->find('all');
        // debug($product);exit;
        $this->set('products', $product);
    }
    
    
      public function product($catname="null") {
              
          
          $this->loadModel('Pdetail');
           $product = $this->Pdetail->find('all');
          $this->set('product', $product);
          
         
         $this->paginate = $this->paginate = array('conditions'=>array('Product.Article'=>$catname),'order'=>array('Product.id'=>'DESC'),'limit'=>2);
         $res=$this->paginate('Product');
//        $res=  $this->Product->find("all",array('conditions'=>array('Product.categorie_name'=>$catname)));   
        //debug($res);
        $this->set("flakater",$res);
        
        
        
       }
        
//    $this->paginate = array('conditions'=>array('User.status'=>1),'order'=>array('User.id'=>'DESC'),'limit'=>2);
//        $data=$this->paginate('User');
//        $this->set('user',$data);
        
        
    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Product->exists($id)) {
            throw new NotFoundException(__('Invalid product'));
        }
        $options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
        $this->set('product', $this->Product->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Product->create();
            if ($this->Product->save($this->request->data)) {
                $this->Session->setFlash(__('The product has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The product could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Product->Category->find('list');
        $this->set(compact('categories'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Product->exists($id)) {
            throw new NotFoundException(__('Invalid product'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Product->save($this->request->data)) {
                $this->Session->setFlash(__('The product has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The product could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
            $this->request->data = $this->Product->find('first', $options);
        }
        $categories = $this->Product->Category->find('list');
        $this->set(compact('categories'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Product->id = $id;
        if (!$this->Product->exists()) {
            throw new NotFoundException(__('Invalid product'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Product->delete()) {
            $this->Session->setFlash(__('The product has been deleted.'));
        } else {
            $this->Session->setFlash(__('The product could not be deleted. Please, try again.'));
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
        $this->Product->recursive = 0;
        $this->set('products', $x = $this->Paginator->paginate());
        // debug($x);exit;
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
        if (!$this->Product->exists($id)) {
            throw new NotFoundException(__('Invalid product'));
        }
        $options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
        $this->set('product', $this->Product->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        $this->layout = "admin";
        
        $this->loadModel('Category');
           $payment_type = $this->Category->find('all');
           //debug($payment_type);exit;
          $this->set('payment_types', $payment_type);
        
        
        if ($this->request->is('post')) {
                $one = $this->request->data['Product']['product_image'];
                $image_name = $this->request->data['Product']['product_image'] = time() . "-" . $one['name'];
                $this->Product->create();
                if ($this->Product->save($this->request->data)) {
                    if ($one['error'] == 0) {
                        $pth = 'files' . DS . 'logos' . DS . $image_name;
                        move_uploaded_file($one['tmp_name'], $pth);
                    }
                    $this->Session->setFlash(__('The Product has been saved'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The Product could not be saved. Please, try again.'));
                }
            }
            
          $this->loadModel('Article');
        $payments = $this->Article->find('all');
        $this->set('payments', $payments);
            
            
        }
    

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->layout = "admin";
        if (!$this->Product->exists($id)) {
            throw new NotFoundException(__('Invalid product'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Product->save($this->request->data)) {
                $this->Session->setFlash(__('The product has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The product could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
            $this->request->data = $this->Product->find('first', $options);
        }
//        $categories = $this->Product->Category->find('list');
//        $this->set(compact('categories'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->layout = "admin";
        $this->Product->id = $id;
        if (!$this->Product->exists()) {
            throw new NotFoundException(__('Invalid product'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Product->delete()) {
            $this->Session->setFlash(__('The product has been deleted.'));
        } else {
            $this->Session->setFlash(__('The product could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
    
       public function chk() {
        if ($this->request->is('post')) {
            $Pid = $this->request->data;
            $res = $this->Product->find('first', array('conditions' => array('Product.size' => $Pid)));
            $this->set("res", $res);
            $this->response->type('json');
            $this->render('/Common/ajax', 'ajax');
        }
    }
    

}
