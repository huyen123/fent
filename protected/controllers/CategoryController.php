<?php

class CategoryController extends Controller
{
    public function actionView($id)
    {
        $category = Category::model()->findByPk($id);
        $criteria = new CDbCriteria();
        $criteria->condition = 'category_id=:category_id';
        $criteria->params = array(':category_id' => $id);
        $count = Device::model()->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = 12;
        $pages->applyLimit($criteria);
        $devices = Device::model()->findAll($criteria);
        $this->render('/device/_list_device', array('category' => $category, 'devices' => $devices,
            'id' => $id, 'pages' => $pages, 'columns' => 3));
    }
}
?>
