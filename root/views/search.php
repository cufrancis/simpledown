<style>
/* Form fields */
input[type="text"] {
	padding: 6px;
	padding: 0.428571429rem;
	font-family: inherit;
	border: 1px solid #ccc;
	border-radius: 3px;
	outline: medium;
}

button {
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
	cursor: pointer;
}

button:hover {
	color: #5e5e5e;
	background-color: #ebebeb;
	background-repeat: repeat-x;
	background-image: -moz-linear-gradient(top, #f9f9f9, #ebebeb);
	background-image: -ms-linear-gradient(top, #f9f9f9, #ebebeb);
	background-image: -webkit-linear-gradient(top, #f9f9f9, #ebebeb);
	background-image: -o-linear-gradient(top, #f9f9f9, #ebebeb);
	background-image: linear-gradient(top, #f9f9f9, #ebebeb);
}
</style>
<center>
<div style="margin-top:10px;">
<?php
	$this->load->helper('form');
	$input = array('name' => 's','size' => '60','class' => 'text','value' => '','id' =>'input','onkeypress' => 'EnterSearch()');
	echo form_input( $input );

	$search = 'onClick="Search()"';
	echo form_button('Search', '搜索', $search);
?>
</div>
<script>
	function Search()
	{
		var input = document.getElementById("input");
		var url   = Home + "search/" + input.value;
		window.location.href = url;
	}
	function EnterSearch() {
		var input = document.getElementById("input");
	if (event.keyCode == 13 && input.value != "") {
		var url   = Home + "search/" + input.value;
		window.location.href = url;
	}
}
</script>

</center>