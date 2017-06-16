<?php
namespace Common\Model;
	
class BrandModel extends \Think\Model\RelationModel{
	
	protected $_link = [
		'goods' => [
		',mapping_type' => self::HAS_MANY,
		'class_name' => 'Goods',
		],
	
	];
	
	
	protected $_validate = [
	['brand_name','require','名字不能为空'],
	];
	
	protected $auto = [
	['adfad',self::MODEL_INSERT,'string'],
	];
	
	// public function lists{
		// return $this -> page(1,2) -> select();
	// }
	
	
}	
