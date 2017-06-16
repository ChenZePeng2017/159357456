<?php
namespace Admin\Controller;

class LoginController extends \Think\Controller {
    public function index(){
	//IS_POST 判断是否是POST方式提交	
	//IS_GET 判断是否是GET方式提交	
	//IS_PUT 判断是否是PUT方式提交	
	//IS_DELETE 判断是否是DELETE方式提交	
	//IS_AJAX 判断是否是AJAX方式提交	
	//REQUEST_METHOD 当前提交类型	
	//success 笑脸
	//error 哭脸
		if(IS_POST){
			$user_name 	= I('user_name');
			$password 	= I('password');
			$code 		= I(code);
			if(empty($user_name)){
				return $this -> success('用户名不能为空');
			}
			if(empty($password)){
				return $this -> success('密码不能为空');
			}
			if(empty($code)){
				return $this -> success('验证码不能为空');
			}
		// 查询用户是否存在
		$user = M('Admin') -> where(['user_name'=>$user_name]) -> find();
			if(empty($user)){
				return $this -> success('用户名不存在');
			}
		// if(md5($password) != $user['password'])	{
				// return $this -> success('密码不正确');
		// }
		//删除登录密码
		unset($user['password']);
		//保存登录状态
		session('admin',$user);
		//跳转页面
		return $this -> success('登录成功',U('Index/index'));
	}	
		
	$this -> display();
    }
	public function verify(){
		// $config = [
		// 'imageW' => 100,
		// 'imageH' => 95,
		// ];
		$verify = new \Think\Verify();
		$verify -> imageW =95;
		$verify -> imageH =43;
		$verify -> bg = array( mt_rand(120,220),mt_rand(120,220), mt_rand(120,220));
		$verify -> fontSize =18;
		$verify -> length =1;
		
		
		$verify -> entry();
	}
	public function logout(){
		session('admin',unll);
		return $this ->success('成功退出登录'.U('Login/index'));
		
	}

}