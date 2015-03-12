<?php
App::uses("AppController", "Controller");

/**
 * @property Order $Order Description
 * @property Inlineitem $Inlineitem Description
 */


class InlineitemsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array('orders', 'index', 'update', 'ipn','view','ordersave'));
    }

    public $components = array('Paginator', 'Session');

    public function index() {
        $x = $this->Inlineitem->find("all");
        //debug($x); 
        exit;
    }

//    public function savesvg() {
//        if ($this->request->is('post')) {
//            $data = $this->request->data;
//            $randpath = rand(0, 999);
//            $path = "files/svgfiles/" . DS  . $randpath . ".svg";
//            $sid = $this->Session->id();
//            $ord_rec = $this->Inlineitem->find("first", array(
//                "conditions" => array(
//                    "Inlineitem.sessionid" => $sid
//            )));
//            if (empty($ord_rec)) {
//                $d = array(
//                    "Inlineitem" => array(
//                        "image" => $path,
//                        "sessionid" => $sid,
//                        "user_id" => AuthComponent::user('id')
//                ));
//                $this->Inlineitem->save($d);
//            } else {
//                $this->Inlineitem->updateAll(array(
//                    "Inlineitem.image" => "'" . $path . "'",
//                    "Inlineitem.user_id" => "'" . AuthComponent::user('id') . "'"
//                        ), array("Inlineitem.sessionid" => $sid));
//            } $file = file_put_contents($path, $data);
//// debug($file );            
//            echo $sid;
//            //exit;
//        }
//    }

    public function orders() {
        $this->loadModel('Order');
        $order = $this->Order->find("first",array(
           "contain" => array(
               "Inlineitem",
               "Inlineitem.Pdetail",
           ),
           "conditions" => array(
               "Order.sessionid" => $this->Session->id()
           ) 
        ));
        $this->set("order", $order);
        return;
        
//        debug($order);
//        exit;
        
        
        
        $ord = array();
        $im = array();
        $image = $this->Inlineitem->find('all', array('conditions' => array(
                "AND" => array(
                    'Inlineitem.user_id' => $this->Auth->user('id'),
                    'Inlineitem.status' => 1
                )
            ),
        ));

        foreach ($image as $img) {
            $ord[] = $img['Inlineitem']['id'];
            $im[] = $img['Inlineitem']['image'];
        }

        $this->set("order", $image);
         

        $this->loadModel('Order');
        if ($this->request->is('post')) {
            $val = $this->request->data['Order']['totalprice'];
            $this->request->data['Order']['paypal_status'] = "Unpaid";
            $this->request->data['Order']['order_id'] = serialize($ord);
            $this->request->data['Order']['image'] = serialize($im);
            $this->request->data['Order']['user_id'] = $this->Auth->user('id');
            $this->Order->create();
            if ($this->Order->save($this->request->data)) {
                $last_id = $this->Order->getLastInsertId();


                ///////////////////////////////////////////////payment////////////////////////////////////////////////
                echo ".<form name=\"_xclick\" action=\"https://www.sandbox.paypal.com/cgi-bin/webscr\" method=\"post\">
                    <input type=\"hidden\" name=\"cmd\" value=\"_xclick\">
                    <input type=\"hidden\" name=\"business\" value=\"papa.roach@futureworktechnologies.com\">
                    <input type=\"hidden\" name=\"currency_code\" value=\"USD\">
                    <input type=\"hidden\" name=\"custom\" value=\"$last_id\">
                    <input type=\"hidden\" name=\"amount\" value=\"$val\">
                    <input type=\"hidden\" name=\"return\" value=\"http://www.fantazi.dk/new\">
                    <input type=\"hidden\" name=\"notify_url\" value=\"http://www.fantazi.dk/new/inlineitems/ipn\"> 
                    </form>";
//                    exit;
                echo "<script>document._xclick.submit();</script>";
                ////////////////////////////////////////////////////////////////////////////////////////////////////////
            } else {
                $this->Session->setFlash(__('Your Payment Failed.Please, try again.'));
            }
        }
    }

    public function ipn() {  
        $fc = fopen('files/ipn.txt', 'wb');
        ob_start();
        print_r($this->request);
        $req = 'cmd=' . urlencode('_notify-validate');
        foreach ($_POST as $key => $value) {
            $value = urlencode(stripslashes($value));
            $req .= "&$key=$value";
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.sandbox.paypal.com/cgi-bin/webscr');
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Host: www.developer.paypal.com'));
        $res = curl_exec($ch);
        curl_close($ch);
        if (strcmp($res, "VERIFIED") == 0) {
            $custom_field = $_POST['custom'];
            $payer_email = $_POST['payer_email'];
            $trn_id = $_POST['txn_id'];
            $this->loadModel('Payment');
            $this->Payment->query("UPDATE `payments` SET `paypal_status` = '$res', `paypal_transaction_id`='$trn_id', `totalprice`='$pay' WHERE `id` ='$custom_field';");
            $l = new CakeEmail('smtp');
            $l->emailFormat('html')->template('default', 'default')->subject('Payment')->to($payer_email)->send('Payment Done Successfully');
            $this->set('smtp_errors', "none");
        } else if (strcmp($res, "INVALID") == 0) {
            
        }
        $xt = ob_get_clean();
        fwrite($fc, $xt);
        fclose($fc);
        $this->render('payment_confirm', 'ajax');
    }

//    public function updateold() {
//        if ($this->request->is('post')) {
//            if (!empty($this->request->data)) {
//                $cart = array();
//                foreach ($this->request->data['Inlineitem']['quantity'] as $index => $count) {
//                    if ($count > 0) {
//                        $productId = $this->request->data['Inlineitem']['id'][$index];
//                        $cart[$productId] = $count;
//                    }
//                }
//                $this->Inlineitem->saveProduct($cart);
//            }
//        }
//        $this->redirect(array('action' => 'orders'));
//    }

    public function update() {
        if ($this->request->is('post')) {
            $this->Inlineitem->create();
            if (!empty($this->data)) {
                foreach ($this->data as $data) {
                    if ($this->Inlineitem->saveAll($data['Inlineitem'])) {
                        debug($data);
                    }
                }
            }
        }
    }

//    public function oderupdate() {
//        $data = array('Inlineitem.status' => "paid", 'Inlineitem.user_id' => 10);
//        $this->Inlineitem->create();
//        if ($this->Inlineitem->save($data)) {
//            debug($data);
//            exit;
//        }
//    }
    
    public function productsvg($id = null) {
        //debug($this->request->data);exit;
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $randpath = rand(0, 999);
            $path = "files/svgfiles/" . $randpath . ".svg";
            $sid = $this->Session->id();
            $pdetail_id=$this->Session->read("oId");
             $this->loadModel('Pdetail');
            $d1 = $this->Pdetail->find("first",array(
                "conditions" => array(
                    "Pdetail.id" => $id
                )
             
            ));
                 
            $this->loadModel('Order');
            $order = $this->Order->find("first",array(
                "conditions" => array(
                    "Order.sessionid" => $this->Session->id()
                )
            ));
           //$this->loadModel('Pdetail');
            $this->Inlineitem->create();
            if($this->Inlineitem->save(array(
                "Inlineitem" => array(
                    "pdetail_id" => $pdetail_id,
                    "order_id" => $order['Order']['id'],
                    "image" => $path,
                    "Consumer_price" => $d1['Pdetail']['Consumer_price']
                )
            ))){
                $file = file_put_contents($path, $data);
                $res = array(
                    "error" => 0,
                    "id" => $this->Inlineitem->getLastInsertID()
                );
                $this->autoRender = false;
                $this->response->type('json');
                $this->response->body(json_encode($res));
                
            }else{
                $res = array(
                    "error" => 1,
                    "errorDetials" => $this->Inlineitem->validationErrors 
                );
                $this->autoRender = false;
                $this->response->type('json');
                $this->response->body(json_encode($res));
            }
            return;
        }else{
            $item = $this->Inlineitem->find("first", array(
               "conditions" => array(
                   "Inlineitem.id" => $id
               ) 
            ));
            $this->set("product",$item);
        }
        
    }
    
    
     public function productimgs($id = null) {  
        //debug($this->request->data);exit;
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $randpath = rand(0, 999);
            $path = "files/svgfiles/" . $randpath . ".svg";
            $sid = $this->Session->id();
            $product_id=$this->Session->read("oId");
            $this->loadModel('Product');
            $d1 = $this->Product->find("first",array(
                "conditions" => array(
                    "Product.id" => $id
                )
            ));
                    
            $this->loadModel('Order');
            $order = $this->Order->find("first",array(
                "conditions" => array(
                    "Order.sessionid" => $this->Session->id()
                )
            ));
            $this->Inlineitem->create();
            if($this->Inlineitem->save(array(
                "Inlineitem" => array(
                    "product_id" => $product_id,
                    "order_id" => $order['Order']['id'],
                    "image" => $path,
                    "Consumer_price" => $d1['Product']['consumer_price']
                )
            ))){
                $file = file_put_contents($path, $data);
                $res = array(
                    "error" => 0,
                    "id" => $this->Inlineitem->getLastInsertID()
                );
                $this->autoRender = false;
                $this->response->type('json');
                $this->response->body(json_encode($res));
                
            }else{
                $res = array(
                    "error" => 1,
                    "errorDetials" => $this->Inlineitem->validationErrors 
                );
                $this->autoRender = false;
                $this->response->type('json');
                $this->response->body(json_encode($res));
            }
            return;
        }else{
            $item = $this->Inlineitem->find("first", array(
               "conditions" => array(
                   "Inlineitem.id" => $id
               ) 
            ));
            $this->set("product",$item);
        }
        
    }
    
    

    public function ordersave($id = null) {
        if ($this->request->is('post')) {
            $this->loadModel('Order');
            $order = $this->Order->find("first",array(
                "conditions" => array(
                    "Order.sessionid" => $this->Session->id()
                )
            ));
            if(empty($order)){
               $this->Order->create();
                if($order = $this->Order->save(array(
                    "Order" => array(
                      "sessionid" => $this->Session->id(),
                      "user_id" => AuthComponent::user('id')
                    )
                ))){
                    $this->Session->write("oId",$id);
                    $this->redirect('pages/submit_form?url=' . $id);
                }else{
                    debug($this->Order->validationErrors);
                    
                }
            }
            $this->redirect('pages/submit_form?url=' . $id);
            
//            debug( $order ); exit;
//            debug($this->Session->id());
//            exit;
//            $this->Inlineitem->create();
//            $this->request->data['Inlineitem']['status'] = 1;
//            $this->request->data['Inlineitem']['quantity'] = 1;
//            $this->request->data['Inlineitem']['user_id'] = $this->Auth->user('id');
//            if ($this->Inlineitem->save($this->request->data)) {
//                $this->Session->write("oId",$x = $this->Inlineitem->getLastInsertID());
//                //debug($x);exit;
            
//            }
        }
    }

    public function productsave($id = null) {
          if ($this->request->is('post')) {
            $this->loadModel('Order');
            $order = $this->Order->find("first",array(
                "conditions" => array(
                    "Order.sessionid" => $this->Session->id()
                )
            ));
            if(empty($order)){
                $this->Order->create();
                $order = $this->Order->save(array(
                    "Order" => array(
                      "sessionid" => $this->Session->id(),
                      "user_id" => AuthComponent::user('id')
                    )
                ));
            }
            $this->Session->write("oId",$id);
                $this->redirect('/Web/editproduct?url=' . $id);
            }
        }
    

    public function delete() {
        if ($this->request->is('post')) {
            $id = $this->request->data;
            $res = $this->Inlineitem->find("first", array('conditions' => array('Inlineitem.id' => $id)));
            $total = $res['Inlineitem']['Consumer_price'] * $res['Inlineitem']['quantity'];
            $this->set("res", array(
                'price' => $total
            ));
            $this->response->type('json');
            $this->render('/Common/ajax', 'ajax');
            $this->Inlineitem->id = $id;
            if ($this->Inlineitem->delete()) {
                
            }
        }
    }

    public function img($id = null) {
        $this->loadModel('Userdetail');
        $res = $this->Userdetail->find("first", array('conditions' => array('Userdetail.user_id' => $this->Auth->user('id'))));
        $this->request->data['Inlineitem']['image'] = $res['Userdetail']['image'];
        $this->request->data['Inlineitem']['id'] = $this->Session->read("oId");
        $this->request->data['Inlineitem']['detail_id'] =$res['Userdetail']['detail_id'];
        if ($this->Inlineitem->save($this->request->data)) {
            $this->redirect('/Orders/orders?url=' . $id);
            //debug($this->request->data);
        }
    }

    public function productimg($id = null) {
        $this->loadModel('Productdetail');
        $res = $this->Productdetail->find("first", array('conditions' => array('Productdetail.user_id' => $this->Auth->user('id'))));
        $this->request->data['Inlineitem']['image'] = $res['Productdetail']['image'];
        $this->request->data['Inlineitem']['id'] = $this->Session->read("oId");
//        debug( $this->request->data['Inlineitem']['id']);exit;
        if ($this->Inlineitem->save($this->request->data)) {
            $this->redirect('/Inlineitems/orders?url=' . $id);
            debug($this->request->data);
        }
    }

    /**
     * @author Himanshu Verma <himan.verma@live.com>
     */
    public function removeitem($id = null){
        if($id == null){
            exit;
        }
        $this->Inlineitem->delete($id);
        echo "done";
        exit;
    }
    
    public function orderitem(){
        $this->layout = "admin";
        $this->Inlineitem->recursive = 0;
        $this->set('items', $this->Paginator->paginate());
        $this->set('user', $this->Inlineitem->find('all'));       
    }
    
    
      public function view($id = null) {
         $this->layout = "admin";
        if (!$this->Inlineitem->exists($id)) {
            throw new NotFoundException(__('Invalid item'));
        }
        $options = array('conditions' => array('Inlineitem.' . $this->Inlineitem->primaryKey => $id));
        
        $this->set('user', $this->Inlineitem->find('first', $options));
    }
    
    public function test(){
         if($this->request->is('post')){
            $id=  $this->request->data;
            $res=$this->Inlineitem->find('first',array('conditions'=>array('Inlineitem.id'=>$id)));          
            $this->set("res",$res);
            $this->response->type('json');
            $this->render('/Common/ajax','ajax');
        }
    }
  
}
