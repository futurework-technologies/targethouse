<?php
App::uses("AppController", "Controller");

/**
 * @property GoogleAPI $GoogleAPI Description 
 */
class WebController extends AppController {
    
    public $_gclient;

    public $components = array(
        'GoogleAPI.GoogleAPI' => array(
            'Service' => array(
                //'YouTube'
            )
        )
    );

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array(
            'editproduct',
            'gauth',
            'gcall'
        ));
    }

    public function editproduct() {
        //$this->Go
    }
    public function gauth(){
        $this->GoogleAPI->import('Google/Client');
        $this->_gclient = new Google_Client();
        $this->_gclient->setClientId("649941461576-ks0aq8mhphi51mtsoh9t9nbreflaufcd.apps.googleusercontent.com");
        $this->_gclient->setClientSecret("j72sy5IF_o_ZXO7iPDyvQfHy");
        $this->_gclient->setRedirectUri("http://targethouse.dk/Web/gcall");
        $this->_gclient->setApprovalPrompt("force");
        $this->_gclient->addScope(array('https://www.googleapis.com/auth/userinfo.email','https://www.googleapis.com/auth/userinfo.profile','https://www.googleapis.com/auth/plus.me'));
        $url = $this->_gclient->createAuthUrl();
        $this->redirect($url);
    }
    public function gcall(){
        $this->GoogleAPI->import('Google/Client');
        $this->GoogleAPI->import('Google/Service/Oauth2');
        $this->_gclient = new Google_Client();
        $this->_gclient->setClientId("649941461576-ks0aq8mhphi51mtsoh9t9nbreflaufcd.apps.googleusercontent.com");
        $this->_gclient->setClientSecret("j72sy5IF_o_ZXO7iPDyvQfHy");
        $this->_gclient->setRedirectUri("http://targethouse.dk/Web/gcall");
        $this->_gclient->setApprovalPrompt("force");
        $this->_gclient->authenticate($this->request->query('code'));
        $accessToken = $this->_gclient->getAccessToken();
        $me = new Google_Service_Oauth2($this->_gclient);
        $me = $me->userinfo->get();
        $this->loadModel('User');
            $user = $this->User->find('first', array(
                "conditions" => array(
                    "User.email" => $me->email,
                    "User.password" => AuthComponent::password($me->id)
                )
            ));
            if (empty($user)) {
                $this->User->create();
                if ($this->User->save(array(
                            "User" => array(
                                "email" => $me->email,
                                "password" => $me->id,
                                "status" => 1
                            )
                        )))
                    ;
            }
            if ($user) {
                $id = $user['User']['id'];
                $dt = array_merge(
                        $user['User'], array('id' => $id)
                );

                if ($this->Auth->login($dt['User'])) {
                    $this->redirect('/');
                    //debug("succefully logged in");
                }
            }
        
        
        $this->redirect('/');
        Debugger::dump(print_r($me->userinfo->get(),true));
        exit;
    }

}
