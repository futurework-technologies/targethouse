<?php

App::uses("AppController", "Controller");

/** * @property Order $Order Description */
class ProductdetailsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array(  ));
    }

   

    public function productsvg() {
        //debug($this->request->data);exit;
        if ($this->request->is('post')) {
            $detai_id=$this->Session->read("oId");
            $data = $this->request->data;
            $randpath = rand(0, 999);
            $path = "files/svgfiles/" . DS . $randpath . ".svg";
            $sid = $this->Session->id();
            $ord_rec = $this->Productdetail->find("first", array(
                "conditions" => array(
                    "Productdetail.sessionid" => $sid
            )));
            if (empty($ord_rec)) {
                $d = array(
                    "Productdetail" => array(
                        "image" =>$path,
                        "sessionid" =>$sid,
                        "user_id" =>AuthComponent::user('id')
                ));
                if($this->Productdetail->save($d)) {
                    $this->Session->write("Lid",$ld=$this->Productdetail->getLastInsertID());
                    debug($ld); exit;
                }
            } else {
                $this->Productdetail->updateAll(array(
                    "Productdetail.detail_id"=>"'".$detai_id."'",
                    "Productdetail.image" => "'" . $path . "'",
                    "Productdetail.user_id" => "'" . AuthComponent::user('id') . "'"
                        ), array("Productdetail.sessionid" => $sid));
            } $file = file_put_contents($path, $data);
          debug($file );            
            echo $sid;
            exit;
        }
        
        
        $res=$this->Productdetail->find("first",array('conditions'=>array('Productdetail.user_id'=>$this->Auth->user('id'))));
      //debug($res);exit;
        $this->set('product', $res);
        
        
        
    }

}