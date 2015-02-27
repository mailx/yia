


            <!--放入view具体内容-->

            <div class="block box">

                <div class="usBox">
                    <div class="usBox_2 clearfix">
                        <div class="logtitle3"></div>
                        <?php
							header("Content-type:text/html;charset=utf-8");
							$form = $this -> beginWidget('CActiveForm',
								array(
									'enableClientValidation'=>true,
									'clientOptions'=>array(
										'validateOnSubmit'=>true,
								),
							));
						?>           
						<table cellpadding="5" cellspacing="3" style="text-align:left; width:100%; border:0;">
                                <tbody>
                                    <tr>
                                        <td style="width:13%; text-align: right;">
                                        	<?php echo $form->labelEx($user_model,'username');?>
                                        </td>
                                        <td style="width:87%;">
                                            <?php echo $form->textField($user_model,'username',array('class'=>'inputBg','id'=>'User_username','size'=>25,'name'=>'User[username]'));?>
                                       		<!-- 显示表单填写错误信息 -->
                                       		<?php echo $form->error($user_model,'username');?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">
                                            <?php echo $form->labelEx($user_model,'password');?>
                                        </td>
                                        <td>
                                        	<?php echo $form->passwordField($user_model,'password',array('class'=>'inputBg','id'=>'User_password','size'=>25,'name'=>'User[password]'));?>
                                       		<!-- 显示表单填写错误信息 -->
                                       		<?php echo $form->error($user_model,'password');?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">
                                        	<?php echo $form->labelEx($user_model,'user_email');?>
                                        </td>
                                        <td>
                                            <?php echo $form->textField($user_model,'username',array('class'=>'inputBg','id'=>'User_user_email','size'=>25,'name'=>'User[user_email]'));?>   
                                       		<!-- 显示表单填写错误信息 -->
                                       		<?php echo $form->error($user_model,'user_email');?>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td align="right">
                                        	<?php echo $form->labelEx($user_model,'user_qq');?>
                                        </td>
                                        <td>
                                            <?php echo $form->textField($user_model,'user_qq',array('class'=>'inputBg','id'=>'User_user_qq','size'=>25,'name'=>'User[user_qq]'));?>   
                                        	<!-- 显示表单填写错误信息 -->
                                       		<?php echo $form->error($user_model,'user_qq');?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">
                                       		<?php echo $form->labelEx($user_model,'user_tel');?>
                                        </td>
                                        <td>
                                            <?php echo $form->textField($user_model,'user_tel',array('class'=>'inputBg','id'=>'User_user_tel','size'=>25,'name'=>'User[user_tel]','maxlength'=>11));?>   
                                       		<!-- 显示表单填写错误信息 -->
                                       		<?php echo $form->error($user_model,'user_tel');?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <!--radioButtonList($model,$attribute,$data,$htmlOptions=array())-->
                                        <td align="right">
                                        	<?php echo $form->labelEx($user_model,'user_sex');?>
                                        </td>
                                        <td>
                                        	<?php echo $form->radioButtonList($user_model,'user_sex',$sex,array('separator'=>'&nbsp;'));?>
                                        <!--    <input id="ytUser_user_sex" type="hidden" value="" name="User[user_sex]" />
                                            <span id="User_user_sex">
                                            <input id="User_user_sex_0" value="1" checked="checked" type="radio" name="User[user_sex]" /> 
                                            <label for="User_user_sex_0">男</label>&nbsp;
                                            <input id="User_user_sex_1" value="2" type="radio" name="User[user_sex]" /> 
                                            <label for="User_user_sex_1">女</label>&nbsp;
                                            <input id="User_user_sex_2" value="3" type="radio" name="User[user_sex]" /> 
                                            <label for="User_user_sex_2">保密</label></span>                                
                                         --> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <!--dropDownList($model,$attribute,$data,$htmlOptions=array())-->
                                        <td align="right">
                                        	<?php echo $form->labelEx($user_model,'user_xueli');?>
                                        </td>
                                        <td>
                                        	<?php echo $form->dropDownList($user_model,'user_xueli',$xueli);?>
                                        	<!-- 显示表单填写错误信息 -->
                                       		<?php echo $form->error($user_model,'user_xueli');?>
                                         <!--     <select name="User[user_xueli]" id="User_user_xueli">
                                                <option value="1" selected="selected">-请选择-</option>
                                                <option value="2">小学</option>

                                                <option value="3">初中</option>
                                                <option value="4">高中</option>
                                                <option value="5">大学</option>
                                            </select>   -->                             <div class="errorMessage" id="User_user_xueli_em_" style="display:none"></div>                            </td>
                                    </tr>
                                    <tr>
                                        <!--checkBoxList($model,$attribute,$data,$htmlOptions=array())-->
                                        <td align="right">
                                        	<?php echo $form->labelEx($user_model,'user_hobby');?>
                                        </td>
                                        <td>
                                        	<?php echo $form->checkBoxList($user_model,'user_hobby',$hobby,array('separator'=>'&nbsp;'));?>
                                            <!-- 显示表单填写错误信息 -->
                                       		<?php echo $form->error($user_model,'user_hobby');?>
                                            <!--  
                                            <input id="ytUser_user_hobby" type="hidden" value="" name="User[user_hobby]" />
                                            <span id="User_user_hobby">
                                            <input id="User_user_hobby_0" value="1" type="checkbox" name="User[user_hobby][]" /> 
                                            <label for="User_user_hobby_0">篮球</label>&nbsp;
                                            <input id="User_user_hobby_1" value="2" type="checkbox" name="User[user_hobby][]" /> 
                                            <label for="User_user_hobby_1">足球</label>&nbsp;
                                            <input id="User_user_hobby_2" value="3" type="checkbox" name="User[user_hobby][]" /> 
                                            <label for="User_user_hobby_2">排球</label>&nbsp;
                                            <input id="User_user_hobby_3" value="4" type="checkbox" name="User[user_hobby][]" /> 
                                            <label for="User_user_hobby_3">棒球</label>
                                            </span>    -->                            
                                        </td>
                                    </tr>
                                    <tr>

                                        <!--textArea($model,$attribute,$htmlOptions=array())-->
                                        <td align="right">
                                        	<?php echo $form->labelEx($user_model,'user_introduce');?>
                                        </td>
                                        <td>
                                        	<?php echo $form->textArea($user_model,'user_introduce',array('cols'=>'50','rows'=>'5'));?>
                                       <!--   <textarea cols="50" rows="5" name="User[user_introduce]" id="User_user_introduce"></textarea>                      
                                       --> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>

                                        <td align="left">
                                            <input name="Submit" value="" class="us_Submit_reg" type="submit" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>

                        <?php $this -> endWidget();?>       </div>
                </div>
            </div>
            <!--放入view具体内容-->

        </div>

