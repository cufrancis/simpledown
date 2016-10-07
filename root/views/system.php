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
width:100px;
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
<script type='text/javascript'>
  document.title = '<?php echo $this->simple_model->get_title()."-系统设置"; ?>';
</script>
<div class="container">       
	<div class="hero-unit">
        <div id="adminmenuwrap">
            <a href="<?php echo site_url('system') ?>" class="menu-toggle">系统设置</a><br/>
            <a href="<?php echo site_url('system/type') ?>" class="menu-toggle">分类设置</a><br/>
            <a href="<?php echo site_url('system/tag') ?>" class="menu-toggle">标签设置</a><br/>
            <a href="<?php echo site_url('system/show') ?>" class="menu-toggle">显示设置</a><br/>
            <a href="<?php echo site_url('system/mupost') ?>" class="menu-toggle">批量发布</a><br/>
            <a href="<?php echo site_url('system/hbdxcc') ?>" class="menu-toggle">作者信息</a><br/>
        </div>
        <div class="reg">
        <dl>
            <dt class="f14 b">系统基本信息</dt>
            <form action="<?php echo base_url('system/setsys') ?>" method="post">
            <dd><span class="title">网站名称：</span><input class="reg_input" name="title" id="title" type="text" value="<?php echo $this->simple_model->get_title() ?>"/> <span class="onFocus">*</span></dd>
       <!-- <dd><span class="title">是否开放注册：</span><input type="checkbox" value="1" ></dd> -->
            <dd><span class="title">每页记录数：</span><input class="reg_input" name="fileshow" id="fileshow" type="text" value="<?php echo $this->simple_model->get_shownum() ?>"/> <span class="onFocus">*</span></dd>
            <dd><span class="title">上传大小限制：</span><input class="reg_input" name="maxsize" id="maxsize" type="text" value="<?php echo $this->simple_model->get_show_maxsize() ?>"/> <span class="onFocus">* 单位 kb</span></dd>
            <dd><span class="title"></span>注意：不得超出php.ini中upload_max_filesize的值
            <dd><span class="title">初始积分：</span><input class="reg_input" style="width:450px;" maxlength="8" onkeyup="value=value.replace(/[^\d]/g,'')" name="integration" id="integration" type="text" value="<?php echo $this->simple_model->get_sys_integration() ?>"/> <span class="onFocus">*</span></dd>
            <dd><span class="title">网站关键词：</span><input class="reg_input" style="width:450px;" name="keywords" id="keywords" type="text" value="<?php echo $this->simple_model->get_keywords() ?>"/></dd>
            <dd><span class="title">网站内容摘要：</span><input class="reg_input" style="width:450px;" name="description" id="description" type="text" value="<?php echo $this->simple_model->get_description() ?>"/></dd>
            <dd><span class="title">上传格式限制：</span><input class="reg_input" style="width:450px;" name="typeexts" id="typeexts" type="text" value="<?php echo $this->simple_model->get_show_typexts() ?>"/><span class="onFocus">* 使用英文的逗号隔开</span></dd>
            <dd><span class="title">统计代码：</span><textarea name="tongji" style="margin: 0px; height: 107px; width: 446px; "><?php echo $this->simple_model->get_show_tongji() ?></textarea></dd>
            <dd><span class="title">多说代码：</span><textarea name="pinglun" style="margin: 0px; height: 107px; width: 446px; "><?php echo $this->simple_model->get_show_pinglun() ?></textarea><span class="onFocus">通用代码的JS部分</span></dd>
            <input type="submit" value="保存设置"/>
            </form> 
        </dl>                            
        </div>
    </div>
</div>
