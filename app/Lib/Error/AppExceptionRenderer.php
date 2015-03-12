<?php
App::uses('ExceptionRenderer', 'Error');

class AppExceptionRenderer extends ExceptionRenderer {

    public function notFound($error) {
        $this->controller->redirect(array('controller' => 'errors', 'action' => 'error404'));
    }
    public function error500($error) {
        $this->controller->redirect(array('controller' => 'errors', 'action' => 'error500'));
       
    }
    public function error400($error) {
        $this->controller->redirect(array('controller' => 'errors', 'action' => 'error400'));
       
    }
    public function _cakeError(\CakeException $error) {
        debug($error);
        exit;
        parent::_cakeError($error);
    }
}