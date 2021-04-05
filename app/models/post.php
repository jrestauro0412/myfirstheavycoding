<?php
spl_autoload_register('route_controller');
// require_once "../controller/postcontroller.php";
class post_Models extends postControllerData {
    public function postModelWall(){
        $data = [
            'data1' => $_POST['data1'],
            'data2' => $_POST['data2'],
            'data3' => $_POST['data3'],
            'data4' => $_POST['data4'],
            'data5' => $_POST['data5'],
            'data6' => $_POST['data6'],
            'data7' => $_POST['data7'],
            'data8' => $_POST['data8']
        ];
        $this->postWall($data);
    }
    public function signinModel(){
        $credentials = [
            'signin1'=> $_POST['signin1'],
            'signin2'=> $_POST['signin2']
        ];
        $this->signincontroller($credentials);
    }
    public function insertModel() {
        $datainsert = ['data1' => $_POST['data1']];
        $this->insertcontroller($datainsert);
    }
    public function deletionModel() {
        $this->deletioncontroller($_POST['id']);
    }
    public function updateselection(){
        $this->updateselectcontroller($_POST['id']);
    }
    public function finalupdateModels(){
        $data = [
            'data1' => $_POST['data1'],
            'id' => $_POST['id']
        ];
        $this->finalupcontroller($data);
    }
}

function route_controller(){
    include("../web/route.php");
    include_once $router['controller'];
}