<?php
namespace Back\Controller;
use Think\Controller;
/**
* date:2017-4-8
* name:拂云
*/
class ServiceController extends Controller{
	public function _initialize()
    {
        if (!isset($_SESSION['user_id'])) {
            $this->redirect('Back/Login/login');
            exit();
        }
    }
	public function serviceList(){
		//搜索字段
		$search=$_GET['search'];
		$map=array();
		//判断是否存在搜索字段
		if(!empty($search))
        { 
           $map['title']  = array('like',"%$search%");
        }
        $count  = M('service')->where($map)->count();// 查询满足要求的总记录数
        $page = getpage($count,19);		
		$show= $page->show();// 分页显示输出
		$service=M('service')->alias('n')->join('left join xpc_users as u on u.id=n.user_id')->where($map)->field('u.username,n.*')->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('page',$show);
		$this->assign('service',$service);
		$this->display();
	}
	public function serviceAdd(){
		$where['id']=session('user_id');
    	$user=M('users')->where($where)->field('username')->find();
    	$this->assign('users',$user);
		$this->display();
	}
	public function add(){
		$service=M('service');
		$data['user_id']=session('user_id');
		$data['title']=I('post.title');
		$content = $_POST['content'];
		$content = str_replace("<img","<img onload=javascript:resizepic(this)",$content);
		$data['content'] = $content;
		$data['tag']=I('post.tag');
		$data['info']=I('post.info');
		$data['isshow'] = 0;
		
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
        $sd=$ima->thumb(320, 180);
        // var_dump($sd);die;
        $ima->save($file_mini);
        $data['sltpath']=substr($file_mini,1);

        $service->data($data)->add();
		$this->redirect('Service/serviceList');
	}
    //点击发布
	public function release(){
		$id=I('get.id');
		$m['isshow']=1;
		$m['pubtime']=date('Y-m-d');
		M('service')->where('id='.$id)->data($m)->save();
		$this->redirect('Service/serviceList');
	}
	//撤销发布
	public function unlease(){
		$id=I('get.id');
		M('service')->where('id='.$id)->setField('isshow',0);
		$this->redirect('Service/serviceList');
	}
	//文章修改
	public function serviceUpdata(){
		$id=I('get.id');
		$service=M('service');
		if($_POST){
			$iid=I('post.id');
			$data['user_id']=session('user_id');
			$data['title']=I('post.title');
			$content = $_POST['content'];
			$content = str_replace("<img","<img onload=javascript:resizepic(this)",$content);
			$data['content'] = $content;
			$data['tag']=I('post.tag');
			$data['info']=I('post.info');

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
		        $sd=$ima->thumb(320, 180);
		        // var_dump($sd);die;
		        $ima->save($file_mini);
		        $data['sltpath']=substr($file_mini,1);
				
			}
			
	        
			$data['addtime']=date('Y-m-d');
			$res=$service->where('id='.$iid)->data($data)->save();
			$this->redirect('Service/serviceList');

		}else{
			$where['id']=session('user_id');
	    	$user=M('users')->where($where)->field('username')->find();
	    	$this->assign('users',$user);
			$data=M('service')->where('id='.$id)->find();
			$this->assign('data',$data);
			$this->display();
		}
		
	}
	//服务删除
	public function del(){
		$service=M('service');
		$id=I('post.delid');
		$service->where("id = $id")->delete();
		$this->redirect('Service/serviceList');
	}
	public function alldelete(){
		$service=M("service");
        $id=$_POST['ids'];
        $str='';
        foreach($id as $v){
            $str.= " id = $v or ";
        }
        $int=rtrim($str," or ");
        $res=$service->where($int)->delete();
        if($res){
            $this->redirect('Service/serviceList');
        }else{
            $this->error('删除失败');
        }
	}
}
?>