<?php

/**
 * This is the model class for table "order".
 *
 * The followings are the available columns in table 'order':
 * @property integer $id
 * @property string $status
 * @property integer $request_time
 * @property integer $start_time
 * @property integer $end_time
 * @property integer $update_at
 * @property integer $created_at
 * @property integer $user_id
 * @property integer $device_id
 */
class Order extends CActiveRecord 
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Order the static model class
     */
    public static function model($className = __CLASS__) 
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() 
    {
        return 'order';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() 
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('status, user_id, device_id', 'required'),
            array('request_time, start_time, end_time, update_at, created_at, user_id, device_id', 'numerical', 'integerOnly' => true),
            array('status', 'length', 'max' => 45),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, status, request_time, start_time, end_time, update_at, created_at, user_id, device_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() 
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() 
    {
        return array(
            'id' => 'ID',
            'status' => 'Status',
            'request_time' => 'Request Time',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'update_at' => 'Update At',
            'created_at' => 'Created At',
            'user_id' => 'User',
            'device_id' => 'Device',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() 
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('status', $this->status, true);
        $criteria->compare('request_time', $this->request_time);
        $criteria->compare('start_time', $this->start_time);
        $criteria->compare('end_time', $this->end_time);
        $criteria->compare('update_at', $this->update_at);
        $criteria->compare('created_at', $this->created_at);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('device_id', $this->device_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}