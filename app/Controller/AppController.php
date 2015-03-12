<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    // public $components = array('Session','Auth');
    public $components = array('Auth', 'Session');

    public function beforeFilter() {
        if ($this->Session->check('Config.language')) {
            Configure::write('Config.language', $this->Session->read('Config.language'));
        }
        parent::beforeFilter();
        $this->Auth->user('id');
        // exit;
        $this->Auth->authenticate = array(
            AuthComponent::ALL => array('loginRedirect' => array('controller' => 'posts', 'action' => 'index'),
                'userModel' => 'User',
                'fields' => array('email' => 'email'),
            ),
            'Form' => array('fields' => array('email' => 'email'),
                'scope' => array('User.status' => 1)
            )
        );
        $this->Auth->loginAction = "/dashboard";
        if (!$this->request->param('admin')) {
            $this->layout = "front";
        }
        $this->Auth->loginAction = "/userlogin";
        if (!$this->request->param('user')) {
            $this->layout = "front";
        }


        //$this->Auth->allow();

        $this->loadModel('Banner');
        $sliders = $this->Banner->find('all', array('limit' => '1', 'order' => array('Banner.id' => 'ASC')));
        //debug($sliders);
        $this->set('slider', $sliders);

        
         $this->loadModel('Content');
        $data = $this->Content->find('first', array('conditions' => array('Content.id' =>1)));
      // debug($data);
        $this->set('content', $data);
        
        
        
        
     

        $this->loadModel('Product');
        $res = $this->Product->find("all");
        $this->set("product", $res);


        $this->loadModel('Category');
//        $res = $this->Category->find("all");
//        //debug($res);exit;
//        $this->set("pro", $res);

        $options = $this->Category->find('all', array('recursive' => 1));
        //debug($options);exit;
        $this->set('products', $options);
        
        $res = $this->Auth->loggedIn();
        //debug($res);exit;
           $this->set('loged', $res);
       
   }

}
