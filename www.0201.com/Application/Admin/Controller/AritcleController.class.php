<?php
namespace Admin\Controller;

class IndexController extends BaseController {
	public function _initialize(){
		
		if( ! session('?admin')){
			return $this -> error('请登录',U('Login/index'));
		}
		
	}
	
    public function index(){
		
	$this -> display();
    }
	
}