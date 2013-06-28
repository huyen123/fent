<?php

class CategoryController extends Controller
{
    public function actionView($id, $display = null)
    {
        $category = Category::model()->findByPk($id);
        $criteria = new CDbCriteria();
        $params = array();
        if (isset($_GET['display'])) {
            $display = $_GET['display'];
            $criteria->addCondition('status=:status');
            $criteria->addCondition('id not in (select device_id from request where status = :accepted)');
            $params[':status'] = Constant::$DEVICE_NORMAL;
            $params[':accepted'] = Constant::$REQUEST_ACCEPTED;
        }
        $criteria->addCondition('category_id=:category_id');
        $params[':category_id'] = $id;
        $criteria->params = $params;
        $count = Device::model()->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = 6;
        $pages->applyLimit($criteria);
        $devices = Device::model()->findAll($criteria);
        $this->render('index', array('category' => $category, 'devices' => $devices,
            'id' => $id, 'pages' => $pages, 'columns' => 2, 'display' => $display));
    }
}
?>
