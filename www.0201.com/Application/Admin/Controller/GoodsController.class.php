<?php
namespace Admin\Controller;

class GoodsController extends BaseController {
	public function index(){
		
		
		M('goods') -> select();
		$this->display();
		}
		
	public function add(){
		
		
		
		$this->display();	
	}
	public function upload(){
		
		echo'upload';
	}
		
}
	
    
