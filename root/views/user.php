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

h1,h2,h3,h4,h5,h6 {
font-size:100%;
}

address,cite,dfn,em,var,i,u {
font-style:normal;
}
code,kbd,pre,samp {
font-family:courier new,courier,monospace;
}

small {
font-size:12px;
}

ul,ol {
list-style:none;
}

sup {
vertical-align:text-top;
}

sub {
vertical-align:text-bottom;
}

legend {
color:#000;
}

fieldset,img {
border:0;
}

button,input,select,textarea {
font-size:100%;
margin:0;
padding:0;
}

table {
border-collapse:collapse;
border-spacing:0;
}

caption,th {
text-align:left;
}

.ovh {
overflow:hidden;
}

.l {
float:left;
}

.r {
float:right;
}

.cur {
cursor:pointer;
}

.c_b {
content:".";
display:block;
height:0;
clear:both;
zoom:1;
font-size:0;
overflow:hidden;
visibility:hidden;
}

.c_b2 {
clear:both;
}

.dn {
display:none;
}

.dis {
display:block;
}

.b {
font-weight:700;
}

body {
behavior:url(css/hover_htc.htc);
font-family:"Microsoft YaHei",宋体;
color:#333;
}

.login ul {
padding-top:10px;
border-top:1px solid #fff;
}

.login ul a {
color:#005cb1;
}

.login .id input,.login .pw input,.in_id,.in_mo,.reg_input,.reg_input_pic {
background-color:#FFF;
border:1px solid #d5cfc2;
font-size:14px;
font-weight:700;
vertical-align:middle;
}

.login .id input,.login .pw input {
width:170px;
height:30px;
line-height:30px;
margin:0 5px 5px 0;
padding:0 5px;
}

.login .id input:hover,.login .pw input:hover,.in_id:hover,.in_mo:hover,.reg_input:hover,.reg_input_pic:hover {
border:1px solid #005cb1;
background-color:#F2FAFF;
}



.f_reg_but {
margin:10px 0 0 115px;
}

.reg {
width:460px;
font-size:14px;
line-height:25px;
overflow:hidden;
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

.reg_input_pic {
width:80px;
}

.in_pic_s {
margin-left:83px;
}

.reg .img {
position:absolute;
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

.onShow {
color:#999;
padding-left:0;
}

.onFocus {
background-position:0 -30px;
color:#333;
}

.onError {
background-position:0 -60px;
color:#333;
}

.onCorrect {
background-position:0 0;
text-indent:-9000px;
}

.reg_m {
margin-left:90px;
}

.clew_txt {
display:inline-block;
font-size:12px;
padding:7px 0 0 15px;
}

.id input,.pw input,.in_id,.in_mo,.reg_input,.reg_input_pic {
_behavior:url(js/Round_htc.htc);
-moz-border-radius:4px;
-webkit-border-radius:4px;
border-radius:4px;
height:25px;
}

.user_button a,.pay_but {
_behavior:url(js/Round_htc.htc);
-moz-border-radius:100px;
-webkit-border-radius:100px;
border-radius:100px;
}

#one1,#one2 {
display:block;
background-color:#e9eed8;
text-align:center;
clear:both;
cursor:pointer;
padding:5px 0;
}

#one1:hover,#one2:hover {
background-color:#d4dfb0;
}

#one1 span,#one2 span {
color:red;
}

.l_button:hover,.onLoad {
background-position:0 0;
}

.reg dl dt,#one2 {
margin-top:15px;
}

