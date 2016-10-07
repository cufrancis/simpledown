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
/* ------------------------------------------------- */
#mytab {
  margin-bottom: 10px;
  font-family: Arial, Helvetica;
  font-size: small;
  background-color: #fff;
}

#tabs {
  overflow: hidden;
  width: 100%;
  margin: 0;
  padding: 0;
  list-style: none;
}

#tabs li {
  float: left;
  margin: 0 -15px 0 0;
}

#tabs a {
  float: left;
  position: relative;
  padding: 0 40px;
  height: 0;
  line-height: 30px;
  text-transform: uppercase;
  text-decoration: none;
  color: #fff;      
  border-right: 30px solid transparent;
  border-bottom: 30px solid #3D3D3D;
  border-bottom-color: #777;
  opacity: .3;
  filter: alpha(opacity=30);      
}

#tabs a:hover,
#tabs a:focus {
  border-bottom-color: #2ac7e1;
  opacity: 1;
  filter: alpha(opacity=100);
}

#tabs a:focus {
  outline: 0;
}

#tabs #current {
  z-index: 3;
  border-bottom-color: #3d3d3d;
  opacity: 1;
  filter: alpha(opacity=100);      
}

/* ----------- */
#content {
    background: #eee;
    border-top: 2px solid #3d3d3d;
    padding: 2em;
    /*height: 220px;*/
} 
</style>
<?php
    $query = $this->simple_model->get_user_byid($userid);
    foreach ($query as $key) {
        $user_id   = $key['id'];
        $user_name = $key['user_name'];
        $user_disn = $key['user_displayname'];
        $user_grou = $key['user_group'];
        $user_qq   = $key['user_qq'];
        $user_mail = $key['user_mail'];
        $user_view = $key['lastview'];
        $user_integration = $key['user_integration'];
    }
?>
<div class="container">
	<div class="hero-unit">
        <div class="reg">
        <dl>
            <dt class="f14 b">用户信息</dt>
            <dd><span class="title">显示昵称：</span><?php echo $user_disn ?></dd>
            <dd><span class="title">会员群组：</span><?php echo $user_grou ?></dd>
            <dd><span class="title">QQ 号码：</span><?php echo $user_qq ?></dd>
            <dd><span class="title">邮箱地址：</span><?php echo $user_mail ?></dd>
            <dd><span class="title">个人空间：</span><a href="<?php echo base_url() . 'i/' . $user_id ?>"><?php echo base_url() . "i/" . $user_id ?></a></dd>
            <dd><span class="title">下载积分：</span><?php echo $user_integration ?></dd>
        </dl>                         
        </div>
    </div>

<div id="mytab">
    <ul id="tabs">
        <li><a href="#" name="#tab1">最新发布</a></li>
        <li><a href="#" name="#tab2">最新收藏</a></li>
        <li><a href="#" name="#tab3">最新浏览</a></li>    
    </ul>

    <div id="content">
        <div id="tab1">
            <table class='table'>
                  <tr>
                        <th>日期</th><th>标题</th>
                  </tr>
                  <?php
                      $user = $this->simple_model->get_userdisplayname($user_name);
                      foreach ($user as $name)
                      {
                          $disname = $name['user_displayname'];
                      }
                      $my = $this->simple_model->get_all_data_name($disname);
                      $i = 0;
                      foreach ($my as $news_item): 
                        $i++;
                        if ( $i <= 30 ) {
                  ?>
                  <tr> 
                        <td><?php echo $news_item['loaddate']; ?></td>
                        <td><a href="<?php echo base_url(); ?>view/<?php echo $news_item['id'] ?>" title="<?php echo $news_item['filetitle']; ?>"><b>
                        <?php echo mb_substr($news_item['filetitle'],0,60); ?></b></a></td>
                  </tr>
                  <?php } ?>   
                  <?php endforeach ?>     
            </table>
        </div>
        <div id="tab2">
              <table class='table'>
                  <tr>
                        <th>日期</th><th>标题</th><th>发布者</th>
                  </tr>
                  <?php
                      $fav = $this->simple_model->get_fav($user_name);
                      $i = 0;
                      foreach ($fav as $news_item): 
                        $i++;
                        if ( $i <= 30 ) {
                  ?>
                  <tr> 
                      <td><?php echo $news_item['fav_date']; ?></td>
                      <td><a href="<?php echo base_url(); ?>view/<?php echo $news_item['fav_viewid'] ?>" title="<?php echo $news_item['fav_viewtitle']; ?>"><b>
                        <?php echo mb_substr($news_item['fav_viewtitle'],0,60); ?></b></a>
                      </td>
                      <td>
                        <?php                                          
                          $query = $this->simple_model->get_view($news_item['fav_viewid']);
                          foreach ($query as $key) {
                            $username = $key['fileuser'];
                          }
                          $query = $this->simple_model->get_user_bydisname($username);
                          foreach ($query as $item) {
                            $userid = $item['id'];
                          }
                        ?>
                          <a href="<?php echo base_url() ?>i/<?php echo $userid ?>"><?php echo $username; ?></a>
                      </td>
                  </tr>
                  <?php } ?>
                  <?php endforeach ?>     
            </table>
        </div>
        <div id="tab3">
            <table class='table'>
                  <tr>
                        <th>标题</th><th>发布者</th>
                  </tr>
                  <?php
                      $view = explode("-",$user_view);
                      for ($i=0; $i < count($view); $i++) {
                        $query = $this->simple_model->get_view($view[$i]);
                        foreach ($query as $news_item) {
                  ?>
                  <tr> 
                        <td><a href="<?php echo base_url(); ?>view/<?php echo $news_item['id'] ?>" title="<?php echo $news_item['filetitle']; ?>"><b>
                        <?php echo mb_substr($news_item['filetitle'],0,60); ?></b></a></td>
                        <td><?php echo $news_item['fileuser']; ?></td>
                  </tr>
                  <?php } } ?>     
            </table>
        </div>
    </div>
</div></div>

<script>
function resetTabs(){
    $("#content > div").hide(); //Hide all content
    $("#tabs a").attr("id",""); //Reset id's      
}

var myUrl = window.location.href; //get URL
var myUrlTab = myUrl.substring(myUrl.indexOf("#")); // For localhost/tabs.html#tab2, myUrlTab = #tab2     
var myUrlTabName = myUrlTab.substring(0,4); // For the above example, myUrlTabName = #tab

(function(){
    $("#content > div").hide(); // Initially hide all content
    $("#tabs li:first a").attr("id","current"); // Activate first tab
    $("#content > div:first").fadeIn(); // Show first tab content
    
    $("#tabs a").on("click",function(e) {
        e.preventDefault();
        if ($(this).attr("id") == "current"){ //detection for current tab
         return       
        }
        else{             
        resetTabs();
        $(this).attr("id","current"); // Activate this
        $($(this).attr('name')).fadeIn(); // Show content for current tab
        }
    });

    for (i = 1; i <= $("#tabs li").length; i++) {
      if (myUrlTab == myUrlTabName + i) {
          resetTabs();
          $("a[name='"+myUrlTab+"']").attr("id","current"); // Activate url tab
          $(myUrlTab).fadeIn(); // Show url tab content        
      }
    }
})()
</script>
