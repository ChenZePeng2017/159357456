<?php
namespace Common\Model;

class GoodsModel extends \Think\Model\RelationModel
{
	
	protected $_link = [
	'brand' =>[
		'mapping_type' => self::BELONGS_TO,
		'class_name' => 'Brand',
		'foreign_key' => 'brand_id'
		],
		'goods_desc' => self::HAS_ONE,
	];
	// protected $_valedate = [
	// ['good_name','require','商品名不能为空'],
	
	// ];
}