<?php

App::uses('AppController', 'Controller');
App::uses("CakeEmail", "Network/Email");

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array('admin_add', 'admin_login', 'userlogin', 'register', 'savesvg', 'fblogin','account'));
    }

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session', 'Mailchimp');

//    public function login() {
//        $this->layout = "login";
//    }


    public function fblogin() {
        if ($this->request->is('post')) {
            $d = $this->request->data;
            $user = $this->User->find('first', array(
                "conditions" => array(
                    "User.email" => $d['email'],
                    "User.password" => AuthComponent::password($d['id'])
                )
            ));
            if (empty($user)) {
                $this->User->create();
                if ($this->User->save(array(
                            "User" => array(
                                "email" => $d['email'],
                                "password" => $d['id'],
                                "status" => 1
                            )
                        )))
                    ;
            }
            if ($user) {
                $id = $user['User']['id'];
                $this->request->data['User'] = array_merge(
                        $user['User'], array('id' => $id)
                );

                if ($this->Auth->login($this->request->data['User'])) {
                    debug("succefully logged in");
                }
            }
        }
    }

    public function glogin() {
        if ($this->request->is('post')) {
            $d = $this->request->data;
            $user = $this->User->find('first', array(
                "conditions" => array(
                    "User.email" => $d['email'],
                    "User.password" => AuthComponent::password($d['id'])
                )
            ));
            if (empty($user)) {
                $this->User->create();
                if ($this->User->save(array(
                            "User" => array(
                                "email" => $d['email'],
                                "password" => $d['id'],
                                "status" => 1
                            )
                        )))
                    ;
            }
            if ($user) {
                $id = $user['User']['id'];
                $this->request->data['User'] = array_merge(
                        $user['User'], array('id' => $id)
                );

                if ($this->Auth->login($this->request->data['User'])) {
                    debug("succefully logged in");
                }
            }
        }
    }

    public function admin_login() {
        $this->layout = "login";
        // debug($this->request->data);exit;
        if ($this->request->is('post')) {
            if (isset($this->data['User']['username'])) {
                $this->request->data['User']['username'] = $this->data['User']['username'];
                $this->Auth->authenticate['Form'] = array(
                    'fields' => array(
                        'userModel' => 'User',
                        'username' => 'username'
                    )
                );
            } else {
                $this->Auth->authenticate['Form'] = array(
                    'userModel' => 'User',
                    'fields' => array('username' => 'username')
                );
            }
            // debug($this->request->data);
            //            exit();
            if (!$this->Auth->login()) {
                $this->Session->setFlash("Invalid username or password!!");
                $this->redirect("/dashboard");
            } else {
                $this->Session->setFlash("Successfully logged in...");
                $this->redirect("/admin/users/");
            }
        }
    }

    public function admin_logout() {
        if ($this->Auth->logout()) {
            $this->redirect("/dashboard");
        }
    }

    public function userlogin() {
        $this->layout = "userlogin";
        // debug($this->request->data);exit;
        if ($this->request->is('post')) {
            if (isset($this->data['User']['email'])) {
                $this->request->data['User']['email'] = $this->data['User']['email'];
                $this->Auth->authenticate['Form'] = array(
                    'fields' => array(
                        'userModel' => 'User',
                        'username' => 'email'
                    )
                );
            } else {
                $this->Auth->authenticate['Form'] = array(
                    'userModel' => 'User',
                    'fields' => array('email' => 'email')
                );
            }
            // debug($this->request->data);
            //            exit();
            if (!$this->Auth->login()) {
                $this->Session->setFlash("Invalid email or password!!");
                $this->redirect("/userlogin");
            } else {
                $this->Session->setFlash("Successfully logged in...");
                $this->redirect(array('action'=>'account'));
            }
        }
    }

    public function userlogout() {
        if ($this->Auth->logout()) {
            $this->redirect("/userlogin");
        }
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        //$this->layout = "admin";
        $this->User->recursive = 0;
        $this->set('users', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->layout = "admin";
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        $this->layout = "admin";
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.'));
                return $this->redirect(array('action' => '"/userlogin"'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }

    function generateRandomString($length = 10) {
        
    }

    public function register() {


        $this->layout = "register";
        if ($this->request->is('post')) {
            $this->User->create();
            $pwd = substr(uniqid(md5(rand(1, 6))), 0, 8);
            $password = $this->request->data['User']['password'] = $pwd;
            $email = $this->request->data['User']['email'];

            $udata = $this->request->data;
            if ($this->User->hasAny(array('User.email' => $this->request->data['User']['email']))) {
                $this->Session->setFlash('E-Mail address does not exist!');
                $this->redirect("/Users/userlogin");
            } else {
                if ($this->User->save($this->request->data)) {
                    $this->Session->write("Lid", $this->User->getLastInsertID());
                    $this->Mailchimp->MCAPI("7ce1bd206038f8d0b110543542dbbdcb-us9");
                    $r = $this->Mailchimp->listSubscribe("b0eaed6fb7", $this->request->data['User']['email']);
                    if ($r) {
                        $this->Session->setFlash('Successfully added user to your list.  They will not be reflected in your list until the user confirms their subscription.');
                    } else {
                        $this->Session->setFlash('Oops, something went wrong.  Email was not added to your user.');
                    }
                }
                $l = new CakeEmail('smtp');
                $ms = "Password:<br/>";
                $ms.=$pwd;
                $l->emailFormat('html')->template('default', 'default')->subject('Password')->to($udata['User']['email'])->send($ms);
                $this->set('smtp_errors', "none");
            }

//                $fm = new CakeEmail('smtp');
//                $viewVars = array(
//                    'email' => $email,
//                    'password' => $pwd;
//                );
//                $fm->to("$email")
//                        ->viewVars($viewVars)
//                        ->from("no-reply@Fantazi.dk", "Password for Fantazi.dk")
//                        ->replyTo("support@Fantazi.dk", "Fantazi.dk")
//                        ->subject("You registered on Fantazi.dk")
//                        ->template("signup")
//                        ->emailFormat('html');
        }
        $this->redirect("/users/userlogin");
    }

//    public function registers() {
//		if ($this->request->is('post')) {
//		 $one=$this->request->data['User']['profile_image'];
//		 $image_name=$this->request->data['User']['profile_image']=date('YmdHis').$one['name'];
//            $email=$this->request->data['User']['email'];
//            $uname=$this->request->data['User']['username'];
//            $password=$this->request->data['User']['password'];
//            $exitemail = $this->User->find('first', array('conditions' =>array('User.email' => $email)));
//            if (empty($exitemail)) {
//   $this->User->create();
//                      // debug($this->request->data);exit;
//   if ($this->User->save($this->request->data)) {
//           if($one['error']==0){
//			    
//			   $path='files' .DS. 'profile' .DS. $image_name;
//			    move_uploaded_file($one['tmp_name'],$path);
// 			    }   
//                            $sub ="Uneekarts.com registration";
//                            $email_from="no-reply@SortinoResidential.com.au";
//                            $email_to =$email;
//                            $email_subject = $sub;
//                            $mail_body = "<html>
//                            <body>
//                            <div style='float:left;width:100%;'><b>Hi</b>&nbsp;".$uname."</div>
//                            <p></p>
//                            <div style='width:100%;float:left;text-align:justify;margin-bottom:10px;'>Thank you for registering with early alert. We trust you will find this service very useful and time efficient.</div>
//                            <div style='float:left;margin-bottom:5px;width:100%;'><b>Username</b>:&nbsp;".$uname."</div><br/>
//                            <div style='float:left;margin-bottom:5px;width:100%;'><b>Password</b>:&nbsp;".$password."</div><br/>
//                            </div>
//                            </body>
//                            </html>";
//                                $headers = 'From: '.$email_from."\r\n";
//                                $headers .= "MIME-Version: 1.0\r\n";
//                                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
//                                $send= mail($email_to, $email_subject, $mail_body, $headers);
//                        if($send) {
//                              $this->Session->setFlash(__('Registeration Successfully'));
////                              return $this->redirect('/users/profiles_index');
//                              return $this->redirect(array('action'=>'admin_index'));
//                         }
//                        else {
//                              $this->Session->setFlash(__('The user has not been saved'));
//                              $this->redirect(array('action'=>'admin_index'));
//                          }
//                        } else {
//                           $this->Session->setFlash(__(' Your data has been not submitted. Please, try again.'));
//                         }
//            } else {
//                $this->Session->setFlash(__('This Email Id Already Exist Please Use Another One'));
//                $this->redirect($this->referer());
//            }
//              }
//	}



    public function admin_activate($id = null) {
        $this->User->id = $id;
        if ($this->User->exists()) {
            $x = $this->User->save(array(
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

    public function admin_deactivate($id = null) {
        $this->User->id = $id;
        if ($this->User->exists()) {
            $x = $this->User->save(array(
                'User' => array(
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

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
  

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->layout = "admin";
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->User->delete()) {
            $this->Session->setFlash(__('The user has been deleted.'));
        } else {
            $this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
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
        $this->User->recursive = 0;
        $this->set('users', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        $this->layout = "admin";
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        $this->layout = "admin";
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
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
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
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
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->User->delete()) {
            $this->Session->setFlash(__('The user has been deleted.'));
        } else {
            $this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function admin_changepassword() {
        $this->layout = 'admin';
        if ($this->request->is('post')) {
            $password = AuthComponent::password($this->data['User']['old_password']);
            $em = $this->Auth->user('username');
            $pass = $this->User->find('first', array('conditions' => array('AND' => array('User.password' => $password, 'User.username' => $em))));
            if ($pass) {
                if ($this->data['User']['new_password'] != $this->data['User']['cpassword']) {
                    $this->Session->setFlash(__("New password and Confirm password field do not match"));
                } else {
                    $this->User->data['User']['password'] = $this->data['User']['new_password'];
                    $this->User->id = $pass['User']['id'];
                    if ($this->User->exists()) {
                        $pass['User']['password'] = $this->data['User']['new_password'];
                        if ($this->User->save()) {
                            $this->Session->setFlash(__("Password Updated"));
                            $this->redirect(array('controller' => 'Users', 'action' => 'admin_view'));
                        }
                    }
                }
            } else {
                $this->Session->setFlash(__("Your old password did not match."));
            }
        }
    }
    
    
     public function changepassword() {
        if ($this->request->is('post')) {
            $password = AuthComponent::password($this->data['User']['old_password']);
            $em = $this->Auth->user('username');
            $pass = $this->User->find('first', array('conditions' => array('AND' => array('User.password' => $password, 'User.username' => $em))));
            if ($pass) {
                if ($this->data['User']['new_password'] != $this->data['User']['cpassword']) {
                    $this->Session->setFlash(__("New password and Confirm password field do not match"));
                } else {
                    $this->User->data['User']['password'] = $this->data['User']['new_password'];
                    $this->User->id = $pass['User']['id'];
                    if ($this->User->exists()) {
                        $pass['User']['password'] = $this->data['User']['new_password'];
                        if ($this->User->save()) {
                            $this->Session->setFlash(__("Password Updated"));
                            $this->redirect(array('controller' => 'Users', 'action' => 'changepassword'));
                        }
                    }
                }
            } else {
                $this->Session->setFlash(__("Your old password did not match."));
            }
        }
         $profile = $this->User->find('first', array('conditions' => array('User.id' => $this->Auth->user('id'))));
      $this->set('profiles', $profile);
    }

   public function account() {
      $profile = $this->User->find('first', array('conditions' => array('User.id' => $this->Auth->user('id'))));
      $this->set('profiles', $profile);
}

   public function registe() {       
       $profile = $this->User->find('first', array('conditions' => array('User.id' => $this->Auth->user('id'))));
       $this->set('profiles', $profile);
        if($this->request->is('post')){
            if($this->User->save($this->request->data)){
                
            }
        }
        
    }
    
      public function edit() {
      $profile = $this->User->find('first', array('conditions' => array('User.id' => $this->Auth->user('id'))));
       $this->set('profiles', $profile);
           if($this->request->is('post')){
            if($this->User->save($this->request->data)){
                
            }
           }
      }
    
    

}
