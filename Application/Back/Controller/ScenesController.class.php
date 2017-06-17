<?php
namespace Back\Controller;
use Think\Controller;
/**
* date:2017-4-6
* name:拂云
*/
class ScenesController extends Controller{
	public function _initialize()
    {
        if (!isset($_SESSION['user_id'])) {
            $this->redirect('Back/Login/login');
            exit();
        }
    }
	//场景列表
	public function scenesList(){
		$scenes=M('danscenes');
		$scenes=M('duoscenes');
		$search=$_GET['search'];
		$map=array();
		//判断是否存在搜索字段
		if(!empty($search))
        { 
           $map['title']  = array('like',"%$search%");
        }
        $info=M('danscenes')->alias('s')->join('left join  xpc_scenestype as st on st.id=s.cate')->join('left join xpc_users as u on u.id=st.userid')->where($map)->field('s.id as sid,s.cate,s.sltpath,st.title,u.username,s.pubtime,s.is_show')->select();
        foreach ($info as $key => &$value) {
        	$cate=$value['cate'];
        	$data=M('duoscenes')->alias('sd')->join("left join xpc_scenestype as st on st.id=sd.cate")->join('left join xpc_users as u on u.id=st.userid')->where('sd.cate='.$cate)->field('sd.id,sd.sltpath,st.title,u.username,sd.is_show,sd.pubtime')->select();
        	$value['content']=$data;
        }
        $this->assign('info',$info); 
		$this->display();
	}
	
	//单个图片上传
	public function scenesAdd(){
		if($_POST){
			$infos=I('post.');
			$data['addtime']=date('Y-m-d');
			$data['cate']=$infos['classid'];
			
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

			M('danscenes')->data($data)->add();
			$this->redirect('Scenes/scenesList');
		}else{
			$where['id']=session('user_id');
	    	$user=M('users')->where($where)->field('username')->find();
	    	$cate=M('scenestype')->field('id,title')->select();
	    	$this->assign('cate',$cate);
	    	$this->assign('users',$user);
			$this->display();
		}
		
	}
	//多张图片上传
	public function scenesAddse(){
		$info=I('post.');
		$data['cate']=$info['tid'];
		if($_FILES){
				$info=$this->bdupload();
				$data['ytgpath']=$info['pic']['ytgpath'];
				$data['sltpath']=$info['pic']['sltpath'];
				$data['name']=$info['pic']['name'];
				$data['tid']=$info['tid'];
				$data['addtime']=date('Y-m-d');
				M('duoscenes')->data($data)->add();
			}else{
				//没有上传图片
			}
	}
	public function bdupload() {  
        $upload = new \Think\Upload(); 
        // 实例化上传类  
        $upload -> maxSize = 7145728;  
        // 设置附件上传大小  
        $upload -> exts = array('jpg', 'gif', 'png', 'jpeg');  
        // 设置附件上传类型  
        $upload -> rootPath = './Public/Images2/';  
        // 设置附件上传根目录  
        $upload -> savePath = '';  
        // 设置附件上传（子）目录  
        // 上传文件  
        $info = $upload -> upload();  
        if (!$info) {// 上传错误提示错误信息  
            // $this -> error($upload -> getError());  
        } else {// 上传成功  
            foreach($info as &$file){  
            $img_dir = './Public/Images2/'.$file['savepath'].$file['savename'];  
            $arr=explode('/', $_SERVER['SCRIPT_NAME']);
            //var_dump($img_dir); die; 
            $str="/".$arr[1].$img_dir;  
            //dump($str);die;
            $filename=$_SERVER['DOCUMENT_ROOT'].$str;   //最终获取的文件名绝对路径文件名    
            // dump($filename);die;
            $file_mini='./Public/Imagessm/'.$file['savename'];  
            $str_mini="/".$arr[1].$file_mini; 
            $filename_mini=$_SERVER['DOCUMENT_ROOT'].$str_mini;//设置缩略图保存目录  
            //var_dump($filename_mini);die; 
            $image = new \Think\Image();
            // var_dump($image);die;  
            $image->open($img_dir);
            // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg  
            $image->thumb(800, 450)->save($file_mini);  
            $file['sltpath']=substr($file_mini,1);
            $file['ytgpath']=substr($img_dir,1); 
  
            } 
            return $info;  
        }  
    }
    #########################################################################################
    //场景类型展示
    public function scenesTypeList(){
    	$all=M('scenestype')->select();
    	$this->assign('all',$all);
		$this->display();
	}
	public function scenesTypeAdd(){
		if($_POST){
			$info=I('post.');
			$data['title']=$info['title'];
			$data['addtime']=date('Y-m-d');
			$data['userid']=session('user_id');
			M('scenestype')->data($data)->add();
			$this->redirect('Scenes/scenesTypeList');
		}else{
			$this->display();
		}
		
	}
	public function scenesTypeUpdata(){
		$id=I('get.id');
		if($_POST){
			$info=I('post.');
			$ids=$info['ids'];
			$data['title']=$info['title'];
			$data['userid']=session('user_id');
			$data['addtime']=date('Y-m-d');
			M('scenestype')->where('id='.$ids)->data($data)->save();
			$this->redirect('Scenes/scenesTypeList');
		}else{
			$title=M('scenestype')->where('id='.$id)->field('id,title')->find();
			$this->assign('title',$title);
			$this->display();
		}
		
	}
	public function del(){
		$id=I('post.delid');
		M('scenestype')->where('id='.$id)->delete();
		$this->redirect('Scenes/scenesTypeList');
	}
	//场景类型批量删除 
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
        
