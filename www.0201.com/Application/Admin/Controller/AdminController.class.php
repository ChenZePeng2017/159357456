<?php
//命名空间
/*
namespace Admin\Controller;

class AdminController extends BaseController{
	

	
	
	
	public function edit(){
		$id = I('get.id');
		if(empty($id)){
			return $this ->error('参数错误');
		}
		$aaa = M('users') -> find(I('id'));
		$this -> assign('list',$aaa);
		
		if(IS_POST){
		$dy = [
			['password','require','密码不能为空'],
			['password','passwords','两个密码不一致',1,'confirm'],
		];
		
		$uus = M('users') -> validate($dy) -> create();
		if($uus == false){
			return $this -> error(M('users') -> getError());
			}
		
		$res = M('users') -> where(['id' => $id]) -> save();
		dump($res);
			if(empty($res)){
				return $this -> error('修改失败');
			}return $this -> success('修改成功',U('index'));
		}
		$this -> display('add');
	} 	
	
	public function del(){
		$id = I('get.id');
		if(! empty($id)){
			$res = M('users') -> delete($id);
			if(empty($res)){
				return $this -> error('删除失败');
			}return $this -> success('删除成功');
		}
	}
	
	
	
	public function add(){
		if(IS_POST){
			$validate =[
				['user_name','require','管理员名字不能为空'],
				['user_name','1,9','管理员名字长度不在1~9之间',1,'length'],
				['user_name','user_name','管理员名字已存在',1,'unique'],
				['password','require','密码不能为空'],
				['password','passwords','两个密码不一致',1,'confirm']
			];
			$wor = M('users') -> validate($validate)-> create();
			if($wor === false){
				return $this -> error(M('users') -> getError());
			}
			$wor['password'] = md5($wor['password']);
			$res = M('users') -> add($wor);
			if(empty($res)){
				return $this ->error('添加失败');
			}
			return $this ->success('添加成功',U('index'));
		}
		$this -> display();
	}
	
	public function index(){
		$ss = I('keywords');
		$map = [];
		if(!empty($ss)){
			$map['user_name'] = ['like',"%{$ss}%"];
		}
		$zy = M('users') -> where($map) -> count();
		$ys = 3;
		$page = new \Think\Page($zy,$ys);
		$this -> assign('page',$page -> show());
		
		$res = M('users') ->field('id,user_name') -> where($map)-> page(I('p',1),$ys) -> select();
		$this -> assign('list',$res);
		
		$this -> display();
	}
	
}*/

namespace Admin\Controller;

class AdminController extends BaseController{
	public function index(){
		$id = I('keywords');
		$map =[];
		if(!empty($id)){
			$map['cate_name'] = ['like',"%{$id}%"];
		}
		
		
		$zy = M('admin') ->where($map)-> count();
		$ym = 3;
		$page = new \Think\Page($zy,$ym);
		$this -> assign('page',$page->show());
		
		$st = M('admin') -> field('id,cate_name') -> where($map)->page(I('p',1),$ym) -> select();
		$this -> assign('list',$st);
		
		$this -> display();
	}
	
	public function add(){
		if(IS_POST){
			$dy = [
			['cate_name','require','不能为空'],
			['cate_name','cate_name','不能重复',1,'unique'],
			['password','require','密码不能为空'],
			['password','passwords','密码不一致',1,'confirm']
			];
			$js = M('admin') ->validate($dy) ->create();
			if($js == false){return $this ->error(M('admin') -> getError());}
			$js['password'] = md5($js['password']);
			$res = M('admin') ->add($js);
			if(empty($res)){return $this->error('添加失败');}return $this->success('添加成功');
			
			
		}
		
		
		$this -> display();
	}


	public function edit(){
		$id = I('get.id');
		dump($id);
		if(empty($id)){
			$this ->error('参数错误');
		}
		$res = M('admin') -> find($id); 
		$this -> assign('list',$res);
		if(IS_POST){
		$dy = [
			['password','require','不能为空'],
			['password','passwords','不一致',1,'confirm']
		];
		
		$yz = M('admin') ->validate($dy) ->create();      
		if($yz == false){
			return $this ->error(M('admin') -> getError());
			}
			
		$wor = M('admin') ->where(['id' => $id]) -> save();
		if(empty($wor)){
			return $this -> error('修改失败');
			}
			return $this ->success('修改成功');
		}
	$this -> display('add');
	}

}


































