<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class='table table-hover'>
                    <thead>
                        <tr>
                            <?php if($this->simple_model->get_show_use() == "TRUE") echo "<th>操作</th>" ?>
                            <th>标题</th>
                            <?php if($this->simple_model->get_show_size() == "TRUE") echo "<th>大小</th>" ?>
                            <?php if($this->simple_model->get_show_number() == "TRUE") echo "<th>下载/浏览</th>" ?>
                            <?php if($this->simple_model->get_show_user() == "TRUE") echo "<th>发布者</th>" ?>
                            <?php if($this->simple_model->get_show_tag() == "TRUE") echo "<th>标签</th>" ?>
                            <?php if($this->simple_model->get_show_integration() == "TRUE") echo "<th>积分</th>" ?>
                            <?php if($this->simple_model->get_show_date() == "TRUE") echo "<th>日期</th>" ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($hbdx_blue as $news_item): ?>
                        <tr>
                            <?php if($this->simple_model->get_show_use() == "TRUE") { ?>
                            <?php if ($news_item['fileext'] == "net") { ?>
                                <td><a href="<?php echo $news_item['fileurl'] ?>" target="_black">下载</a></td>
                            <?php } else { ?>
                                <td><a href="<?php echo base_url()."simple/down/".$news_item['id'] ?>">下载</a></td>
                            <?php } } ?>

                            <td>
                                <?php if($news_item['fileext'] == "torrent") { ?>
                                    <a style="background:#1369A4;color:#fff;">&nbsp;&nbsp;种子&nbsp;&nbsp;</a> 
                                <?php } ?>

                                <?php if($news_item['top'] == 0) { ?>
                                    <a style="background:#BB3D00;color:#fff;">&nbsp;&nbsp;置顶&nbsp;&nbsp;</a> 
                                <?php } ?>

                                <?php if($news_item['filenum'] >= 100) { ?>
                                    <a style="background:#7E3D76;color:#fff;">&nbsp;&nbsp;热门&nbsp;&nbsp;</a> 
                                <?php } ?>

                                <?php $baidu = strpos( $news_item['fileurl'], 'pan.baidu.com'); if ($baidu !== false) { ?>
                                    <a style="background:#467500;color:#fff;">&nbsp;&nbsp;百度&nbsp;&nbsp;</a> 
                                <?php } ?>
                                <?php $viewurl =  'view/' .  $news_item['id'] ?>
                                <a href="<?php echo site_url($viewurl) ?>" title="<?php echo $news_item['filetitle']; ?>"><b>
                                <?php echo mb_substr($news_item['filetitle'],0,60); ?></b></a>
                            </td>
                            <?php if($this->simple_model->get_show_size() == "TRUE") { ?>
                            <td><?php echo $news_item['filesize'] ?></td>
                            <?php } ?>

                            <?php if($this->simple_model->get_show_number() == "TRUE") { ?>
                            <td><?php echo $news_item['filenum'] . "/" . $news_item['viewnum'] ?></td>
                            <?php } ?>

                            <?php if($this->simple_model->get_show_user() == "TRUE") { ?>
                                <?php 
                                    $query = $this->simple_model->get_user_bydisname($news_item['fileuser']);
                                    foreach ($query as $key) {
                                        $user_id = $key['id'];
                                    }
                                    $userurl = "i/" . $user_id;
                                ?>
                            <td><a href="<?php echo site_url($userurl) ?>"><?php echo $news_item['fileuser'] ?></a></td>
                            <?php } ?>

                            <?php if($this->simple_model->get_show_tag() == "TRUE") { ?>
                            <td>
                                <?php
                                    $tag = explode(",",$news_item['filetag']);
                                    for ($i=0; $i < count($tag); $i++) {
                                        $tagurl = 'tag/' . $tag[$i]
                                ?>
                                    <a href="<?php echo site_url($tagurl) ?>" class="tag"><?php echo $tag[$i]; ?></a>
                                <?php } ?>
                            </td>
                            <?php } ?>
                            
                            <?php if($this->simple_model->get_show_integration() == "TRUE") { ?>
                            <td>
                            <?php 
                                if($news_item['integration'] == 0) {
                                    echo "免费";
                                } else {
                                    echo $news_item['integration'];
                                }
                            ?>
                            </td>
                            <?php } ?>
                            
                            <?php if($this->simple_model->get_show_date() == "TRUE") { ?>
                            <td><?php echo $news_item['loaddate'] ?></td>
                            <?php } ?>

                         </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>