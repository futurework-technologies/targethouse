<?php

App::uses('AppController', 'Controller');

/**
 * Sliders Controller
 *
 * @property Slider $Slider
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property MailchimpComponent $Mailchimp
 */
class SlidersController extends AppController {
    
     public function beforeFilter() {
         parent::beforeFilter();
        $this->Auth->allow(array());
    }
    
    



      
    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session','Mailchimp');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Slider->recursive = 0;
        $this->set('subscribers', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Slider->exists($id)) {
            throw new NotFoundException(__('Invalid subscriber'));
        }
        $options = array('conditions' => array('Slider.' . $this->Slider->primaryKey => $id));
        $this->set('subscriber', $this->Slider->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Slider->create();
            if ($this->Slider->save($this->request->data)) {
                $this->Session->setFlash(__('The subscriber has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The subscriber could not be saved. Please, try again.'));
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
        if (!$this->Slider->exists($id)) {
            throw new NotFoundException(__('Invalid subscriber'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Slider->save($this->request->data)) {
                $this->Session->setFlash(__('The subscriber has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The subscriber could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Slider.' . $this->Slider->primaryKey => $id));
            $this->request->data = $this->Slider->find('first', $options);
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
        $this->Slider->id = $id;
        if (!$this->Slider->exists()) {
            throw new NotFoundException(__('Invalid subscriber'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Slider->delete()) {
            $this->Session->setFlash(__('The subscriber has been deleted.'));
        } else {
            $this->Session->setFlash(__('The subscriber could not be deleted. Please, try again.'));
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
        $result = $this->Slider->find('all');
        $data = $this->paginate('Slider');
        //debug($result);
        $this->Slider->recursive = 0;
        $this->set('subs', $result);
    }

    /* y
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */

    public function admin_view($id = null) {
        $this->layout = "admin";
        if (!$this->Slider->exists($id)) {
            throw new NotFoundException(__('Invalid subscriber'));
        }
        $options = array('conditions' => array('Slider.' . $this->Slider->primaryKey => $id));
        $this->set('subscriber', $this->Slider->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        $this->layout = "admin";
     if ($this->request->is('post')) {
                $one = $this->request->data['Slider']['image'];
                $image_name = $this->request->data['Slider']['image'] = time() . "-" . $one['name'];
                $this->Slider->create();
                if ($this->Slider->save($this->request->data)) {
                    if ($one['error'] == 0) {
                        $pth = 'files' . DS . 'logos' . DS . $image_name;
                        move_uploaded_file($one['tmp_name'], $pth);
                    }
                    $this->Session->setFlash(__('The Slider has been saved'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The Product could not be saved. Please, try again.'));
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
        $this->layout = "admin";
        if (!$this->Slider->exists($id)) {
            throw new NotFoundException(__('Invalid subscriber'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Slider->save($this->request->data)) {
                $this->Session->setFlash(__('The subscriber has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The subscriber could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Slider.' . $this->Slider->primaryKey => $id));
            $this->request->data = $this->Slider->find('first', $options);
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
        $this->layout = "admin";
        $this->Slider->id = $id;
        if (!$this->Slider->exists()) {
            throw new NotFoundException(__('Invalid subscriber'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Slider->delete()) {
            $this->Session->setFlash(__('The subscriber has been deleted.'));
        } else {
            $this->Session->setFlash(__('The subscriber could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
       
  
   
}