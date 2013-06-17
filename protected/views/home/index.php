<div class="row">
<?php
/* @var $this HomeController */

$this->breadcrumbs=array(
	'Home',
);
?>
    
<h3>List current borrowing devices </h3>
<div class="row">
    <div class="two columns"> <h4>Device</h4> </div>
    <div class="two columns"> <h4>Start time</h4> </div>
    <div class="two columns"> <h4>End time</h4> </div>
    <div class="two columns"> <h4>Time left</h4> </div>
    <div class="two columns"> <h4>Time expired</h4> </div>
</div>
<?php 
   foreach ($requests as $request) {
       $this->renderPartial('/request/_a_request', array('request' => $request, 'timestamp' => $timestamp));
   }
   echo '</br>';
   echo '</br>';
?>

<h3>List newest devices</h3>
<?php
    $this->renderPartial('/device/_list_device',array('devices' => $devices, 'columns' => 2));
?>
</div>