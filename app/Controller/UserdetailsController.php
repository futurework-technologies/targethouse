<?php

App::uses("AppController", "Controller");

/** * @property Order $Order Description */
class UserdetailsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array('orders', 'index', 'update'));
    }

    public function index() {
        $x = $this->Order->find("all");
        //debug($x); 
        exit;
    }

    public function savesvg() {
        //debug( $this->request->data);exit;
        if ($this->request->is('post')) {
            //  debug($this->request->data);
           $data = $this->request->data;
            $randpath = rand(0, 999);
            $path = "files/svgfiles/" . DS . $randpath . ".svg";
            $sid = $this->Session->id();
            $ord_rec = $this->Userdetail->find("first", array(
                "conditions" => array(
                    "Userdetail.sessionid" => $sid
            )));
            if (empty($ord_rec)) {
                $d = array(
                    "Userdetail" => array(
                        "image" =>$path,
                        "sessionid" =>$sid,
                        "user_id" =>AuthComponent::user('id')
                ));
                if($this->Userdetail->save($d)) {
                    $this->Session->write("Lid",$this->Userdetail->getLastInsertID());                    
                }
            } else {
                $this->Userdetail->updateAll(array(
                    "Userdetail.image" => "'" . $path . "'",
                    "Userdetail.user_id" => "'" . AuthComponent::user('id') . "'"
                        ), array("Userdetail.sessionid" => $sid));
            } $file = file_put_contents($path, $data);
// debug($file );            
            echo $sid;
            //exit;
        }
        
      $res=$this->Userdetail->find("first",array('conditions'=>array('Userdetail.user_id'=>$this->Auth->user('id'))));
      //debug($res);exit;
        $this->set('product', $res);
        
        
        
        
        
    }

    public function orders() {
        $image = $this->Order->find("first", array('conditions' => array('Order.user_id'=>$this->Auth->user('id'))));
        //debug($image);exit;
        $this->set("order", $image);
    }

//    public function updateold() {
//        if ($this->request->is('post')) {
//            if (!empty($this->request->data)) {
//                $cart = array();
//                foreach ($this->request->data['Order']['quantity'] as $index => $count) {
//                    if ($count > 0) {
//                        $productId = $this->request->data['Order']['id'][$index];
//                        $cart[$productId] = $count;
//                    }
//                }
//                $this->Order->saveProduct($cart);
//            }
//        }
//        $this->redirect(array('action' => 'orders'));
//    }

    public function update() {
        if ($this->request->is('post')) {
            $quant = $this->request->data['quant'];
            $pid = $this->request->data['detail'];
            $i = 0;
            foreach ($quant as $qu) {
                $qry = "update `orders` set `quantity`='" . $qu . "' where `detail_id`='" . $pid[$i] . "'";
                //echo $qry;exit;
                $this->Order->query($qry);
                $i++;
            }
        }
        $this->redirect(array('action' => 'orders'));
    }

}
