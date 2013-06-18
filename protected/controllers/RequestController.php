<?php

class RequestController extends Controller {
    
    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }
        
    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
    return array(
        array('allow', // allow admin user to perform 'index' actions
            'controllers' => array('request'),
            'actions' => array('index'),
            'expression' => '$user->isAdmin'
        ),
    );
    }
    
    public function actionIndex() {
        $criteria = new CDbCriteria();
        $count = Request::model()->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize=10;
        $pages->applyLimit($criteria);
        $requests = Request::model()->findAll($criteria);
        $this->render('index',array(
                'requests' => $requests,
                'pages' => $pages,
        ));
    }
}
?>
