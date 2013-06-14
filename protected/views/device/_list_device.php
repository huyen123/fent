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
        echo CHtml::button('Create', array('submit' => array('device/create')));
        echo '</div>';
    }
?>

<?php 
    for ($i = 0; $i < sizeof($devices); $i = $i + $columns)
    {   
        echo '<div class="row device">';
        for ($t = 0; $t < $columns; $t++)
        {
            if ($columns == 3)
            {
                echo '<fieldset class="four columns">';
            } else {
                echo '<fieldset class="six columns">';
            }
            if (isset($devices[$i + $t]))
            {
                $this->renderPartial('/device/_view',array('data' => $devices[$i + $t]));
            }
            echo '</fieldset>';
        }
        echo '</div>';
    }
?>

<?php $this->widget('CLinkPager', array(
    'pages' => $pages,
)) ?>
</div>

