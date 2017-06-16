 <?php
namespace Common\Model;
 
 class GoodsModel extends \Think\Model\RelationModel{
	 protected $_link = [
	 'brand' => [
		'mapping_type' => self::BELONGS_TO,
		'class_name' =>'Brand',
		'foreign_key' => 'brand_id'
		],
		// 'goods_desc' => [
			// 'mapping_type' => self::HAS_ONE,
			// ],
	 
	 ];
	 
}