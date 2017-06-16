<?php
namespace Admin\Controller;

class BaseController extends \Think\Controller {
	//检查登陆
	public function _initialize(){
		
		$this ->checkLogin();
	}
	//检查登陆	
    public function checkLogin(){		
		if( ! session('?admin')){
			return $this -> error('请登录',U('Login/index'));
		}
		
	}
	
   
}