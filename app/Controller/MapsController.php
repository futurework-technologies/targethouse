<?php

App::uses("AppController", "Controller");
App::uses('CakeEmail', 'Network/Email');

/**
 * 
 */
class MapsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array(
            'partnerform','becomepartner'
        ));
    }

    public function partnerform($id = null) {
        $this->set("id",$id);
        if (!$this->Map->exists($id)) {
            throw new NotFoundException(__('Invalid map'));
        }
        
        $options = array('conditions' => array('Map.' . $this->Map->primaryKey => $id));
        $this->set('products', $this->Map->find('first', $options));
        
          if ($this->request->is('post')) {
            $email = $this->request->data['Map']['email'];
            $res = $this->Map->find("first", array('conditions' => array('Map.email' => $email)));
           $fm = new CakeEmail('smtp');
                $viewVars = array(
                    'email' => $email,
                    
                );
                $fm->to("$email")
                        //->cc("himan.verma@live.com")
                        ->viewVars($viewVars)
                        ->from("no-reply@Fantazi.dk", "Password for Fantazi.dk")
                        ->replyTo("support@Fantazi.dk", "Fantazi.dk")
                        ->subject("You registered on Fantazi.dk")
                        ->template("signup")
                        ->emailFormat('html');
                try {
                    $mailObj = $fm->send();
                    $this->Session->setFlash(__('Data  Successfully sent'));
//                              return $this->redirect('/users/profiles_index');
                    return $this->redirect(array('action' => 'partnerform'));
                } catch (SocketException $e) {
                    debug($e);
                    exit;
                    $this->Session->setFlash(__('The user has not been saved'));
                    $this->redirect(array('action' => 'partnerform'));
                }
            }
        
   }
    
    
          
   



 public function becomepartner() {
       //$data = $this->Map->find('all');
       $data = $this->Map->find('first', array('Conditions' => array('Map.id' => '$id')));
            //debug($data);exit;
        $this->set('map', $data);

       
    }
    
    public function test(){
               $email="anshu@futureworktechnologies.com";        
               $name= "anshu";
               $message= "hello";             
                $l = new CakeEmail('smtp');
                $x= $l->config('smtp')->emailFormat('default')->subject($name)->to($email)->send($message);                
                $this->set('smtp_errors', "none");
                debug($x); exit;
               
    }








}