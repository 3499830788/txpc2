<?php
namespace Back\Controller;
use Think\Controller;
/**
* date:2017-4-8
* name:拂云
*/
class FriendlinkController extends Controller{
	public function _initialize()
    {
        if (!isset($_SESSION['user_id'])) {
            $this->redirect('Back/Login/login');
            exit();
        }
    }
	public function friendlinkList(){
		//搜索字段
		
		$map='';
        $count  = M('friendlylink')->where($map)->count();// 查询满足要求的总记录数
        $page = getpage($count,19);		
		$show= $page->show();// 分页显示输出
		$friendlylink=M('friendlylink')->order('`order` asc,`id` asc')->limit($page->firstRow.','.$page->listRows)->select();
		foreach ($friendlylink as $key => $value) {
			$friendlylink[$key]['add_time']=date('Y-m-d H:i:s',$value['add_time']);
		}
		$this->assign('page',$show);
		$this->assign('friendlylink',$friendlylink);
		$this->display();
	}
	public function friendlinkAdd(){
		$where['id']=session('user_id');
		$a=I('get.id');
		if(!empty($a)){
			$friendlylink=M('friendlylink')->where('id='.$a)->select();
			$friendlylink['0']['status']=1;
		}else{
			$friendlylink['0']['status']=0;
		}
    	$user=M('users')->where($where)->field('username')->find();
    	$this->assign('users',$user);
    	$this->assign('friendlylink',$friendlylink['0']);
		$this->display();
	}
	public function add(){
		$friendlylink=M('friendlylink');
		$data['name']=I('post.name');
		$data['link']=I('post.link');
		$data['order']=99;
		$data['add_time']=time();
        $friendlylink->data($data)->add();
		$this->redirect('friendlink/friendlinkList');
	}
	public function update(){
		$friendlylink=M('friendlylink');
		$data['name']=I('post.name');
		$data['link']=I('post.link');
		$data['order']=99;
		$data['add_time']=time();
		$where['id']=I('post.id');
        $friendlylink->where($where)->save($data);
		$this->redirect('friendlink/friendlinkList');
	}
  //链接删除
	public function del(){
		$friendlylink=M('friendlylink');
		$id=I('post.delid');
		$num=I('post.num');
		if ($num==1) {
			$friendlylink->where("id = $id")->delete();
		}elseif ($num==2) {
			$friendlylink->where(array('id'=>array('in',$id)))->delete();
		}
		
		$this->redirect('friendlink/friendlinkList');
	}
	
	
	
}
?>