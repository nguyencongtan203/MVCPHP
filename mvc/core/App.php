<?php
class App{
    protected $controller="Home";
    protected $action="Show";
    protected $params=[];
    function __construct(){
        $arr = $this->UrlProcess();
        //Xu ly controller
        //Neu khong co controller thi chạy controller mac dinh
        if(file_exists("mvc/controllers/".$arr[0].".php")){
            $this->controller = $arr[0];
            unset($arr[0]);
        }
        require_once "mvc/controllers/".$this->controller.".php";
        $this->controller = new $this->controller;
        //Xu ly action
        //Neu lop co ton tai func thi chay khong thi chay func mac dinh
        if(isset($arr[1])){
            if(method_exists($this->controller,$arr[1])){
                $this->action=$arr[1];
            }
            unset($arr[1]);
        }
        //Xu ly param
        $this->params = $arr?array_values($arr):[];

        call_user_func_array([$this->controller, $this->action],$this->params);
    }

    function UrlProcess(){
        if(isset($_GET["url"])){
           return explode("/",filter_var(trim($_GET["url"], "/")));
        }
    }
}
?>