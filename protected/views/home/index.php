<div class="row">
<?php
/* @var $this HomeController */

$this->breadcrumbs=array(
	'Home',
);
?>
    
<h3>List current borrowing devices </h3>
<div class="row devices">
    <div class="two columns"><h6>Device</h6></div>
    <div class="two columns"><h6>Start time</h6></div>
    <div class="two columns"><h6>Request end time</h6></div>
    <div class="two columns"><h6>Time left</h6></div>
    <div class="two columns" ><h6>Time expired</h6></div>
    <div class="two columns"><h6></h6></div>
    <HR/>
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