        $scenestype = M('scenestype');
        
        $res=$scenestype->where($int)->delete();
        
        if($res){
            $this->redirect('Scenes/scenesTypeList');
        }else{
            $this->error('删除失败');
        }
	}
	//点击发布
	public function hits(){
		$starttime=time(); 
		$id=I('get.id');
		$m['is_show']=1;
		$m['pubtime']=date('Y-m-d');
		$type=$_POST['type'];
		if($type==1){
			
			M('danscenes')->where('id='.$id)->data($m)->save();
			//查找单表中对应的cate
			$cate=M('danscenes')->where('id='.$id)->field('cate')->find();
			$ids=M('duoscenes')->where('cate='.$cate['cate'])->field('id')->select();
		
			foreach ($ids as $key => $value) {
				M('duoscenes')->where('id='.$value['id'])->data($m)->save();
			}
		
		}
		$data['stutas']=1;
		echo json_encode($data);
		
	}
	//撤销发布
	public function unhits(){
		$id=I('get.id');
		$m['is_show']=0;
		$m['pubtime']=date('Y-m-d');
		$type=$_POST['type'];
		if($type==1){
			M('danscenes')->where('id='.$id)->data($m)->save();
			//查找单表中对应的cate
			$cate=M('danscenes')->where('id='.$id)->field('cate')->find();
			$ids=M('duoscenes')->where('cate='.$cate['cate'])->field('id')->select();
			foreach ($ids as $key => $value) {
				M('duoscenes')->where('id='.$value['id'])->data($m)->save();
			}
		}
		$data['stutas']=1;
		echo json_encode($data);
	}
	//副图点击发布（主图尚未发布,副图不可发布）
	public function lease(){
		$id=I('get.id');
		$type=$_POST['type'];
		if($type==2){
			$cate=M('duoscenes')->where('id='.$id)->field('cate')->find();
			$dan_show=M('danscenes')->where('cate='.$cate['cate'])->field('is_show')->find();
			$show=$dan_show['is_show'];
			if($show==1){
				$m['is_show']=1;
				$m['pubtime']=date('Y-m-d');
				M('duoscenes')->where('id='.$id)->data($m)->save();
				$data['stutas']=1;
			}else{
				$data['stutas']=2;
				$data['msg']='主图尚未发布,副图不可发布';
			}
		}
		echo json_encode($data); 
		
	}
	//副图点击撤销
	public function unlease(){
		$id=I('get.id');
		$type=$_POST['type'];
		if($type==2){
			$m['is_show']=0;
			$m['pubtime']=date('Y-m-d');
			M('duoscenes')->where('id='.$id)->data($m)->save();
		}
		$data['stutas']=1;
		echo json_encode($data); 
	}
	//单张图片修改
	public function scenesUpdata(){
		if($_POST){
			$infos=I('post.');
			$did=$infos['did'];
			$data['cate']=$infos['classid'];
			$data['addtime']=date('Y-m-d');
			
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
			

			M('danscenes')->where('id='.$did)->data($data)->save();
			$this->redirect('Scenes/scenesList');
			
		}else{
			$cate=M('scenestype')->field('id,title')->select();
		    $this->assign('cate',$cate);
			$id=I('get.id');
			$sid=M('danscenes')->alias('ds')->where('id='.$id)->field('id,cate')->find();
			$this->assign('sid',$sid);
			$this->display();
		}
		
	}
	//多张图片修改
	public function scenesUpdatase(){
		$infos=I('post.');
		if($_FILES){
				$info=$this->bdupload();
				if($info){
					$data['cate']=$infos['tid'];
					$data['ytgpath']=$info['pic']['ytgpath'];
					$data['sltpath']=$info['pic']['sltpath'];
					$data['name']=$info['pic']['name'];
					$data['addtime']=date('Y-m-d');
					M('duoscenes')->data($data)->add();
				}else{

				}
				
			}else{
				//没有上传图片
			}
	}

	public function deldantu(){
		$id=I('post.delid');
		$res=M('danscenes')->where('id='.$id)->field('cate')->find();
		$cate=$res['cate'];
		$info=M('duoscenes')->where('cate='.$cate)->field('id')->select();
		foreach ($info as $key => $value) {
			$id=$info[$key]['id'];
			$in=M('duoscenes')->where('id='.$id)->delete();
		}
		$m=M('danscenes')->where('id='.$id)->delete();
		$this->redirect('Scenes/scenesList');
	}
	public function delchildtu(){
		$id=I('post.delid');
		M('duoscenes')->where('id='.$id)->delete();
		$this->redirect('Scenes/scenesList');
	}
	//场景批量删除
	public function scenesdelete(){
		$data=I('post.');
		$ids=$data['ids'];
		$allid=$data['allid'];
		if($ids){
			foreach ($ids as $key => $value) {
				$res=M('danscenes')->where('id='.$value)->field('cate')->find();
				$cate=$res['cate'];
				$info=M('duoscenes')->where('cate='.$cate)->field('id')->select();
				foreach ($info as $k => $val) {
				$id=$info[$k]['id'];
				$in=M('duoscenes')->where('id='.$id)->delete();
				}
				$m=M('danscenes')->where('id='.$value)->delete();
			}
			$this->redirect('Scenes/scenesList');	
		}
		if($allid){
			foreach ($allid as $ks => $va) {
				$ins=M('duoscenes')->where('id='.$va)->delete();
					
			}
			$this->redirect('Scenes/scenesList');
		}

	}

}