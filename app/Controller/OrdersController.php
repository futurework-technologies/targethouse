<?php

App::uses("AppController", "Controller");

/** * @property Order $Order Description */
class OrdersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array('orders', 'index', 'update', 'ipn', 'checkout','testpdf'));
    }
   
    public $components = array('Paginator', 'Session','Mpdf.Mpdf');

    public function payment() {
        $this->layout = "admin";
        $this->Order->recursive = 0;
        $this->set('payments', $x = $this->Paginator->paginate());
    }

    public function checkout() {
        if ($this->request->is('post')) {
            $val = $this->request->data['Order']['price'];
            $this->request->data['Order']['paypal_status'] = "Unpaid";
            $this->request->data['Order']['user_id'] = $this->Auth->user('id');
            $this->request->data['Order']['sessionid'] = $this->Session->id();
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
                    <input type=\"hidden\" name=\"notify_url\" value=\"http://www.fantazi.dk/new/orders/ipn\"> 
                    </form>";
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
            $this->Order->query("UPDATE `orders` SET `paypal_status` = '$res', `paypal_transaction_id`='$trn_id', `price`='$pay' WHERE `id` ='$custom_field';");
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

    public function view($id = null) {
        $this->layout = "admin";
        if (!$this->Order->exists($id)) {
            throw new NotFoundException(__('Invalid payment'));
        }
        $options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
        $this->set('user', $this->Order->find('first', $options));
    }

    public function activate($id = null) {
        $this->Order->id = $id;
        if ($this->Order->exists()) {
            $x = $this->Order->save(array(
                'User' => array(
                    'status' => '1'
                )
            ));
            $this->Session->setFlash(__("Activated successfully."));
            $this->redirect($this->referer());
        } else {
            $this->Session->setFlash(__("Unable to activate."));
            $this->redirect($this->referer());
        }
    }

    public function deactivate($id = null) {
        $this->Order->id = $id;
        if ($this->Order->exists()) {
            $x = $this->Order->save(array(
                'Order' => array(
                    'status' => '0'
                )
            ));
            $this->Session->setFlash(__("Activated successfully."));
            $this->redirect($this->referer());
        } else {
            $this->Session->setFlash(__("Unable to activate."));
            $this->redirect($this->referer());
        }
    }

    public function admin_index() {
        $this->layout = "admin";
        $this->Order->recursive = 1;
        $this->set('products', $x = $this->Paginator->paginate());
        // debug($x);exit;
    }
    
    
    public function admin_view($id = null) {
         $this->layout = "admin";
        if($id == null){
            throw new NotFoundException("Order not Found");
        }
        $order = $this->Order->find("first",array(
            "conditions" => array(
                "Order.id" => $id
            )
        ));
        //debug($order);exit;
        $this->set('user', $order);
       // $this->loadModel('Inlineitem');
       
    }
    

/**
 * Method generating PDF and saving it as file
 */
public function admin_generate_pdf() {
require '../Vendor/MPDF56/mpdf.php';  
$mpdf=new mPDF();
$mpdf->WriteHTML('<p>Hallo World</p>');
$mpdf->Output('filename.pdf','F');
    exit;
    
}

/**
 * Method calling generate_pdf()
 */
public function admin_send_email() {
    $this->requestAction(array('action' => 'admin_generate_pdf'), array('return', 'bare' => false));
    // ... use generated file
}
    

}
