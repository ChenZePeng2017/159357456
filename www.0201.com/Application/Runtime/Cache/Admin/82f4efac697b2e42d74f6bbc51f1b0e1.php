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
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span><?php if(empty($_GET['id'])): ?>增加<?php else: ?>修改<?php endif; ?>管理员</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="">  
      <div class="form-group">
        <div class="label">
          <label>管理员名：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo ($list['user_name']); ?>" name="user_name" data-validate="required:请输入品牌名："  <?php if(!empty($_GET['id'])): ?>disabled="disabled"<?php endif; ?> />
          <div class="tips"></div>
        </div>
	</div>
	<div class="form-group">
        <div class="label">
          <label>密码：</label>
        </div>
        <div class="field">
          <input type="password" class="input w50" value="<?php echo ($brand['brand_name']); ?>" name="password" data-validate="required:请输入品牌名：" />
          <div class="tips"></div>
        </div>
	</div>
	<div class="form-group">
        <div class="label">
          <label>确认密码：</label>
        </div>
        <div class="field">
          <input type="password" class="input w50" value="<?php echo ($brand['brand_name']); ?>" name="passwords" data-validate="required:请输入品牌名：" />
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