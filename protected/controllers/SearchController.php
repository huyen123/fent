<?php

class SearchController extends Controller {
    
    public function actionIndex($key_word) {
        $criteria = new CDbCriteria;
        
        $criteria->condition = 'serial = :keyword';
        $criteria->params = array(':keyword' => $key_word);
        $device = Device::model()->find($criteria);
        if (isset($device)) {
            $this->redirect(array('device/view', 'id' => $device->id));
        }
        
        $criteria->alias = 'profile';
        $criteria->join = 'LEFT OUTER JOIN user ON user.profile_id = profile.id';
        $criteria->condition = 'employee_code = :keyword OR user.username = :keyword';
        $criteria->params = array(':keyword' => $key_word);
        $profile = Profile::model()->find($criteria);
        if (isset($profile)) {
            $this->redirect(array('profile/view', 'id' => $profile->id));
        }
        $criteria->condition = 'employee_code LIKE "%'.$key_word.'%" OR name LIKE "%'.$key_word.'%" OR user.username LIKE "%'.$key_word.'%"';
        $profiles = Profile::model()->findAll($criteria);
        
        $criteria->condition = 'serial LIKE "%'.$key_word.'%" OR name LIKE "%'.$key_word.'%"';
        $devices = Device::model()->findAll($criteria);
        
        $this->render('results', array('devices' => $devices, 'profiles' => $profiles));
    }
}

?>