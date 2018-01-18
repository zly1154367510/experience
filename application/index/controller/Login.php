<?php
namespace app\index\controller;
use \think\Controller;
use \think\Request;
use \think\Db;
use \think\Session;

class Login extends Controller
{
    public function login()
    {
		return $this->fetch();
    }

    public function loginDo()
    {
    	$data = Request::instance()->param();
    	$res = Db::table("login")
    	->where("username",$data['username'])
    	->find();
    	if (!$res) {
        	 $this->success("用户名错误","index/login/login");
        }else{
        	$res1 = Db::table("login") -> where("password",$data['password']) ->find();
        	if ($res1) {
        		Session::set("username",$data['username']);
        	    $this->success("登录成功","index/index");
        	}else{
        		 $this->success("密码错误","index/login/login");
        	}
        }

    }

  
}
