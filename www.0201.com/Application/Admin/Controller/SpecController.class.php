<?php
namespace Admin\Controller;

class SpecController extends BaseController {
	
	

    public function index(){
	$this -> display();
	}
	
	public function add(){
		if(IS_POST){
			$result = D('Spec') -> sadd();
			if(is_string ($result)){
				return $this -> error($result);
			}
			return $this -> success('添加成功',U('index'));
		}
	//找出所有的商品类型【商品模型】
	// $goods_type = M('goods_type') -> select();
	// $this -> assign('goods_type',$goods_type);
	$this -> display();	
		
	}

}














