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
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"><?php if(empty($_GET['id'])): ?>添加<?php else: ?>修改<?php endif; ?>分类</span></strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="">  
      <div class="form-group">
        <div class="label">
          <label>上级分类名：</label>
        </div>
        <div class="field">
		<select class="input w50" name="parent_id">
          <option type="text"  value="" name="parent_id" >顶级分类</option>
		  <?php if(is_array($cate)): foreach($cate as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" <?php if(($v['id']) == $info['parent_id']): ?>selected<?php endif; ?> > <?php echo str_repeat('-------',$v['level']-1); echo ($v["cate_name"]); ?></option><?php endforeach; endif; ?>
		 </select>
          <div class="tips"></div>
        </div>
		</div>
		
		  <div class="form-group" >
        <div class="label">
          <label>分类名：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo ($cx['cate_name']); ?>" name="cate_name" data-validate="required:请输入品牌名："/>
          <div class="tips"></div>
        </div>
		</div>
		<div class="label">
          <label></label>
        </div>
		<div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
     
    </form>
  </div>
</div>

</body></html>
<!-- include file="Layout:footer" -->