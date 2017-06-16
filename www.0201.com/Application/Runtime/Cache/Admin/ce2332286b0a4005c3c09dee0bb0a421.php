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
<script src="js/jquery.js"></script>
<script src="js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"><?php if(empty($_GET['id'])): ?>添加<?php else: ?>修改<?php endif; ?>品牌</span></strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="">  
      <div class="form-group">
        <div class="label">
          <label>规格：</label>
        </div>
        <div class="field">
		<input type="text" class="input w50" value="<?php echo ((isset($brand["spec_name"]) && ($brand["spec_name"] !== ""))?($brand["spec_name"]):''); ?>" name="spec_name"/>
          <div class="tips"></div>
        </div>
		</div>
		
		  <div class="form-group" >
        <div class="label">
          <label>所属商品：</label>
        </div>
        <div class="field">
          <select  class="input w50" name="type_id">
		  <option value=''>请选择商品类型</option>
		  <?php if(is_array($goods_type)): foreach($goods_type as $key=>$v): ?><option name="type_id" value='<?php echo ($v["id"]); ?>'><?php echo ($v["type_name"]); ?></option><?php endforeach; endif; ?>
		  </select>
          <div class="tips"></div>
        </div>
		</div>
		
		 <div class="form-group">
        <div class="label">
          <label>规格选项：</label>
        </div>
        <div class="field">
			<textarea name='spec_items' value="spec_items" class="input w100" style="width:300px;height:130px;"></textarea>
          <div class="tips"></div>
        </div>
		</div>
		
		<div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
     
    </form>
  </div>
</div>

</body></html>
<!-- include file="Layout:footer" -->