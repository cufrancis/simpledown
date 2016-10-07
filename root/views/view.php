<style>
#common_content_main{background:#fff;position:relative;}
.common_content_main .yanshi_xiazai{margin-top:18px;margin-bottom:8px;}
.common_content_main .yanshi_xiazai a{font-size:16px;padding:10px 20px;margin-right:20px;background:#2DBFBE;color:#fff;}
.common_content_main .yanshi_xiazai a:hover{background:#FF6263;}
</style>

<div class="container">       
	<div class="hero-unit">
<?php foreach ($hbdx_view as $news_item): ?>

    <?php  
        $share_title = $news_item['filetitle'];
        if($news_item['description'] != "") {
            $share_desc  = $news_item['description'];
        } else {
            $share_desc  = $news_item['filetitle'];
        }
        
        $share_url   = current_url();
    ?>

<center><b><?php echo $news_item['filetitle'] ?></b>
<div class="common_content_main">
	<p class="yanshi_xiazai">
	<?php
		$id = $news_item['id'];
        $prseurl = "view/" . ($id - 1);
        $nexturl = "view/" . ($id + 1);
	?>
		<a href="<?php echo site_url($prseurl) ?>">上一页</a>

        <?php if ($news_item['fileext'] == "net") { ?>
            <a href="<?php echo $news_item['fileurl'] ?>" target="_black">下载资源</a>
        <?php } else { ?>
            <a href="<?php echo base_url()."simple/down/".$news_item['id'] ?>">下载资源</a>
        <?php } ?>

		

		<?php if( $this->session->userdata('online') ) { ?>
            <a href="<?php echo base_url(); ?>simple/fav/<?php echo $news_item['id']; ?>">收藏资源</a>
            <?php 
                $this->load->model('simple_model');
                $username = $this->session->userdata('Username');//从session中读取name
                if($this->simple_model->is_admin($username))  //是否是管理员组用户
                {
            ?>
                    <a href="<?php echo base_url(); ?>simple/del/<?php echo $news_item['id']; ?>">删除资源</a>
                    <a href="<?php echo base_url(); ?>simple/repost/<?php echo $news_item['id']; ?>">编辑资源</a>
                    <?php if( $this->simple_model->is_top($news_item['id']) ) { ?>
                        <a href="<?php echo base_url(); ?>simple/untop/<?php echo $news_item['id']; ?>">取消置顶</a>                               
                    <?php } else { ?>
                        <a href="<?php echo base_url(); ?>simple/top/<?php echo $news_item['id']; ?>">设为置顶</a> 
                    <?php } ?>                       
        <?php 
                }
            }
        ?>
		<a href="<?php echo site_url($nexturl) ?>">下一页</a>
	</p>
</div>
</center><br />
<!-- 百度分享代码 -->
<div class="bdsharebuttonbox" data-tag="share_1">
    <a class="bds_qzone" data-cmd="qzone" href="#"></a>
    <a class="bds_tsina" data-cmd="tsina"></a>
    <a class="bds_renren" data-cmd="renren"></a>
    <a class="bds_tqq" data-cmd="tqq"></a>
    <a class="bds_douban" data-cmd="douban"></a>
    <a class="bds_huaban" data-cmd="huaban"></a>
    <a class="bds_weixin" data-cmd="weixin"></a>
    <a class="bds_bdysc" data-cmd="bdysc"></a>
    <a class="bds_copy" data-cmd="copy"></a>
    <a class="bds_count" data-cmd="count"></a>
</div>

<script>
    window._bd_share_config = {
        common : {
            bdText : '<?php echo $share_title ?>', 
            bdDesc : '<?php echo $share_desc ?>', 
            bdUrl : '<?php echo $share_url ?>'
        },
        share : [{
            "bdSize" : 32
        }]
    }
    with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];
</script>

<?php 
$query = $this->simple_model->get_user_bydisname($news_item['fileuser']);
foreach ($query as $key) {
    $user_id = $key['id'];
}
?>

资源作者：<?php echo $news_item['fileuser'] ?>&nbsp;访问他的&nbsp;&nbsp;<a href="<?php echo base_url() ?>i/<?php echo $user_id ?>">个人空间</a><br />
共被下载：<?php echo $news_item['filenum'] ?>&nbsp;次<br />
文件名称：<?php echo $news_item['filename'] ?><br />
资源大小：<?php echo $news_item['filesize'] ?><br />
下载积分：<?php echo $news_item['integration'] ?><br />
文件标签：<?php echo $news_item['filetag'] ?><br />
发布日期：<?php echo $news_item['loaddate'] ?><br />
资源介绍：<br /><?php echo $news_item['filetext'] ?><br />

<?php endforeach ?>
	</div>
</div>

<?php if( $news_item['fileext'] == "mp3" ) { ?>
	<link rel="stylesheet" href="<?php echo base_url('dist/css/public.css') ?>">

    <div id="player">
        <div id="jplayer_control">
            <span class="player-right"></span>
            <span class="player-left"></span>
            <a href="javascript:void(0);" id="jplayer_play"  style="display:inline;"><span title="播放"></span></a>
            <a href="javascript:void(0);" id="jplayer_pause" style="display:none;"><span title="暂停"></span></a>
            <a href="javascript:void(0);" id="jplayer_next" title="跳过"><span></span></a>
            <span class="sep"></span>
            <div id="seekbar" style="width: 400px;">
                <div class="j-play-bar" id="progress" style="width"></div>
                <div class="j-seek-bar" style="width: 100%;"></div>
            </div>
            <div class="duration"><span id="pt">00:00</span>/<span id="tt">00:00</span></div>
            <div id="soundcontorl">
                <a href="javascript:void(0);" id="jplayer_vmin" title="静音"><span id="soundicon" class=""></span></a>
                <div id="jpalyer_v_wrap" style="width:0px">
                    <div id="jplayer_vbar" style="display:none;">
                        <div id="vamount" style="width:100%;"></div>
                    </div>
                </div>
            </div>
            <span class="sep"></span>
        </div>
            <audio id="playing"></audio>
    </div>

	<script src="<?php echo base_url('dist/js/audio.js') ?>"></script>
    <script>SendMusic("<?php echo $news_item['fileurl'] ?>")</script>
<?php } ?>

<div class="container">       
	<div class="hero-unit">
        <div class="ds-thread" data-thread-key="<?php echo $news_item['id'] ?>" data-title="<?php echo $news_item['filetitle'] ?>" data-url="<?php echo current_url() ?>"></div>
        <?php echo $this->simple_model->get_show_pinglun() ?>
	</div>
</div>

