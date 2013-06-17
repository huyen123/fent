<div class="row">
    <div class="four columns image photo">
        <?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/images/no-image.jpg'),
                Yii::app()->createUrl('device/view', array('id'=>$request->device->id))); ?>
    </div>
    <div class="seven columns push_one">
        <p style="display: inline-block; float: left"><?php echo CHtml::label('Name', null); ?>:
        <?php echo CHtml:: link($request->device->name, Yii::app()->createUrl('device/view', array('id' => $request->device->id))); ?>
        </p>
    </div>
</div>
