<div class="row">
<?php
/* @var $this HomeController */

$this->breadcrumbs=array(
	'Home',
);
?>
    
<h3>List current borrowing devices </h3>
<?php 
   foreach ($requests as $request) {
       $this->renderPartial('/request/_a_request', array('request' => $request));
   }
   echo '</br>';
?>

<h3>List newest devices</h3>
<?php
    $this->renderPartial('/device/_list_device',array('devices' => $devices, 'columns' => 2));
?>
</div>