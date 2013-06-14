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
    foreach ($devices as $device) {
        $this->renderPartial('/device/_view',array('data' => $device));
        echo '</br>';
    };
?>
</div>