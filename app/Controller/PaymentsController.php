<?php

App::uses('AppController', 'Controller');

/**
 * Payments Controller
 *
 * @property Payment $Payment
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PaymentsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array('payment', 'view', 'admin_activate', 'admin_deactivate'));
    }

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');

    /**
     * index method
     *
     * @return void
     */
    public function payment() {
        $this->layout = "admin";
        $this->Payment->recursive = 0;
        $this->set('payments', $x = $this->Paginator->paginate());
    }

    public function view($id = null) {
        $this->layout = "admin";
        if (!$this->Payment->exists($id)) {
            throw new NotFoundException(__('Invalid payment'));
        }
        $options = array('conditions' => array('Payment.' . $this->Payment->primaryKey => $id));
        $this->set('user', $this->Payment->find('first', $options));
    }

    public function activate($id = null) {
        $this->Payment->id = $id;
        if ($this->Payment->exists()) {
            $x = $this->Payment->save(array(
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
        $this->Payment->id = $id;
        if ($this->Payment->exists()) {
            $x = $this->Payment->save(array(
                'Payment' => array(
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

}
