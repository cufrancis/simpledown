<div class="container">       
	<div class="hero-unit">
            <table class='table'>
                  <tr>
                        <th>操作</th><th>标题</th><th>分类</th><th>下载量</th><th>日期</th>
                  </tr>
		      <?php foreach ($hbdx_my as $news_item): ?>
                  <tr> 
                        <td>
                              <a href="<?php echo base_url('simple/del') . '/' . $news_item['id']; ?>">删除</a>
                              <a href="<?php echo base_url('simple/repost') . '/' . $news_item['id']; ?>">编辑</a>
                        </td>
                        <?php $viewurl =  'view/' .  $news_item['id'] ?>
                        <td><a href="<?php echo site_url($viewurl) ?>" title="<?php echo $news_item['filetitle']; ?>"><b>
                        <?php echo mb_substr($news_item['filetitle'],0,60); ?></b></a></td>
                        
                        <td><?php echo $news_item['filetype']; ?></td>
                        <td><?php echo $news_item['filenum']; ?></td>
                        <td><?php echo $news_item['loaddate']; ?></td>
			</tr>
		      <?php endforeach ?>     
            </table>