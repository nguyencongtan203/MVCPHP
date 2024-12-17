<?php
class Home extends Controller{
    public function Show(){
        $cate = $this->model("CategoriesModel");
        $this->view("Home",[
            "Page"=>"Home",
            "Cate"=>$cate->getCate()
        ]);
    }
}
?>