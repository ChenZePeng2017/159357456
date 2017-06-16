<?php
namespace Admin\Controller;

class BrandController extends BaseController {
	
	

    public function index(){
		
		$keywords = I('keywords');
		$map = [];
		if(! empty($keywords)){
			$map['brand_name'] = ['like',"%{$keywords}%"];
		}
		
		
		//总记录数
		$totalRows = M('brand') -> where($map)-> count();
		
		//每页显示的数量
		$listRows = 4;
		
		//实例化分页类
		$page = new  \Think\Page($totalRows,$listRows);
		
		$this -> assign('page', $page -> show());
		
		//list(1,2) 从第一条开始取2条数据
		//page（1，2）第一页，拿2条数据
		
		$list = M('brand') -> field('id,brand_name') -> where($map)-> page(I('p',1),$listRows) -> order('id asc') -> select();
		//分配变量
		
		$this -> assign('list',$list);
	
	$this -> display();

	}
	
	public function edit(){
		//判断修改的内容
		if(IS_POST){
		//定义判断规则
		$yan = [
			//名字不能为空
			['brand_name','require','品牌名不能为空'],
			//名字不能重复
			['brand_name','brand_name','品牌名已存在',1,'unique']
		];
		//若果没有修改内容则 接收的id=传过去的id
		$_POST['id'] = I('get.id');
		//将定义的规则放进‘validate’这个函数里验证
		$ress = M('brand') -> validate($yan) -> create();
		//如果符合定义的规则 就给截止报错
		if($ress === false){
			return $this ->error(M('brand') -> getError());
		}
		//将没问题的内容修改
		$rows = M('brand') -> save();
		//如果受影响行数为空则失败，否则成功
		if(empty($rows)){
			return $this -> error('修改失败');
		}
		return $this -> success('修改成功',U('index'));
		
		}
		//查询出该条数据
		$brand = M('brand') -> find(I('id'));
		if(empty($brand)){
			return $this -> error('没找到该品牌');
		}
		//将查出来的数据放到视图
		$this -> assign('brand',$brand);
		//加载视图
		$this -> display(add);
	}
	
	
	//删除
	public function del(){
		$id = I('id');
		if(empty($id)){
			return $this -> error('参数错误');
		}
		
		$reww = M('brand') -> delete($id);
		if(empty($reww)){
			return $this -> error('删除失败');
		}
			return  $this ->success('删除成功',U('index'));
		
	}

	
	public function add(){
		if(IS_POST){
			//定义验证规则
			$va = [
				['brand_name','require','不能为空'],
				['brand_name','brand_name','名字已存在',1,'unique']
			];
			//create()这个方法会自动接受post过来的数据
			//并自动过滤非数据表字段
			//自动验证数据
			//自动完成数据
			
			$res = M('brand') -> validate($va) ->create();
			if($res === false){
				return $this -> error(M('brand') -> getError());
			}
			$row = M('brand') -> add();
			if(empty($row)){
				return $this -> error('添加失败',U('add'));
			}
			return $this -> success('添加成功',U('index'));
		}
		
		$this -> display();
	}

}		
/*	
	public function  add(){
		if(IS_POST){
			$va = [
				['brand_name','require','不能为空'],
				['brand_name','brand_name','已存在',1,'unique']
			];
			$res = M('brand') ->validate($va) -> create();
			if($res === false){
				return $this -> error(M('brand') ->getError());
			}
			
			$row = M('brand') -> add();
			if(empty($row)){
				return $this -> error('silaobadelian');
			}
			return $this -> success('xiaodaosi');
		}	
		$this -> display();
	}

	
	
   public function add(){
	   
	   if(IS_POST){
		   
		   $va = [
			   ['brand_name','require','品牌名不能为空'],
			   ['brand_name','brand_name','品牌名已存在',1,'unique']
		   ];
		   
		   $res = M('brand') ->validate($va) -> create();
		   
		   if($res === false){
			   return $this -> error(M('brand') -> getError());
		   }
		   
		   $row = M('brand') -> add();
		   
		   if(empty($row)){
			   return $this -> error('添加失败',U('add'));
		   }
			return $this -> success('添加成功',U('index'));
	   }
	   
	   $this -> display();
}
*/

