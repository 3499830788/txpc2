<?php
namespace Back\Controller;
use Think\Controller;
/**
* date:2017-4-5
* name:拂云
*/
class IndexController extends Controller {
    public function _initialize()
    {
        if (!isset($_SESSION['user_id'])) {
            $this->redirect('Back/Login/login');
            exit();
        }
    }
    function index(){

    	$this->display();
    }
    function main(){
    	$where['id']=session('user_id');
    	$user=M('users')->where($where)->field('username,last_up_time')->find();
    	$this->assign('users',$user);
    	$this->display();
    }
    function top(){
    	$this->display();
    }
    function left(){
    	$this->display();
    }
    function admin_md(){
    	$where['id']=session('user_id');
    	$user=M('users')->where($where)->field('id,username')->find();
    	$this->assign('users',$user);
    	$this->display();
    }
    function modify_account(){
    	$data=I('post.');
    	$where['id']=$data['id'];
    	if($data['password']==$data['password2']){
    		$data['password']=MD5($data['password']);
    		M('users')->where($where)->data($data)->save();
    		$this->success('修改成功',U('Back/Index/main'),1);
    	}else{
    		$this->error('两次输入密码不一致,请重新设置账户',U('Back/Index/admin_md'),1);
    	}
    }
    //退出
    function logout(){
    	session_unset();
		session_destroy();
		$this->redirect('Login/login');
    }
}