#tips{
float:left;
margin:2px 0 0 110px;
}
#tips span {
float:left;
width:40px;
height:20px;
color:#fff;
overflow:hidden;
background:#ccc;
margin-right:2px;
line-height:20px;
text-align:center;
}
#tips.s1 .active{background:#f30;}
#tips.s2 .active{background:#fc0;}
#tips.s3 .active{background:#cc0;}
#tips.s4 .active{background:#090;}

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
<script type="text/javascript">
//密码
function PassWordStart()
{
    var show = document.getElementById('pswordTip');
    show.className = "onFocus";
    show.innerHTML = "6-16位的字母数字字符"
}
window.onload = function ()
{
    var oTips = document.getElementById("tips");
    var oInput = document.getElementsByTagName("input")[0];
    var aSpan = oTips.getElementsByTagName("span");
    var show = document.getElementById('pswordTip');
    var aStr = ["弱", "中", "强", "非常好"];
    var i = 0; 
 
    oInput.onkeyup = oInput.onblur = function ()
    {
        var index = checkStrong(this.value);
        if( index == 0) {
            show.className = "onError";
            show.innerHTML = "密码长度错误";
        } else {
            show.className = "onCorrect";
        }
        oTips.className = "s" + index;
        for (i = 0; i < aSpan.length; i++)aSpan[i].className = aSpan[i].innerHTML = "";
        index && (aSpan[index - 1].className = "active", aSpan[index - 1].innerHTML = aStr[index - 1])
    }
}
/** 强度规则
 + ------------------------------------------------------- +
 1) 任何少于6个字符的组合，弱；任何字符数的同类字符组合，弱；
 2) 任何字符数的两类字符组合，中；
 3) 12位字符数以下的三类或四类字符组合，强；
 4) 12位字符数以上的三类或四类字符组合，非常好。
 + ------------------------------------------------------- +
**/
//检测密码强度
function checkStrong(sValue)
{
    var modes = 0;
    if (sValue.length < 6) return modes;
    if (/\d/.test(sValue)) modes++; //数字
    if (/[a-z]/.test(sValue)) modes++; //小写
    if (/[A-Z]/.test(sValue)) modes++; //大写  
    if (/\W/.test(sValue)) modes++; //特殊字符
    switch (modes)
    {
        case 1:
            return 1;
            break;
        case 2:
            return 2;
        case 3:
        case 4:
            return sValue.length < 12 ? 3 : 4
            break;
    }
}
//重复密码
function CheckRePassWord( value )
{
    var show = document.getElementById("t_RePassTip");
    var passwd = document.getElementById("t_UserPass");
    var passwdstr = passwd.value;
    if( passwdstr == value )
    {
        show.className = "onCorrect";
        return true;
    } 
    else
    {
        show.className = "onError";
        show.innerHTML = "两次输入的密码不一致";
        return false;
    }
}

function CheckLast(thisform)
{
    var password = document.getElementById('t_UserPass');
    var repsword = document.getElementById('t_RePass');

    if( password.value.length < 6)
    {
        return false;
    }
    if( !CheckRePassWord( repsword.value ) ) {
        return false;
    }

    return true;
    
}
</script>
<div class="container">       
	<div class="hero-unit">
        <div class="reg">
		<?php foreach ($hbdx_user as $news_item): ?>
        <dl>
            <dt class="f14 b">帐户基本信息</dt>
            <dd><span class="title">登录账号：</span><?php echo $news_item['user_name']; ?></dd>
            <dd><span class="title">会员群组：</span><?php echo $news_item['user_group']; ?></dd>
            <dd><span class="title">显示昵称：</span><?php echo $news_item['user_displayname']; ?></dd>
            <dd><span class="title">QQ 号码：</span><?php echo $news_item['user_qq']; ?></dd>
            <dd><span class="title">邮箱地址：</span><?php echo $news_item['user_mail']; ?></dd>
            <dd><span class="title">个人空间：</span><a href="<?php echo base_url() . 'i/' . $news_item['id'] ?>"><?php echo base_url() . "i/" . $news_item['id'] ?></a></dd>
            <dd><span class="title">下载积分：</span><?php echo $news_item['user_integration']; ?></dd>
        </dl>
         <?php endforeach ?>

        <form action="<?php echo base_url('user/repass') ?>" method="post" name="form1" id="form1" onsubmit="return CheckLast(this);">
            <dl>
                <dt class="f14 b">帐户安全设置</dt>
                <dd><span class="title">登录密码：</span><input class="reg_input" onchange="CheckPassWord();" onfocus="PassWordStart();" id="t_UserPass" name="t_UserPass" type="password" maxlength="16"/><span id="pswordTip" class="onshow"></span></dd>
                <div id="tips"><span></span><span></span><span></span><span></span></div><br />
                <dd><span class="title">确认登录密码：</span><input onblur="CheckRePassWord(this.value);" class="reg_input" type="password" id="t_RePass" name="t_RePass"/><span id="t_RePassTip" class="onshow"></span></dd>
            </dl>
            <div class="f_reg_but"><input id="button" name="reg" onclick="CheckLast();" type="submit" value="保存密码"/></div>
        </form>                            
    </div>
      </div>
</div>
