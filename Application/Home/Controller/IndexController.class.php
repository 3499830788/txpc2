<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	public function _initialize()
    {	//基地影视
        $basevideo=M('basevideo')->where('is_show=1 and is_main=1')->field('link_mobile,mp4_mobile')->find();
        $this->assign('basevideo',$basevideo);
        $base_heng=M('basevideo')->where('is_show=1 and is_main=0')->field('link_mobile,mp4_mobile,sltpath')->order('id desc,pubtime desc')->select();
        $this->assign('base_heng',$base_heng);

        //场景介绍
        $dan=M('danscenes')->alias('dan')->join('left join  xpc_scenestype as st on st.id=dan.cate')->where('dan.is_show=1')->field('st.title,dan.cate,dan.sltpath')->order('dan.id desc ,dan.pubtime desc')->select();
        foreach ($dan as &$value) {
        	$cate=$value['cate'];
        	$where['cate']=$cate;
        	$where['is_show']=1;
        	$data=M('duoscenes')->alias('sd')->join("left join xpc_scenestype as st on st.id=sd.cate")->where($where)->field('sd.ytgpath')->order('sd.id desc ,sd.pubtime desc')->select();
        	$value['content']=$data;
        }
        $this->assign('dan',$dan);
         //友情链接
        $friendlink=M('friendlylink')->order('`order` asc ,`id` asc')->select();
        $this->assign('friendlink',$friendlink);
        //服务案例
        $video=M('video')->where('is_show=1')->order('id desc ,pubtime desc')->select();
        $this->assign('video',$video);

        //基地服务
        $service=M('service')->where('isshow=1')->order('id desc ,pubtime desc')->select();
        $this->assign('service',$service);

        //新闻中心
        $news1=M('news')->where('isshow=1')->order('id desc ,pubtime desc')->limit(0,2)->select();
        $this->assign('news1',$news1);
        //新闻中心
        $news2=M('news')->where('isshow=1')->order('id desc ,pubtime desc')->limit(2,2)->select();
        $this->assign('news2',$news2);
    }


    public function index(){
    	$this->display();
       }
       //查看更多视频
    public function wcase(){
    	$video=M('video')->where('is_show=1')->select();
        $this->assign('video',$video);
    	$this->display();
       }
    public function info(){
    	if(I('get.ids')){
    		$ids=I('get.ids');
    		$info=M('news')->where('id='.$ids)->find();
    	}else{
    		$id=I('get.id');
    		$info=M('service')->where('id='.$id)->find();
    	}
    	$this->assign('info',$info);
    	$this->display();
    }
    public function scenes(){
		//场景介绍
        $dan=M('danscenes')->alias('dan')->join('left join  xpc_scenestype as st on st.id=dan.cate')->where('dan.is_show=1')->field('st.title,dan.cate,dan.sltpath')->order('dan.id desc ,dan.pubtime desc')->select();
        foreach ($dan as &$value) {
        	$cate=$value['cate'];
        	$where['cate']=$cate;
        	$where['is_show']=1;
        	$data=M('duoscenes')->alias('sd')->join("left join xpc_scenestype as st on st.id=sd.cate")->where($where)->field('sd.ytgpath')->order('sd.id desc ,sd.pubtime desc')->select();
        	$value['content']=$data;
        }
        $this->assign('dan',$dan);
		$this->display();
	}

	//基地服务
	public function service(){
        $service=M('service')->where('isshow=1')->order('id desc ,pubtime desc')->select();
        $this->assign('service',$service);
        $this->display();
    }
    //关于我们
    public function contact(){
    	$this->display();
    }
}