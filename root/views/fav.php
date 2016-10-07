<div class="container">       
	<div class="hero-unit">
            <table class='table'>
                  <tr>
                        <th>操作</th><th>标题</th><th>发布者</th><th>日期</th>
                  </tr>
		      <?php foreach ($hbdx_fav as $news_item): ?>
                  <tr> 
                        <td><a href="<?php echo base_url('simple/unfav') ?>/<?php echo $news_item['id']; ?>">取消收藏</a></td>

                        <td><a href="<?php echo base_url('view') ?>/<?php echo $news_item['fav_viewid'] ?>" title="<?php echo $news_item['fav_viewtitle']; ?>"><b>
                        <?php echo mb_substr($news_item['fav_viewtitle'],0,60); ?></b></a></td>
                        <td>
                              <?php 
                                    $user = $this->simple_model->get_userdisplayname($news_item['fav_username']);
                                    foreach ($user as $name)
                                    {
                                          echo $name['user_displayname'];
                                    }
                              ?>
                        </td>
                        <td><?php echo $news_item['fav_date']; ?></td>
			</tr>
		      <?php endforeach ?>     
            </table>
      </div>
</div>