<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>接口简要说明文档</title>
</head>
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/md5.js"></script>
<style type="text/css">
<!--
body{font-size:13px;}
.STYLE1 {
	font-size: 16px;
	font-weight: bold;
}
.STYLE2 {
	font-size: 14px;
	
}

-->
</style>
<body>
<div id="tabs">
<ul>
<?php 
$yia_list = scandir(__dir__.'/' . 'document_lib');
$yia_num = 1;
foreach ($yia_list as $yia){
    $file = "document_lib/$yia";
    if(!strstr($file, ".php")) continue;
    $interfaces = require $file;
    if(is_array($interfaces)){
        ?>
        <li><a href = "#tabs-<?php echo $yia_num++?>"><?php echo $interfaces['title'];?></a></li>
        <?php
    }
}
?>
</ul>
<?php
$yia_num = 1;
foreach ($yia_list as $yia){
    $file = "document_lib/$yia";
    if(!strstr($file, ".php")) continue;
    $interfaces = require $file;
    if(is_array($interfaces)){
?>
<div id="tabs-<?php echo $yia_num;?>" style="font-size: 13px;">
    <ul>
    <?php 
        foreach ($interfaces['list'] as $key => $interface){
            ?>
            <li style="display:inline; list-style-type:decimal;"><span class="STYLE2"><?php echo $key;?></span> <a href="#yia_<?php echo $yia_num; echo $key;?>"><?php echo $interface['title']?></a> &nbsp;&nbsp;&nbsp;</li>
            <?php
        }
    ?>
    </ul>
    <?php 
        foreach ($interfaces['list'] as $key => $interface){
        ?>
            <form id="form_<?php echo $yia_num; echo $key?>" action="./index.php/<?php echo $interface['method'];?>" method="post" enctype="multipart/form-data">
                <p id = "yia_<?php echo $yia_num; echo $key?>">
                <span class="STYLE1"><?php echo "{$key},{$interface['title']}"?></span><br />
                url:http://<?php echo $_SERVER['SERVER_NAME']?>/index.php/<?php echo $interface['method'];?><br/>
                接口说明：<?php echo $interface['interface_desc'];?><br/>
                请求说明：<?php echo $interface['request_desc'];?><br/>
                返回说明：<?php echo $interface['response_desc']?><br/>
                请求参数：<br>
                pid：<input name="pid" type="text" value="123"/><br/>
                secret：<input name="secret" type="text" value="yia"/><br/>
                method：<input name="method" type="text" value="<?php echo $interface['function'];?>"/><br/>
                <?php foreach ($interface['request_args'] as $key => $value){
                    echo "{$key}：<input name=\"{$key}\" type=\"{$value['type']}\" value=\"{$value['value']}\"/><br/>";
                }?>
                请求体：<textarea name='request' style="width:1000px;height:100px;max-width:100%;"></textarea><br>
                </p>
                <button type='submit' target="blank">提交</button><br/>
                返回结果：<br/>
                <div style="color:red"></div><br/>
            </form>
        <?php
        }
    ?>
</div>
<?php
    }
    $yia_num++;
}
?>

</div>
  <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
</body>
</html>

<script type="text/javascript">
	$(function() {
	    $( "#tabs" ).tabs();
	});
	$('form').submit(function()
    {
	  var pid = this.elements['pid'].value;
	  var secret = this.elements['secret'].value;
	  var timestamp = parseInt((new Date()).valueOf() / 1000);
	  var body='';
	  for(i = 0; i < this.elements.length; ++i){
		  if(this.elements[i].type != 'text'){
			  continue;
		  }
		  var flag = body == '' ? '' : ',';
		  body = body +  flag + '"' + String(this.elements[i].name) + '"' + ':"' + String(this.elements[i].value) + '"';
	  }
	  body = window.btoa('{' + body +'}');
	  var sign = hex_md5(body + String(timestamp) +  this.elements['secret'].value);
	  var request = '';
	  request = '{"head":{"pid":"' + this.elements['pid'].value + '","time":"' + String(timestamp) + '","sign":"' + sign + '","method":"' + this.elements['method'].value + '"},"body":"' + body + '"}';
	  this.elements['request'].value = request;
	  var form = this;
	  $.ajax({
		 url:this.action,
		 type:"post",
		 cache:"false",
		 data:$(this).serialize(),
		 success:function(data){
//                                                       alert(data);
			 data = JSON.stringify(data);
			 $(form).children("div").empty();
			 $(form).children("div").append("服务器返回的数据:<br/>");
			 $(form).children("div").append(data + "<br/><br/>");
			 $(form).children("div").append("body的数据:<br/>");
			 var data_json = JSON.parse(String(data));
			 $(form).children("div").append(String(data_json.body) + '<br/><br/>');
			 $(form).children("div").append("解密后的数据:<br/>");
			 $(form).children("div").append(atob(data_json.body));
	     },
	  });
	  return false;
    });
</script>
