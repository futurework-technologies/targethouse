
    public function partnerform($id = null) {
               if ($this->request->is('post')) {
            $this->Map->create();
            $email = $this->request->data['Map']['email'];
            $res = $this->Map->find("first", array('conditions' => array('Map.email' => $email)));
            if ($res['Map']['email'] == $email) {
                $this->Session->setFlash('Email alredy exist.');
        
          if ($this->User->save($this->request->data)) {


                App::uses("CakeEmail", "Network/Email");
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
                    return $this->redirect(array('action' => 'userlogin'));
                } catch (SocketException $e) {
                    debug($e);
                    exit;
                    $this->Session->setFlash(__('The user has not been saved'));
                    $this->redirect(array('action' => 'userlogin'));
                }
            }
        
   }
    }
    }