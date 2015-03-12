<?php

App::uses("AppController", "Controller");

class LangController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }

    public function index($lang = null) {
        if ($lang != NULL) {
            $this->Session->write('Config.language', $lang);
        }
        $this->redirect($this->request->referer());
    }

    public function admin_pa($lang = null) {
        if($lang == null){
            throw new BadRequestException("Please add language tag. Ex- /admin/lang/dan");
        }
        $this->layout = "admin";
        require '../Vendor/PoParser/src/PoParser/Entry.php';
        require '../Vendor/PoParser/src/PoParser/Parser.php';
        $parser = new PoParser/Parser();
        $parser->read('../Locale/'.$lang.'/LC_MESSAGES/default.po');
        if($this->request->is(array('post'))){
            $d = $this->request->data;
            $cnt = file_get_contents('../Locale/'.$lang.'/LC_MESSAGES/default.po');
            setlocale(LC_ALL, "en_US.UTF-8");
            foreach ($d as $data){
                $newCnt = "msgid \"".$data['msgid']."\"\nmsgstr \"".$data['msgstr']."\"";
                $cnt = mb_ereg_replace ('msgid "'.$data['msgid'].'"\nmsgstr ".*"',$newCnt, $cnt,'r');
            }
            file_put_contents('../Locale/'.$lang.'/LC_MESSAGES/default.po',$cnt);
        }
        
        $parser->read('../Locale/'.$lang.'/LC_MESSAGES/default.po');
        $entries = $parser->getEntriesAsArrays();
        $this->set("entries", $entries);
        
    }

}
