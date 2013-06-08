<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<div style="height:50px"></div>
<div class="row">
<div class="centered seven columns">
    <div style="font-size: 3em; color:red; text-align:center">Welcome to our website</div></div></div>

<div class="none"></div>

<div class="row">
    <div class="centered six columns">
      <form method='post'>        
          <div class="row"> <div class="field"><label class="inline">Username</label><input class="wide text input" id="username_input" name="username" type="text" placeholder="Username" /></div></div>
          <div class="row"> <div class="field"> <label class="inline">Password</label><input class="wide password input" id="password_input" name="password" type="password" placeholder="Password" /></div></div>
          <div style="height:20px"></div>
          <div class="row">
              <label class="checkbox">
                <input name="checkbox" type="checkbox">
                 Log on automatically</label>
          </div>
          <div class="row"><a href="#">Forget your password ?</a></div>
          <div style="height:40px"></div>
      <div class="medium primary btn centered three columns"><input type="submit" value="Submit"></div>
    </form>
    </div>
</div>

<div class="none"></div>




