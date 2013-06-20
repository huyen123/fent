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
            'controllers' => array('request', 'rejectOrAccept'),
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
        if (Yii::app()->user->isAdmin){
            $requests = Request::model()->findAll($criteria);
        }
        else{
            $user = User::model()->findByPk(Yii::app()->user->getId());
            $requests = $user->requests;
        }
            $this->render('index',array(
                'requests' => $requests,
                'pages' => $pages,
        ));
    }
    
    public function actionRejectOrAccept() {
        if (!Yii::app()->request->isAjaxRequest) {
            $this->render('/site/error', array('code' => 403, 'message' => 'Forbidden'));                        
            Yii::app()->end();
        } 
        if (isset($_POST['request_id']) && isset($_POST['value'])) {
            $value = $_POST['value'];
            $request_id = $_POST['request_id'];
            $request = Request::model()->findByPk($request_id);
            if ($request != null) {
                if ($value == 'Reject') {
                    $request->status = Constant::$REQUEST_REJECTED;
                    $result = $request->save();
                } else {                    
                    $available = Validator::checkDeviceAvailable($request->device_id);
                    if ($available) {
                        $request->status = Constant::$REQUEST_ACCEPTED;
                        $request->start_time = time();
                        $result = $request->save();
                    } else {
                        echo header('HTTP/1.1 424 Method Failure');
                        Yii::app()->end();
                    }
                }
                if ($result){
                    echo header('HTTP/1.1 200 OK');
                } else {
                    echo header('HTTP/1.1 424 Method Failure');
                }
            } else {
                echo header('HTTP/1.1 424 Method Failure');
            }
        } else {
            echo header('HTTP/1.1 405 Method Not Allowed');
        }
    }
    
    public function actionView($id){
        $request = Request::model()->findByPk($id);
        $this->render('/request/view', array(
            'request' => $request 
        ));
    }
    
    public function actionFinish() {
        if (!Yii::app()->request->isAjaxRequest) {
            $this->render('/site/error', array('code' => 403, 'message' => 'Forbidden'));                        
            Yii::app()->end();
        }
        if (isset($_POST['request_id'])) {
            $request_id = $_POST['request_id'];
            $request = Request::model()->findByPk($request_id);
            if ($request != null) {
                $request->status = Constant::$REQUEST_FINISH;
                $request->end_time = time();
                if ($request->save()) {
                    echo header('HTTP/1.1 200 OK');
                } else {
                    echo header('HTTP/1.1 424 Method Failure');
                }
            } else {
                echo header('HTTP/1.1 424 Method Failure');
            }
        } else {
            echo header('HTTP/1.1 405 Method Not Allowed');
        }
    }
}
?>
