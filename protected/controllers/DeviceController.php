<?php

class DeviceController extends Controller
{
    public function filters()
    {
        return array(
            'accessControl',
            'postOnly + delete',
        );
    }
    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',
                'actions' => array('index', 'view', 'createRequest', 'like'),
                'users' => array('@'),
            ),
            array('allow',
                'controllers' => array('device'),
                'actions' => array('create', 'update', 'delete'),
                'expression' => '$user->isAdmin'
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $existed = Validator::checkRequestExistence(Yii::app()->user->getId(), $id);
        $liked = Favorite::model()->exists('user_id=:user_id AND device_id=:device_id', 
                array(':user_id' => Yii::app()->user->getId(), ':device_id' => $id));
        $device = Device::model()->findByPk($id);
        $this->render('view', array(
            'device' => $device,
            'existed' => $existed,
            'liked' => $liked
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new Device;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Device']))
        {
            $model->attributes = $_POST['Device'];
            if($model->save())
            {
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Device']))
        {
            $model->attributes = $_POST['Device'];
            if($model->save())
            {
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if(!isset($_GET['ajax']))
        {
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $criteria = new CDbCriteria();
        $count = Device::model()->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = 12;
        $pages->applyLimit($criteria);
        $devices = Device::model()->findAll($criteria);
        $this->render('index', array(
            'devices' => $devices,
            'pages' => $pages,
            'columns' => 3,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Device the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Device::model()->findByPk($id);
        if($model === null)
        {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Device $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax'] === 'device-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    public function actionCreateRequest()
    {
        if (!Yii::app()->request->isAjaxRequest) {
            $this->render('/site/error', array('code' => 403, 'message' => 'Forbidden'));            
            Yii::app()->end();
        }        
        if (isset($_POST['device_id']))
        {   
            $existed = Validator::checkRequestExistence(Yii::app()->user->getId(), $_POST['device_id']);
            if (!$existed) {                            
                $request = new Request;
                $request->device_id = $_POST['device_id'];
                $request->user_id = Yii::app()->user->getId();
                if ($_POST['date_from'] != null) {
                    $request->request_start_time = strtotime($_POST['date_from']);
                }
                if ($_POST['date_to'] !=null) {
                    $request->request_end_time = strtotime($_POST['date_to']);
                }
                $request->status = Constant::$REQUEST_BEING_CONSIDERED;
                $result = $request->save();
                if ($result) {
                    echo header('HTTP/1.1 201 Created');
                } else {
                    echo header('HTTP/1.1 424 Method Failure');
                }
            } else {                
                echo header('HTTP/1.1 406 Not Acceptable');
            }
        } else {
            echo header('HTTP/1.1 405 Method Not Allowed');
        }
    }
    
    public function actionLike()
    {
        if (!Yii::app()->request->isAjaxRequest) {
            $this->render('/site/error', array('code' => 403, 'message' => 'Forbidden'));                        
            Yii::app()->end();
        }        
        if (isset($_POST['device_id'])) {
            $device_id = $_POST['device_id'];
            $user_id = Yii::app()->user->getId();
            $like = Favorite::model()->find('user_id=:user_id AND device_id=:device_id', 
                array(':user_id' => $user_id, ':device_id' => $device_id));
            if ($like != null) {
                $like->delete();
                echo header('HTTP/1.1 200 OK');
            } else {
                $like = new Favorite;
                $like->device_id = $device_id;
                $like->user_id = $user_id;
                $result = $like->save();
                if ($result) {
                    echo header('HTTP/1.1 200 OK');
                } else {
                    echo header('HTTP/1.1 424 Method Failure');
                }
            }
        } else {
            echo header('HTTP/1.1 405 Method Not Allowed');
        }
    }
}
