<?php

App::uses('AppController', 'Controller');

/**
 * Subscribers Controller
 *
 * @property Subscriber $Subscriber
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property MailchimpComponent $Mailchimp
 */
class SubscribersController extends AppController {
    
     public function beforeFilter() {
         parent::beforeFilter();
        $this->Auth->allow(array('subscriber','admin_send'));
    }
    
     public function subscriber() {
         if ($this->request->is('post')) {
            $this->Subscriber->create();
            $email=$this->request->data['Subscriber']['email'];
            $res=$this->Subscriber->find("first",array('conditions'=>array('Subscriber.email'=>$email)));
            if($res['Subscriber']['email']==$email){
                 $this->Session->setFlash('Email alredy exist.'); 
            }
              else {  
            $this->Subscriber->save($this->request->data);
            $this->Mailchimp->MCAPI("7ce1bd206038f8d0b110543542dbbdcb-us9");
           //$list = $this->Mailchimp->lists();
              $r = $this->Mailchimp->listSubscribe("aacaf06c64",$this->request->data['Subscriber']['email']);
//              $this->redirect(array('controller' => 'pages', 'action' => 'home'));
               if( $r) { 
              $this->Session->setFlash('Successfully added user to your list.  They will not be reflected in your list until the user confirms their subscription.');
               } else { 
              $this->Session->setFlash('Oops, something went wrong.  Email was not added to your user.'); 
        }
            //debug($r);
            //exit;
    }

}}



        public function admin_send(){
        $this->Mailchimp->MCAPI("7ce1bd206038f8d0b110543542dbbdcb-us9");
        //$this->Mailchimp->campaignCreate("regular", $options, $content);
        $x = $this->Mailchimp->campaigns();
       // debug($x['data']);
        foreach($x['data'] as $x1){
        $c = $this->Mailchimp->campaignSendNow($x1['id']);
        }
        if( $c)
         { 
        $this->Session->setFlash('Newsletter has been send.');
               }
               else { 
              $this->Session->setFlash('Oops, something went wrong.'); 
        }
               
        //debug($c);
       // exit; 
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
        $this->Subscriber->recursive = 0;
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
        if (!$this->Subscriber->exists($id)) {
            throw new NotFoundException(__('Invalid subscriber'));
        }
        $options = array('conditions' => array('Subscriber.' . $this->Subscriber->primaryKey => $id));
        $this->set('subscriber', $this->Subscriber->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Subscriber->create();
            if ($this->Subscriber->save($this->request->data)) {
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
        if (!$this->Subscriber->exists($id)) {
            throw new NotFoundException(__('Invalid subscriber'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Subscriber->save($this->request->data)) {
                $this->Session->setFlash(__('The subscriber has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The subscriber could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Subscriber.' . $this->Subscriber->primaryKey => $id));
            $this->request->data = $this->Subscriber->find('first', $options);
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
        $this->Subscriber->id = $id;
        if (!$this->Subscriber->exists()) {
            throw new NotFoundException(__('Invalid subscriber'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Subscriber->delete()) {
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
        $result = $this->Subscriber->find('all');
        $data = $this->paginate('Subscriber');
        //debug($result);
        $this->Subscriber->recursive = 0;
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
        if (!$this->Subscriber->exists($id)) {
            throw new NotFoundException(__('Invalid subscriber'));
        }
        $options = array('conditions' => array('Subscriber.' . $this->Subscriber->primaryKey => $id));
        $this->set('subscriber', $this->Subscriber->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        $this->layout = "admin";
        if ($this->request->is('post')) {
            $this->Subscriber->create();
            if ($this->Subscriber->save($this->request->data)) {
                $this->Session->setFlash(__('The subscriber has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The subscriber could not be saved. Please, try again.'));
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
        if (!$this->Subscriber->exists($id)) {
            throw new NotFoundException(__('Invalid subscriber'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Subscriber->save($this->request->data)) {
                $this->Session->setFlash(__('The subscriber has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The subscriber could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Subscriber.' . $this->Subscriber->primaryKey => $id));
            $this->request->data = $this->Subscriber->find('first', $options);
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
        $this->Subscriber->id = $id;
        if (!$this->Subscriber->exists()) {
            throw new NotFoundException(__('Invalid subscriber'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Subscriber->delete()) {
            $this->Session->setFlash(__('The subscriber has been deleted.'));
        } else {
            $this->Session->setFlash(__('The subscriber could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
       
  
   
}