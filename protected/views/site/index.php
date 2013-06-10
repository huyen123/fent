<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<div style="height:50px"></div>
<div class="row">
   <div class="centered seven columns">
    <div style="font-size: 3em; color:red; text-align:center">Welcome to our website</div>
   </div>
</div>
<div class="none"></div>
<div class="row">
    <div class="centered eight columns">
      <form method='post'>        
          <div class="row" style="color: blue; font-size: 1.3em"> <div class="field"><label class="inline label-name-short">Username</label><input class="wide text input" id="username_input" name='SignInForm["username"]' type="text" placeholder="Username" /></div></div>
          <div class="row" style="color: blue; font-size: 1.3em"> <div class="field"> <label class="inline label-name-short">Password</label><input class="wide password input" id="password_input" name='SignInForm["password"]' type="password" placeholder="Password" /></div></div>
          <div style="height:20px"></div>
          <div class="row" style="color: blue; font-size: 8px">
              <label class="checkbox">
                <input name="checkbox" type="checkbox">
                 Log on automatically</label>
          </div>
          <div class="row"><a href="#">Forget your password ?</a></div>
          <div style="height:40px"></div>
          <div class="medium primary btn centered three columns"><input type="submit" value="Sign in"></div>
      </form>
    </div>
  </div>
<div class="none"></div>




