<?php if (!defined('THINK_PATH')) exit();?><!-- include file="Layout:header"  -->
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="/Public/Admin/css/pintuer.css">
<link rel="stylesheet" href="/Public/Admin/css/admin.css">
<script src="/Public/Admin/js/jquery.js"></script>
<script src="/Public/Admin/js/pintuer.js"></script>
</head>
<body>
<link href="/Public/Admin/treetable/css/jquery.treetable.css" rel="stylesheet" type="text/css" />
<script src="/Public/Admin/treetable/jquery.treetable.js"></script>
<form method="get" action="<?php echo U('index');?>" id="listform">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 分类列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="button border-main icon-plus-square-o" href="<?php echo U('add');?>"> 添加分类</a> </li>
        <li>搜索：</li>
        
        <?php if($iscid == 1): endif; ?>
        <li>
          <input type="text" placeholder="请输入搜索关键字" name="keywords" class="input" style="width:250px; line-height:17px;display:inline-block" />
          <a href="javascript:void(0)" class="button border-main icon-search" onclick="dsaa()"> 搜索</a></li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="100" style="text-align:left; padding-left:20px;">ID</th>
        <th style="text-align:left; padding-left:100px;">分类名称</th>
        <th width="310">操作</th>
      </tr>
	  
		<?php if(is_array($list)): foreach($list as $key=>$value): ?><tr data-tt-id="<?php echo ($value["id"]); ?>" data-tt-parent-id="<?php echo ($value["parent_id"]); ?>">
		  <td><?php echo ($value['id']); ?><span tyle="width:10px;color:#01a1ff;"></span></td>
          <td style="text-align:left; padding-left:100px;"><?php echo ($value['cate_name']); ?></td>
          <td>
			  <div class="button-group"> 
				  <a class="button border-main" href="<?php echo U('edit',['id' => $value['id']]);?>">
					  <span class="icon-edit">
					  </span> 修改
				  </a> 
				  <a class="button border-red" href="javascript:void(0)" onclick="return brand_del( <?php echo ($value['id']); ?>)">
			  <span class="icon-trash-o"></span>
			  删除</a> 
			  </div>
		  </td>
		</tr><?php endforeach; endif; ?>
		
      <tr>
        <td colspan="8"><div class="pagelist"> <?php echo ($page); ?></div></td>
      </tr>
    </table>
  </div>
</form>
<script>
	$(".table").treetable ({ expandable: true });
	function brand_del(id)
	{	
		if(confirm('确定要删除该品牌吗？')){
			url = '<?php echo U("del",["id"=>"idstr"]);?>'.replace('idstr',id);
			window.location.href= url;
		}
	}



	function dsaa()
	{
		$('form').submit();
	}

</script>

<!-- include file="Layout:footer" -->