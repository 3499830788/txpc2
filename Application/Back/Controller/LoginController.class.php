<?php
namespace Back\Controller;
use Think\Controller;
class LoginController extends Controller{
	function login(){
		$this->display();
	}
	function check_login(){
		if($_POST){
			$where['username']=$_POST['username'];
			$where['password']=MD5($_POST['password']);
			$users=M('users')->where($where)->find();
			$id=$users['id'];
			if($users){
				$_SESSION['user_id']=$users['id'];
				$_SESSION['username'] =$_POST['username'];
				$data['last_up_time']=$users['logintime'];
				$data['logintime'] =date('Y-m-d H:i:s');
				$s=M('users')->where("id=$id")->save($data);
				$this->redirect('Back/Index/index');
			}else{
				$this->error("用户名或者密码错误！");	
			}

		}
	}
}
?>