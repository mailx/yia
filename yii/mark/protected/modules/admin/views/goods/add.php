<?php
header("Content-type:text/html;charset=utf-8");
$form = $this -> beginWidget('CActiveForm');
?>
<table>
	<tr>
		<td><?php echo $form ->labelEx($goods_model,'goods_name'); ?></td> 
		<td><?php echo $form ->textField($goods_model,'goods_name'); ?></td>
	</tr>
	<tr>
		<td><?php echo $form ->labelEx($goods_model,'goods_introduce'); ?></td> 
		<td><?php echo $form ->textField($goods_model,'goods_introduce'); ?></td>
	</tr>
	<tr>
		<td><?php echo $form ->labelEx($goods_model,'goods_price'); ?></td> 
		<td><?php echo $form ->textField($goods_model,'goods_price'); ?></td>
	</tr>


</table>
<?php $this -> endWidget();?>