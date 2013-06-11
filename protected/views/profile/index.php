<?php
/* @var $this ProfileController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
	'Profiles',
);
?>

<h1>Profiles</h1>

<?php
foreach ($profiles as $profile) {
    $this->renderPartial('_view',array('data' => $profile));
    echo '</br>';
};
?>

<?php $this->widget('CLinkPager', array(
    'pages' => $pages,
)) ?>