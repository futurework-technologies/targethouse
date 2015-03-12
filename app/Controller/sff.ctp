      $this->loadModel('Pdetail');
        $res = $this->Pdetail->find("list", array('fields' => array('Pdetail.Category', 'Pdetail.Article') ));
        //debug($res);exit;
        $this->set("details", $res);