<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="none"></div>
<div style="font-size: 2em; color:red; text-align: center">Reset Password</div>
<div class="row" >
    <form method="Post">
      <fieldset class="seven centered columns">
      <div style="height:50px"></div>
      <div  style="color: blue; font-size: 1.3em">
          <ul>
            <li class="field">                
              <?php echo CHtml::activePasswordField($form, 'password', array('class' => 'password input', 'placeholder' => 'New Password')); ?>
            </li>
            <li class="field">              
              <?php echo CHtml::activePasswordField($form, 'passwordConfirm', array('class' => 'password input', 'placeholder' => 'New Password Confirmation')); ?>
            </li>
            <div style="height:50px"></div>
            <li>
             <div class="medium primary btn centered three columns"><?php echo CHtml::submitButton('Submit'); ?></div>
            </li>     
          </ul>
      </div>
      </fieldset>
    </form>
</div>
<div class="none"></div>
