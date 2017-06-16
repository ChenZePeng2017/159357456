<?php
namespace Common\Model;

class GoodsModel extends \Think\Model\RelationModel
{
	protected $_link = [
	'brand' =>[
		'mapping_type' => self::BELONGS_TO,
		'class_name' => 'Bramd',
		'foreign_key' => 'brand_id'
		],
	];
	protected $_valedate = [
	['good_name','require','商品名不能为空'],
	
	];
}