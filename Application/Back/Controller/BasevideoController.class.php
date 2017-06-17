<?php
namespace Back\Controller;
use Think\Controller;
/**
* date:2017-4-6
* name:拂云
*/
class BasevideoController extends Controller{
	public function _initialize()
    {
        if (!isset($_SESSION['user_id'])) {
            $this->redirect('Back/Login/login');
            exit();
        }
    }
	function baseList(){
		$basevideo=M('basevideo');
		$search=$_GET['search'];
		$map=array();
		//判断是否存在搜索字段
		if(!empty($search))
        { 
           $map['title']  = array('like',"%$search%");
        }
        $count  = $basevideo->where($map)->count();// 查询满足要求的总记录数
        $page = getpage($count,19);
		$show= $page->show();// 分页显示输出
		$list=$basevideo->where($map)->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('page', $show); // 赋值分页输出
		$this->assign('list', $list);
		$this->display();
	}
	function baseAdd(){
		$where['id']=session('user_id');
    	$user=M('users')->where($where)->field('username')->find();
    	$this->assign('users',$user);
		$this->display();
	}
	//基地视频添加
	function add(){
		$data=I('post.');
		$data['is_show']=0;
		$data['user_id']=session('user_id');
		$data['addtime']=date('Y-m-d');

		$path="./Public/Uploads/";
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
            $data['pic_path']=trim($newFilePath,'./');

            //缩略图
            $img_dir =$newFilePath;
            $file_mini='./Public/Imagessm/'.$filename;   
            $ima = new \Think\Image();
            $ima->open($img_dir);
            $sd=$ima->thumb(800, 450);
            // var_dump($sd);die;
            $ima->save($file_mini);
            $data['sltpath']=substr($file_mini,1);

		$res=M('basevideo')->data($data)->add();
		$this->redirect('Basevideo/baseList');
		
	}
	// public function bdupload() {  
 //        $upload = new \Think\Upload(); 
 //        // 实例化上传类  
 //        $upload -> maxSize = 7145728;  
 //        // 设置附件上传大小  
 //        $upload -> exts = array('jpg', 'gif', 'png', 'jpeg');  
 //        // 设置附件上传类型  
 //        $upload -> rootPath = './Public/Uploads/';  
 //        // 设置附件上传根目录  
 //        $upload -> savePath = '';  
 //        // 设置附件上传（子）目录  
 //        // 上传文件  
 //        $info = $upload -> upload();  
 //        if (!$info) {// 上传错误提示错误信息  
 //            // $this -> error($upload -> getError());  
 //        } else {// 上传成功  
 //            foreach($info as &$file){  
 //            $img_dir = './Public/Uploads/'.$file['savepath'].$file['savename'];  
 //            $arr=explode('/', $_SERVER['SCRIPT_NAME']);
 //            //var_dump($img_dir); die; 
 //            $str="/".$arr[1].$img_dir;  
 //            //dump($str);die;
 //            $filename=$_SERVER['DOCUMENT_ROOT'].$str;   //最终获取的文件名绝对路径文件名    
 //            // dump($filename);die;
 //            $file_mini='./Public/Imagessm/'.$file['savename'];  
 //            $str_mini="/".$arr[1].$file_mini; 
 //            $filename_mini=$_SERVER['DOCUMENT_ROOT'].$str_mini;//设置缩略图保存目录  
 //            //var_dump($filename_mini);die; 
 //            $image = new \Think\Image();
 //            // var_dump($image);die;  
 //            $image->open($img_dir);
 //            // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg  
 //            $img=$image->thumb(800, 450)->save($file_mini);
 //            $file['sltpath']=substr($file_mini,1);
 //            $file['ytgpath']=substr($img_dir,1); 
 //            } 
 //            return $info;  
 //        }  
 //    }
	//点击发布
	public function release(){
		$id=I('get.id');
		$data['is_show']=1;
		$data['pubtime']=date('Y-m-d');
		M('basevideo')->where('id='.$id)->data($data)->save();
		$this->redirect('Basevideo/baseList');
	}
	//撤销发布
	public function unlease(){
		$id=I('get.id');
		M('basevideo')->where('id='.$id)->setField('is_show',0);
		$this->redirect('Basevideo/baseList');
	}
	public function baseUpdata(){
		$ids=$_GET['id'];
		if($_POST){	
			$iid=I('post.id');
			$data['user_id']=session('user_id');
			$data=I('post.');
			
			$path="./Public/Uploads/";
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
	            $data['pic_path']=trim($newFilePath,'./');

	            //缩略图
	            $img_dir =$newFilePath;
	            $file_mini='./Public/Imagessm/'.$filename;   
	            $ima = new \Think\Image();
	            $ima->open($img_dir);
	            $sd=$ima->thumb(800, 450);
	            // var_dump($sd);die;
	            $ima->save($file_mini);
	            $data['sltpath']=substr($file_mini,1);
			}
			

			$data['addtime']=date('Y-m-d');
			$res=M('basevideo')->where('id='.$iid)->data($data)->save();
			$this->redirect('Basevideo/baseList');

		}else{
			$show=M('basevideo')->where('id='.$ids)->find();
			$this->assign('show',$show);
			$this->display();
		}
		
	}
	//全部删除栏目
    public function alldelete(){
        $id=$_POST['ids'];
        if($id==''){
            $this->error('请选择要删除的选项');
        }
        $str='';
        foreach($id as $v){
            $str.= " id = $v or ";
        }
        $int=rtrim($str," or ");
        
        $basevideo = M('basevideo');
        
        $res=$basevideo->where($int)->delete();
        
        if($res){
            $this->redirect('Basevideo/baseList');
        }else{
            $this->error('删除失败');
        }
    }
    //删除单个
    public function del(){
		$id = $_POST['delid'];
		$basevideo =M('basevideo');		
		$basevideo->where("id = $id")->delete();
		$this->redirect('Basevideo/baseList');
	}
	//设置为主视频
	public function update(){
		$id=I('get.id');
		M('basevideo')->where('id='.$id)->setField('is_main',1);
		$sid[]=I('get.id');
		$id=M('basevideo')->field('id')->select();
		$id=array_column($id,'id');
		$id=array_diff($id,$sid);
		$id=implode(',', $id);
		$id=explode(',', $id);
		foreach ($id as $key => $value) {
			M('basevideo')->where('id='.$value)->setField('is_main',0);
		}
		$this->redirect('Basevideo/baseList');
	}
}

?>
