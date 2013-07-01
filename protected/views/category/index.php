<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row centered">
    <h1><?php echo $category->name; ?></h1>
    <?php
        if (Yii::app()->user->isAdmin)
        {
            echo "<div class='medium primary btn'>";
            echo CHtml::button('Create', array('submit' => array('device/create', 'category_id' => $id)));
            echo '</div>';
            echo '<p>';
        }
        if ($display) {
            echo "<div class='medium primary btn'>";
            echo CHtml::link('Show all device', Yii::app()->createUrl('category/view',
                array('id' => $id)));
            echo '</div>';
        } else {
            echo "<div class='medium primary btn'>";
            echo CHtml::link('Filter device free', Yii::app()->createUrl('category/view',
                array('id' => $id, 'display' => 'device_free')));
            echo '</div>';
        }
    ?>
    <?php $this->renderPartial('/device/_list_device', array('devices' => $devices, 'columns' => $columns)); ?>
    <?php $this->widget('CLinkPager', array(
        'pages' => $pages,
    )) ?>
</div>