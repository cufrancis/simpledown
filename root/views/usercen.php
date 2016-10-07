<div class="container">       
	<div class="hero-unit">
		<table class='table'>
			<tr>
				<th>操作</th><th>用户名</th><th>昵称</th><th>群组</th><th>QQ</th><th>邮箱</th><th>注册日期</th>
			</tr>	
			<?php foreach ($hbdx_user as $news_item): ?>
			<tr>
                <td>
                	<a href="<?php echo base_url() . 'usercen/del/' . $news_item['id']; ?>">删除</a>
                	<a href="<?php echo base_url() . 'usercen/admin/' . $news_item['id']; ?>">升级</a>
                </td>
    			<td><?php echo $news_item['user_name'] ?></td>
    			<td><?php echo $news_item['user_displayname'] ?></td>
                <td><?php echo $news_item['user_group'] ?></td>
    			<td><?php echo $news_item['user_qq'] ?></td>
                <td><?php echo $news_item['user_mail'] ?></td>
                <td><?php echo $news_item['registerdate'] ?></td>

   			 </tr>
			<?php endforeach ?>
		</table>


