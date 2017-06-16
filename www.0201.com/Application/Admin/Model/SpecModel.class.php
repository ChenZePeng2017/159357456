<?php
namespace Admin\Model;
	
class SpecModel extends \Think\Model\RelationModel{
	
	protected $_link =[
		'spec_itmes' => self::HAS_MANY,
	];
	
	protected $_validate = [
	['spec_name','require','规格名称不能为空'],
	['spec_name','spec_name','规格名称不能重复',1,'unique'],
	['type_id','require','选择所属商品不能为空'],
	['spec_items','require','规格选项不能为空'],
	];
	
	 
	public function sadd($data=[]){
		$res = $this -> create();
		if($res === false){
			return $this ->getError('');
		}
		
		//规格选项 \r\nr  \r   \n
		$itmes = I('post.itmes');
		$itemArray = explode("\r\n",$imes);
		$temp = [];
		foreach($itemArray as $key => $value){
		$t= trim($value);
			if(! empty($t) && ! in_array($t,$temp)){
				$temp[] =['item' => $value];
			}
		}
		if(empty($temp)){
			return '规格选项不能为空';
		}
		$id = $this -> add();
		if(empty($id)){
			return '添加失败';
		}
		return (int)$id;
		
	}
	
	// public function lists{
		// return $this -> page(1,2) -> select();
	// }
	
	
}	



















