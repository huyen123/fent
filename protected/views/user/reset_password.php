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
                <input class="text input" name='ResetPasswordForm[password]' type="password" placeholder="New password" />
            </li>
            <li class="field">              
              <input class="text input" name='ResetPasswordForm[passwordConfirm]' type="password" placeholder="New password Confirmation" />
            </li>
            <div style="height:50px"></div>
            <li>
             <div class="medium primary btn centered three columns"><input type="submit" value="Submit"></div>
            </li>
      
          </ul>
      </div>
      </fieldset>
    </form>
</div>
<div class="none"></div>
