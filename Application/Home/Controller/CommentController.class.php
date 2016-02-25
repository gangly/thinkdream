<?php
namespace Home\Controller;
use Common\Controller\HomeBaseController;
class CommentController extends HomeBaseController {
	// 定义数据表
	private $db;

	// 构造函数 实例化CommentModel
	public function __construct(){
		parent::__construct();
		$this->db=D('Comment');
	}


	// 畅言获取信息接口
	public function user_info(){
		if(session('?user')){
			$head_img=session('user.head_img');
			$nickname=session('user.nickname');
			$profile_url='';
			$user_id=session('user.id');
			$app_key='b3a658f2c133188abb35f3e2c04e430a';
			$data=array(
			'is_login'=>1,
			'user'=>array(
				'img_url'=>$head_img,
				'nickname'=>$nickname,
				'profile_url'=>$profile_url,
				'user_id'=>$user_id,
				'sign'=>$this->sign($app_key,$head_img,$nickname,$profile_url,$user_id),
				),
			
			);
		}else{
			$data=array(
			'is_login'=>0,
				);
		}
		echo 'queryUserInfoFn('.json_encode($data).')';
	}

	// 评论登陆
	public function login(){
		$data=array(
			'user_id'=>1,
			'reload_page'=>0,
			'js_src'=>'',
			);
		echo 'ccc('.json_encode($data).')';
	}

	// 评论退出
	public function logout(){
		session('user',null);
		$data=array(
			'code'=>1,
			'reload_page'=>0,
			'js_src'=>'',
			);
		echo 'bbb('.json_encode($data).')';
	}

	// 签名算法
    private function sign($key, $imgUrl, $nickname, $profileUrl, $isvUserId){
		$toSign = "img_url=".$imgUrl."&nickname=".$nickname."&profile_url=".$profileUrl."&user_id=".$isvUserId;
		$signature = base64_encode(hash_hmac("sha1", $toSign, $key, true));
        return $signature;
    }

   	// 接收畅言评论接口
    public function add_comment(){
    	$verify=I('get.verify');
    	$data=$_POST['data'];
    	$config_verify=cut_str(C('CHANGEYAN_RETURN_COMMENT'),'/',-1);
    	if($verify==$config_verify){
    		$this->db->addData();
    		
    	}
    }

}
