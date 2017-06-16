<?php if (!defined('THINK_PATH')) exit();?><!--    -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0" /> -->
    <title>DREAM</title>
    <!-- Bootstrap Styles-->
    <link href="/Public/Admin/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <!-- <link href="/Public/Admin/css/font-awesome.css" rel="stylesheet" /> -->
    <!-- Morris Chart Styles-->
    <!-- <link href="/Public/Admin/js/morris/morris-0.4.3.min.css" rel="stylesheet" /> -->
    <!-- Custom Styles-->
    <!-- <link href="/Public/Admin/css/custom-styles.css" rel="stylesheet" /> -->
    <!-- Google Fonts-->
    <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' /> -->
</head>

    <body style="width:1000px;">         
        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header fa fa-list">
                            商品列表 <small type="float:right"> 
									 <button type="button" class="btn btn-default" herf="<?php echo U('index');?>"><i class="fa fa-list"><a >列表</a></i>
									 </button>
									<button class="btn btn-info btn-lg"><i ></i> 添加</button>
									  <a href="#" class="btn btn-info btn-lg">info</a>
									</small>
                        </h1>
                    </div>
                </div>
				<div class="col-lg-6">
                                    <form role="form">
                                        <div class="form-group">
                                            <label>品牌类</label>
                                            <input class="form-control">
                                            <p class="help-block"></p>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Logo</label>
                                            <input type="file">
                                        </div>
                                        <div class="form-group">
                                            <label>内容</label>
                                            <textarea class="form-control" rows="3"></textarea>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-default">提交</button>
                                        <button type="reset" class="btn btn-default">重置</button>
                                       
                                    </form>
                                </div>
				
                  </div>
                </div>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
 </body>       
 </html>
<!--  -->