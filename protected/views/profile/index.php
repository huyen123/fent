<?php
/* @var $this ProfileController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
	'Profiles',
);
?>

<h1>Profiles</h1>


<?php if(Yii::app()->user->hasFlash('sucessful')): ?>
    <div class="success alert">
        <?php echo Yii::app()->user->getFlash('sucessful'); ?>
    </div>
 <?php endif; ?>

<?php
foreach ($profiles as $profile) {
    $this->renderPartial('_view',array('data' => $profile));
    echo '</br>';
};
?>

<?php $this->widget('CLinkPager', array(
    'pages' => $pages,
)) ?>