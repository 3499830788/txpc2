<?php
namespace Back\Controller;
use Think\Controller;
/**
* date:2017-4-10
* name:拂云
*/
class VideoController extends Controller{
	public function _initialize()
    {
        if (!isset($_SESSION['user_id'])) {
            $this->redirect('Back/Login/login');
            exit();
        }
    }
	public function videoList(){
		//搜索字段
		$search=$_GET['search'];
		$map=array();
		//判断是否存在搜索字段
		if(!empty($search))
        { 
           $map['title']  = array('like',"%$search%");
        }
        $count  = M('video')->where($map)->count();// 查询满足要求的总记录数
        $page = getpage($count,19);		
		$show= $page->show();// 分页显示输出
		$video=M('video')->alias('n')->where($map)->field('n.*')->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('page',$show);
		$this->assign('video',$video);
		$this->display();
	}
	public function videoAdd(){
		$this->display();
	}
	public function add(){
		$data=I('post.');
		$data['is_show']=0;
		$data['user_id']=session('user_id');
		
		$path="./Public/Images2/";
		if(!file_exists($path)){
                @mkdir($path,0777,true);
           }
        $imgDir =$path;
		$image=I('post.image');
		$img = str_replace('data:image/png;base64', '', $image);
		$img=str_replace('data:image/jpeg;base64', '', $img);
		$img = str_replace(' ', '+', $img);
		$img = base64_decode($img);
		$filename = md5(time().mt_rand(10, 99)).".jpg"; //新图片名称
		$newFilePath = $imgDir.$filename;
		$newFile = fopen($newFilePath,"a+"); //打开文件准备写入
		//写入二进制流到文件
        fwrite($newFile,$img);
        fclose($newFile); //关闭文件
        $data['ytgpath']=trim($newFilePath,'./');

        //缩略图
        $img_dir = $newFilePath;
        $file_mini='./Public/Imagessm/'.$filename;   
        $ima = new \Think\Image();
        $ima->open($img_dir);
        $sd=$ima->thumb(800, 450);
        // var_dump($sd);die;
        $ima->save($file_mini);
        $data['sltpath']=substr($file_mini,1);

		M('video')->data($data)->add();
		$this->redirect('Video/videoList');
	}
	
    public function videoUpdate(){
    	if($_POST){
    		$iid=I('post.id');
			$data['user_id']=session('user_id');
			$data['title']=I('post.title');
			$data['vTime']=I('post.vTime');
			$data['link_mobile'] = I('post.link_mobile');
			$data['mp4_mobile'] = I('post.mp4_mobile');
			
			$path="./Public/Images2/";
			if(!file_exists($path)){
	                @mkdir($path,0777,true);
	           }
	        $imgDir =$path;
	        $image=I('post.image');
	        if($image){
				$img = str_replace('data:image/png;base64', '', $image);
				$img=str_replace('data:image/jpeg;base64', '', $img);
				$img = str_replace(' ', '+', $img);
				$img = base64_decode($img);
				$filename = md5(time().mt_rand(10, 99)).".jpg"; //新图片名称
				$newFilePath = $imgDir.$filename;
				$newFile = fopen($newFilePath,"a+"); //打开文件准备写入
				//写入二进制流到文件
		        fwrite($newFile,$img);
		        fclose($newFile); //关闭文件
		        $data['ytgpath']=trim($newFilePath,'./');

		        //缩略图
		        $img_dir = $newFilePath;
		        $file_mini='./Public/Imagessm/'.$filename;   
		        $ima = new \Think\Image();
		        $ima->open($img_dir);
		        $sd=$ima->thumb(800, 450);
		        // var_dump($sd);die;
		        $ima->save($file_mini);
		        $data['sltpath']=substr($file_mini,1);
	        }
			

			$data['addtime']=date('Y-m-d');
			$res=M('video')->where('id='.$iid)->data($data)->save();
			$this->redirect('Video/videoList');
    	}else{
    		$id=I('get.id');
    		$where['id']=session('user_id');
	    	$user=M('users')->where($where)->field('username')->find();
	    	$this->assign('users',$user);
			$data=M('video')->where('id='.$id)->find();
			$this->assign('rs',$data);
    		$this->display();
    	}
    }
     //点击发布
	public function release(){
		$id=I('get.id');
		$m['is_show']=1;
		$m['pubtime']=date('Y-m-d');
		M('video')->where('id='.$id)->data($m)->save();
		$this->redirect('Video/videoList');
	}
	//撤销发布
	public function unlease(){
		$id=I('get.id');
		M('video')->where('id='.$id)->setField('is_show',0);
		$this->redirect('Video/videoList');
	}
	//视频删除
	public function del(){
		$video=M('video');
		$id=I('post.delid');
		$video->where("id = $id")->delete();
		$this->redirect('Video/videoList');
	}
	public function alldelete(){
		$video=M("video");
        $id=$_POST['ids'];
        $str='';
        foreach($id as $v){
            $str.= " id = $v or ";
        }
        $int=rtrim($str," or ");
        $res=$video->where($int)->delete();
        if($res){
            $this->redirect('Video/videoList');
        }else{
            $this->error('删除失败');
        }
	}
}