<?php
namespace Admin\Controller;

class CategroyController extends BaseController {
	/*
		public function index(){
			$ss = I('keywords');
			$map = [];
			if(! empty($ss)){
				$map['type_name'] = ['like',"%{$ss}%"];
			}
			
			//总页数
			$totalRows = M('fenlei') -> where($map)-> count();
		
			//每页显示的数量
			$listRows = 4;
			
			$page = new  \Think\Page($totalRows,$listRows);
			
			$this -> assign('page', $page -> show());
			
			$row = M('fenlei') ->where($map) -> page(I('p',1),$listRows) -> order('id asc') -> select();
	
			$this -> assign('list',$row);
			$this -> display();
		}
	*/
	public function index(){
		//接收到的搜索赋给$bb
		$bb = I('keywords');
		//那个空的变量接收
		$map=[];
		//如果接收到的变量不为空，则$map里面的’type_name‘ = 
		if(! empty($bb)){$map['type_name'] = ['like',"%{$bb}%"];}
		
		
		
		
		//查询表			搜索的条件		页码					查询
		$row = M('Categroy') -> where($map) ->order('id asc') -> select();
		$tree = cate_tree($row);
		
		
		//将查询出的内容显示出来
		$this -> assign('list',$tree);
		//加载视图
		$this -> display();
	}
	/*
	public function index(){
		$bb = I('keywords');
		$map =[];
		if(! empty($bb)){$map['type_name']=['like',"%{$bb}%"];}
		
		$zs = M('fenlei') ->where($map)-> count();
		$ys = 4;
		$page = new \Think\Page($zs,$ys);
		$this -> assign('page',$page ->show());
		
		
		$sj = M('fenlei') -> where($map)->page(I('p',1),$ys) -> select();
		$this -> assign('list',$sj);
		$this -> display();
	}
	*/
	
	
	public function add(){
		if(IS_POST){
			$validate = [
				['cate_name','require','分类名不能为空'],
				['cate_name','cate_name','分类名已经存在',1,'unique']
			];
			$ssw = M('categroy') ->validate($validate) -> create();
				if($ssw === false){
				return $this -> error(M('categroy') -> getError());
				}

			
			$res = M('categroy') -> add();
				if(empty($res)){
				return $this -> error('添加失败');
				}	
				return $this -> success('添加成功',U('index'));
			
		}
		//找出所有分类
		$cate = M('categroy') -> select();
		//分配视图
		// $this -> assign('cate',$cate);
		
		//调用函数
		$data = cate_tree($cate);
		
		$this -> assign('cate',$data);
		
		$this -> display();
	}	
/*		
	public function edit(){
		$id =I('get.id');
		if(empty($id )){
			return $this -> error('参数错误');
			}
		if($_POST){
		$res = M('categroy') -> where(['id'=>$id]) -> save();
		
		if(empty($res)){
			return $this ->error('修改失败');
			}
			return $this ->success('修改成功');
		}
		
		$cx = M('categroy') -> find(I('id'));
			
			$this -> assign('cx',$cx);
			
		$this -> display('add');
	 }
		
*/	

	public function edit(){
		$id = I('get.id');
		if(empty($id)){
				return $this -> error('参数错误');
			}
		if(IS_POST){	
			//验证规则
			$validate = [
				['cate_name','require','分类名不能为空']
			];
			
			$row = M('categroy') -> validate($validate) -> create();
			
			if($row === false){
				return $this -> error(M('categroy') -> getError());
				}
				
			$res = M('categroy') ->where(['id'=>$id]) -> save();
				if(empty($res)){
					return $this -> error('修改失败');
					}
					return $this ->success('修改成功',U('index'));
			// 查询get过来的内容
		}
		//查资料
		$data = M('categroy') -> field('id,cate_name,parent_id') -> find($id);
		dump($data);
		//找出所有分类
		$cate = M('categroy') -> select();

		$tree = cate_tree($cate);
			$level = 0;		
		foreach($tree as $key => $value){
			// 找到自己
			if($value['id'] == $id){
				$level =$value['level'];
				unset($tree[$key]);
				//跳过当前循环
				continue;
			}
			//如果$level > 0 说明已经找到自己
			else if($level > 0){
				//如果下一项的等级大于自己，这说明是自己的子级
				if($value['level'] > $level){
					unset($tree[$key]);
				}else{
					//退出循环
					break;}
			}
		}
		
		//分配视图
		$this -> assign('cate',$tree);
		
		
		
		$this -> assign('cx',$data);
		$this -> display('add');
	 }
	 
	 
	 
	public function del(){	
	$id = I('get.id');
	
	if(empty($id)){
		return $this -> error('参数错误');
		}
		
		//在删除该分类之前，先确定该分类里是否有商品存在
		$goods_id = M('goods') -> where(['categroy_id' => $id]) -> getField('id');
		if(!empty($goods_id)){
			return $this -> error('请将该分类下的商品删除后再作删除分类这个操作');
		}
		$del = M('categroy') -> delete($id);
		
		if(empty($del)){
			return $this->error('删除失败');
			}
		return $this ->success('删除成功');
	}
		
		
}