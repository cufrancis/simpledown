<link rel="stylesheet" href="<?php echo base_url('dist/css/public.css') ?>">
<style>
body,h1,h2,h3,h4,h5,h6,hr,p,blockquote,dl,dt,dd,ul,ol,li,pre,form,fieldset,legend,button,input,textarea,th,td {
margin:0;
padding:0;
}

body,button,input,select,textarea {
font:12px/1.5 tahoma,arial,\5b8b\4f53,sans-serif;
text-align:justify;
text-justify:inter-ideograph;
word-break:break-all;
word-wrap:break-word;
}

body {
behavior:url(css/hover_htc.htc);
font-family:"Microsoft YaHei",宋体;
color:#333;
}

.login .id input,.login .pw input,.in_id,.in_mo,.reg_input,.reg_input_pic {
background-color:#FFF;
border:1px solid #d5cfc2;
font-size:14px;
font-weight:700;
vertical-align:middle;
}

.reg {
width:800px;
font-size:14px;
line-height:25px;
overflow:hidden;
padding-left:50px;
}

.reg dl {
padding-left:10px;
font-size:14px;
}

.reg dl dd {
padding:3px 0;
}

.reg .title {
width:400px;
display:inline-block;
text-align:right;
padding-right:10px;
}

.id input,.pw input,.in_id,.in_mo,.reg_input,.reg_input_pic {
_behavior:url(js/Round_htc.htc);
-moz-border-radius:4px;
-webkit-border-radius:4px;
border-radius:4px;
height:25px;
}

.onShow,.onFocus,.onError,.onCorrect,.onLoad {
background:url(images/reg_bg.png) no-repeat 3000px 3000px;
padding-left:30px;
font-size:12px;
height:25px;
width:124px;
display:inline-block;
line-height:25px;
vertical-align:middle;
overflow:hidden;
margin-left:6px;
}

.onFocus {
background-position:0 -30px;
color:#333;
}
  /* Buttons */
.menu-toggle,
input[type="submit"],
input[type="button"],
input[type="reset"],
article.post-password-required input[type=submit],
.bypostauthor cite span {
    padding: 6px 10px;
    padding: 0.428571429rem 0.714285714rem;
    font-size: 11px;
    font-size: 0.785714286rem;
    line-height: 1.428571429;
    font-weight: normal;
    color: #7c7c7c;
    background-color: #e6e6e6;
    background-repeat: repeat-x;
    background-image: -moz-linear-gradient(top, #f4f4f4, #e6e6e6);
    background-image: -ms-linear-gradient(top, #f4f4f4, #e6e6e6);
    background-image: -webkit-linear-gradient(top, #f4f4f4, #e6e6e6);
    background-image: -o-linear-gradient(top, #f4f4f4, #e6e6e6);
    background-image: linear-gradient(top, #f4f4f4, #e6e6e6);
    border: 1px solid #d2d2d2;
    border-radius: 3px;
    box-shadow: 0 1px 2px rgba(64, 64, 64, 0.1);
}
.menu-toggle,
button,
input[type="submit"],
input[type="button"],
input[type="reset"] {
    cursor: pointer;
}
button[disabled],
input[disabled] {
    cursor: default;
}
.menu-toggle:hover,
button:hover,
input[type="submit"]:hover,
input[type="button"]:hover,
input[type="reset"]:hover,
article.post-password-required input[type=submit]:hover {
    color: #5e5e5e;
    background-color: #ebebeb;
    background-repeat: repeat-x;
    background-image: -moz-linear-gradient(top, #f9f9f9, #ebebeb);
    background-image: -ms-linear-gradient(top, #f9f9f9, #ebebeb);
    background-image: -webkit-linear-gradient(top, #f9f9f9, #ebebeb);
    background-image: -o-linear-gradient(top, #f9f9f9, #ebebeb);
    background-image: linear-gradient(top, #f9f9f9, #ebebeb);
}
.menu-toggle:active,
.menu-toggle.toggled-on,
button:active,
input[type="submit"]:active,
input[type="button"]:active,
input[type="reset"]:active {
    color: #757575;
    background-color: #e1e1e1;
    background-repeat: repeat-x;
    background-image: -moz-linear-gradient(top, #ebebeb, #e1e1e1);
    background-image: -ms-linear-gradient(top, #ebebeb, #e1e1e1);
    background-image: -webkit-linear-gradient(top, #ebebeb, #e1e1e1);
    background-image: -o-linear-gradient(top, #ebebeb, #e1e1e1);
    background-image: linear-gradient(top, #ebebeb, #e1e1e1);
    box-shadow: inset 0 0 8px 2px #c6c6c6, 0 1px 0 0 #f4f4f4;
    border-color: transparent;
}
#adminmenuwrap {
background-color: #ECECEC;
border-color: #CCC;
position: relative;
float: left;
border-width: 0 1px 0 0;
border-style: solid;
width: 145px;
}
</style>
    <div id="player">
        <div id="jplayer_control">
            <span class="player-right"></span>
            <span class="player-left"></span>
            <a href="javascript:void(0);" id="jplayer_play"  style="display:inline;"><span title="播放"></span></a>
            <a href="javascript:void(0);" id="jplayer_pause" style="display:none;"><span title="暂停"></span></a>
            <!-- <a href="javascript:void(0);" id="fav"><span id="favstar" title="加入收藏" class=""></span></a> -->
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
<script type="text/javascript">send_request('<?php echo base_url(); ?>music/random');</script>

<div class="container">       
	<div class="hero-unit">
        <div class="reg">
        <dl>
            <?php
            $query = $this->simple_model->get_music();
            foreach ($query as $value) {
                $mp3 = base_url().$value['fileurl'];
            ?>
                <dd><a class="title" onClick="javascript:SendMusic('<?php echo $mp3 ?>')" style="cursor:pointer;"><?php echo $value['filetitle'] ?></a></dd>
            <?php } ?>
        </dl>                            
        </div>
    </div>
</div>
