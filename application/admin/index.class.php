<?php
if(!defined("MVC")){
    die("非法侵入");
}
use \libs\smarty;
use \libs\db;
class index {
    function int (){
//        $smarty=new Smarty();
//        $smarty->setTemplateDir(TPL_PATH);
//        $smarty->setCompileDir(COMP_PATH);
//      $smarty->display("admin/login.html");
//        $this->smarty->display("admin/login.html");
        $smarty=new smarty();
        $smarty->display("admin/login.html");
    }
    function  login(){
      $uname=addslashes($_POST["uname"]);
      $pass=md5(md5($_POST["pass"]));
      if(strlen($uname)<5||empty($pass)){
          echo "用户名或密码不符合规范";
          return;
      }
//        $db=new mysqli("localhost","root","123456","wui2006","3306");
//        if(mysqli_connect_error()){
//            die("数据库连接错误");
//        }
//        $db->query("set names utf8");
//        $db=$this->db;
        $database=new db();
      $db=$database->db;
        $result=$db->query("select * from user where uname='{$uname}' and pass='{$pass}'");
        if($result->num_rows<1){
            echo "没有相应的数据，请重新输入";
        }else{
            header("location:/php/mvc/index.php/admin/index/first");

        }
    }
    function first(){
        echo "后台首页";
    }

}
