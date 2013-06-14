<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
echo CHtml:: link($request->device->name, Yii::app()->createUrl('device/view', array('id' => $request->device->id)));
?>
