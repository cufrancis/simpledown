<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="<?php if(isset($keywords)) { echo $keywords; } else { echo $this->simple_model->get_keywords(); } ?>" />
	<meta name="description" content="<?php if(isset($description)) { echo $description; } else { echo $this->simple_model->get_description(); } ?>" />
	<meta name="author" content="root@dolphin" />
	<meta name="copyright" content="© http://hbdx.cc" />
	<meta charset="utf-8">
	<title><?php if(isset($title)) { echo $title; } else { echo $this->simple_model->get_title(); } ?></title>
	<link rel="stylesheet" href="<?php echo base_url('dist/css/style.css') ?>" />
	<script>var Home = "<?php echo base_url() ?>"</script>
	<script src="<?php echo base_url('dist/js/jquery-1.10.2.min.js') ?>"></script>
</head>
<body>
<div class="navbar">
	<div class="navbar-inner">
		<div class="container">
			<div class="nav">
				<li><a href="<?php echo base_url();?>">首页</a></li>

<?php foreach ($hbdx_baseinfo as $type_item): ?>
		<?php $url = "catalogue/" . $type_item['code']; ?>
		<li><a href="<?php echo site_url($url) ?>"><?php echo $type_item['code'] ?></a></li>
<?php endforeach ?>
			<li><a href="<?php echo site_url('music') ?>">视听</a></li>
			</div>
			<div class="navr">
				<?php
    				if( $this->session->userdata('online') )
    				{
                  		$username = $this->session->userdata('Username');//从session中读取name
                  		if($this->simple_model->is_admin($username))  //是否是管理员组用户
                  		{
                ?>
            				 <a href="<?php echo site_url('usercen') ?>">会员</a>&nbsp;&nbsp;&nbsp;
            				 <a href="<?php echo site_url('system') ?>">系统</a>&nbsp;&nbsp;&nbsp;
             	  <?php } ?>
             			<a href="<?php echo site_url('user') ?>">个人</a>&nbsp;&nbsp;&nbsp;
             			<a href="<?php echo site_url('my') ?>">资源</a>&nbsp;&nbsp;&nbsp;
             			<a href="<?php echo site_url('fav') ?>">收藏</a>&nbsp;&nbsp;&nbsp;
             			<a href="<?php echo site_url('post') ?>">发布</a>&nbsp;&nbsp;&nbsp;
             			<a href="<?php echo site_url('logout') ?>">注销</a>&nbsp;&nbsp;&nbsp;
			  <?php } else { ?>
    					<a href="<?php echo site_url('reg') ?>">注册</a>&nbsp;&nbsp;&nbsp;
    					<a href="<?php echo site_url('login') ?>">登录</a>
    		  <?php } ?>
			</div>
		</div>
	</div>
</div>
