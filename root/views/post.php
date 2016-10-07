<script src="<?php echo base_url('dist/js/jquery.uploadify.min.js') ?>"></script>
<link rel="stylesheet" href="<?php echo base_url('dist/css/uploadify.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('dist/css/styletiny.css') ?>">
<style type="text/css">
.uploadify-button {
    background-color: transparent;
    border: none;
    padding: 0;
}
.uploadify:hover .uploadify-button {
    background-color: transparent;
}
</style>

<div class="container">       
	<div class="hero-unit">
		<?php foreach ($hbdx_view as $news_item): ?>
		<input id="file_upload" name="file_upload" type="file" multiple="true">
		<form action="<?php echo base_url('post/posting') ?>" method="post" onsubmit="return Check(this)">
			<label><b>文章标题：</b></label>
			<input type="text" name="title" id="title" style="width:502px;" value="<?php if( !empty($news_item['filetitle']) ) echo $news_item['filetitle']; ?>"/>
			<select id="type" name="filetype"><option value="<?php if( !empty($news_item['filetype']) ) echo $news_item['filetype']; ?>" autofocus="true"><?php if( !empty($news_item['filetype']) ) echo $news_item['filetype']; ?></option>
<?php
	$this->load->model('simple_model');
	$query = $this->simple_model->get_type();
	foreach ($query as $value) {
		echo "<option value='".$value['code']."'>".$value['code']."</option>";
	}
?>
			</select><br/>
			<label><b>资源地址：</b></label>
			<input type="text" name="fileurl" id="url" style="width:502px;" value="<?php if( !empty($news_item['fileurl']) ) echo $news_item['fileurl']; ?>"/><br />
			<label><b>文件名称：</b></label>
			<input type="text" name="filename" id="filename" style="width:502px;" value="<?php if( !empty($news_item['filename']) ) echo $news_item['filename']; ?>"/><br />
			<label><b>文件大小：</b></label>
			<input type="text" name="filesize" id="filesize" style="width:502px;" value="<?php if( !empty($news_item['filesize']) ) echo $news_item['filesize']; ?>"/><br />
			<label><b>下载积分：</b></label> 
			<input type="text" name="integration" maxlength="2" onkeyup="value=value.replace(/[^\d]/g,'')" style="width:502px;" value="<?php if( !empty($news_item['integration']) ) echo $news_item['integration']; ?>"/><br />
			<input type="text" name="fileext" id="fileext" value="net" style="display:none"/>
			<input type="text" name="fileid" id="fileid" value="<?php if( !empty($news_item['id']) ) echo $news_item['id']; ?>" style="display:none"/>
			<label><b>文章标签：</b></label>
			<input type="text" name="tag" id="tag" style="width:502px;" value="<?php if( !empty($news_item['filetag']) ) echo $news_item['filetag']; ?>"/><br />
			<label><b>热门标签：</b></label>
<?php
	
	if( $this->session->userdata('online') )
    {
      $username = $this->session->userdata('Username');
      $user = $this->simple_model->get_userdisplayname($username);
      foreach ($user as $name)
      {
      	echo "<input type='text' style='display:none' name='diaplayname' value='".$name['user_displayname']."' />";
      }
    } 
	
	$query = $this->simple_model->get_tag();
	foreach ($query as $value) {
		echo "<a href=\"javascript:void(0)\" onClick=\"javascript:selecttag('".$value['tag_name']."')\">".$value['tag_name']."&nbsp;&nbsp;&nbsp;</a>";
	}
 ?>
			<textarea id="editinput" name="message" style="width:400px; height:200px"><?php if( !empty($news_item['fileext']) ) echo $news_item['fileext']; ?></textarea>
			<label><b>关 键 字 ：</b></label>
			<input type="text" name="keywords" style="width:502px;" value="<?php if( !empty($news_item['keywords']) ) echo $news_item['keywords']; ?>"/><br />
			<label><b>内容摘要：</b></label>
			<input type="text" name="description" style="width:502px;" value="<?php if( !empty($news_item['description']) ) echo $news_item['description']; ?>"/><br />
			<input type="submit" name="submit" value="发布" onclick="editor.post()"/><br />
	</form>
	<?php endforeach ?>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url('dist/js/tinyeditor.js') ?>"></script>
<script type="text/javascript">
	new TINY.editor.edit('editor',{
	id:'editinput',
	width:584,
	height:175,
	cssclass:'te',
	controlclass:'tecontrol',
	rowclass:'teheader',
	dividerclass:'tedivider',
	controls:['bold','italic','underline','strikethrough','|','subscript','superscript','|',
			  'orderedlist','unorderedlist','|','outdent','indent','|','leftalign',
			  'centeralign','rightalign','blockjustify','|','unformat','|','undo','redo','n',
			  'font','size','style','|','image','hr','link','unlink','|','cut','copy','paste','print'],
	footer:true,
	fonts:['Verdana','Arial','Georgia','Trebuchet MS'],
	xhtml:true,
	bodyid:'editor',
	footerclass:'tefooter',
	toggle:{text:'source',activetext:'wysiwyg',cssclass:'toggle'},
	resize:{cssclass:'resize'}
});
</script>
<script type="text/javascript">

function Check(form)
{
	var type = document.getElementById("type").value;
	var title = document.getElementById("title").value;
	var url = document.getElementById("url").value;
	if( type == "" )
	{
		window.alert("你没有选择分类");
		return false;
	}
	if( title == "" )
	{
		window.alert("文章标题不能为空");
		return false;
	}
	if( url == "" )
	{
		window.alert("资源地址不能为空");
		return false;
	}
}

function selecttag( tag ) 
{
	document.getElementById('tag').value += tag + ',';
}

</script>
<script type="text/javascript">
		$(function() {
			$('#file_upload').uploadify({
				'buttonImage' : Home + 'dist/images/browse-btn.png',
				'swf'      : Home + 'dist/css/uploadify.swf',
				'uploader' : Home + 'simple/upload',
				'fileTypeExts' : '<?php echo $this->simple_model->get_upload_typexts() ?>',
        		'fileSizeLimit' : '<?php echo $this->simple_model->get_show_maxsize() ?>',
        		'onUploadSuccess' : function(file, data, response) {//每次成功上传后执行的回调函数，从服务端返回数据到前端

				var title = document.getElementById("title");
				var name  = document.getElementById("filename");
				var size  = document.getElementById("filesize");
				var ext   = document.getElementById("fileext");
				var url   = document.getElementById("url");

		   		if(data == "FALSE")
		   		{
		   			title.value = "上传错误！检测后缀名是否为大写";
		   		}
		   		else
		   		{
		   			var fileinfo = data.split("|");
			   		title.value  = fileinfo[0];
			   		name.value   = fileinfo[1];
			   		url.value    = fileinfo[2];
			   		size.value   = fileinfo[3];
			   		ext.value    = fileinfo[4];
		   		}
        		}
			});
		});
	</script>