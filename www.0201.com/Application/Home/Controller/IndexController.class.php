<?php
namespace Home\Controller;

class IndexController extends  \Think\Controller{
	
	public function index(){
	
	dump(M('Brand') -> select());


}


}