<?php
//无极分类
function cate_tree($cateArr,$parent_id=0,$level=1){
	$data = [];
	foreach($cateArr as $key => $value){
		if($value['parent_id'] == $parent_id){
			$value['level'] = $level;
			$data[] = $value;
			unset($cateArr[$key]);
			
			$temp = cate_tree($cateArr,$value['id'],$level+1);
			if(! empty($temp)){
				$data = array_merge($data,$temp);
			}
		}
	}
	return($data);
}
