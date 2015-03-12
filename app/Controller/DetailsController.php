<?php

App::uses('AppController', 'Controller');

/**
 * Details Controller
 *
 * @property Detail $Detail
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DetailsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array('detail_form'));
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
        $this->Detail->recursive = 0;
        $this->set('details', $this->Paginator->paginate());
    }

    public function detail_form($id = null) {
        

        $this->loadModel('Userdetail');
        $image = $this->Userdetail->find("first", array('conditions' => array('Userdetail.user_id'=>  $this->Auth->user('id'))));       
        $this->set("ord", $image);
        $this->loadModel('Order');
        $ord=$this->Order->find('first',array('conditions'=>array('Order.id'=>$this->Session->read("oId"))));
        $this->set("orders",$ord);
        
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Detail->exists($id)) {
            throw new NotFoundException(__('Invalid detail'));
        }
        $options = array('conditions' => array('Detail.' . $this->Detail->primaryKey => $id));
        $this->set('detail', $this->Detail->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Detail->create();
            if ($this->Detail->save($this->request->data)) {
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
        if (!$this->Detail->exists($id)) {
            throw new NotFoundException(__('Invalid detail'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Detail->save($this->request->data)) {
                $this->Session->setFlash(__('The detail has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The detail could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Detail.' . $this->Detail->primaryKey => $id));
            $this->request->data = $this->Detail->find('first', $options);
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
        $this->Detail->id = $id;
        if (!$this->Detail->exists()) {
            throw new NotFoundException(__('Invalid detail'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Detail->delete()) {
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
        $this->Detail->recursive = 0;
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
        if (!$this->Detail->exists($id)) {
            throw new NotFoundException(__('Invalid detail'));
        }
        $options = array('conditions' => array('Detail.' . $this->Detail->primaryKey => $id));
        $this->set('detail', $this->Detail->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Detail->create();
            if ($this->Detail->save($this->request->data)) {
                $this->Session->setFlash(__('The detail has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The detail could not be saved. Please, try again.'));
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
        if (!$this->Detail->exists($id)) {
            throw new NotFoundException(__('Invalid detail'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Detail->save($this->request->data)) {
                $this->Session->setFlash(__('The detail has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The detail could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Detail.' . $this->Detail->primaryKey => $id));
            $this->request->data = $this->Detail->find('first', $options);
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
        $this->Detail->id = $id;
        if (!$this->Detail->exists()) {
            throw new NotFoundException(__('Invalid detail'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Detail->delete()) {
            $this->Session->setFlash(__('The detail has been deleted.'));
        } else {
            $this->Session->setFlash(__('The detail could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function chk() {
        if ($this->request->is('post')) {
            $Pid = $this->request->data;
            $res = $this->Detail->find('first', array('conditions' => array('Detail.id' => $Pid)));
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
//        $payment_types = $this->Detail->find('all');
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
}
