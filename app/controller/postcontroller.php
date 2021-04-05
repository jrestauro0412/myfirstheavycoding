<?php
spl_autoload_register('route_middleware');
// require_once "../middleware/postmiddleware.php";
class postControllerData extends postMiddleWareData {
    public function postWall($data){
        $this->postCore($data);
    }
    public function signincontroller($credentials){
        $this->signincore($credentials);
    }
    public function insertcontroller($datainsert){
        $this->insertCore($datainsert);
    }
    public function deletioncontroller($id){
        $this->deletionCore($id);
    }
    public function updateselectcontroller($id){
        $this->updateselectionCore($id);
    }
    public function finalupcontroller($data){
        $this->finalupdateCore($data);
    }
}

function route_middleware(){
    include("../web/route.php");
    include_once $router['middleware'];
}