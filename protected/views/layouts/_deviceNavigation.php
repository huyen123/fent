
<div class="navbar" gumby-fixed="top" id="nav1">
  <!-- Toggle for mobile navigation, targeting the <ul> -->
  <a class="toggle" gumby-trigger="#nav1 > .row > ul" href="#"><i class="icon-menu"></i></a>
  
  <ul class="row">
    <li><?php echo CHtml::link('Home', '#'); ?></li>
    <li><?php echo CHtml::link('Introduction', '#'); ?></li>
    <li><?php echo CHtml::link('Support', '#' ); ?></li>
    <li>
      <?php echo CHtml::link('Devices', 'index.php?r=device'); ?>
      <div class="dropdown">
        <ul>
          <li><?php echo CHtml::link('Mac', Yii::app()->createUrl('/category/view', array('id' => 1))); ?></li>
          <li><?php echo CHtml::link('Dell', Yii::app()->createUrl('/category/view', array('id' => 2))); ?></li>
          <li><?php echo CHtml::link('Ipad', Yii::app()->createUrl('/category/view', array('id' => 3))); ?></li>
          <li><?php echo CHtml::link('Other Devices', '#' ); ?></li>
        </ul>
      </div>
    </li>
    <li><?php if (Yii::app()->user->isAdmin){
        echo CHtml::link('User', '#' ) ; 
       } ?>
    </li>
    <li><?php if (Yii::app()->user->isAdmin){ ?>
        <?php echo CHtml::link('Order', '#' ); ?>
         <div class="dropdown">
          <ul>
            <li><?php echo CHtml::link('Expired', '#' ); ?></li>
            <li><?php echo CHtml::link('Unexpired', '#' ); ?></li>
            <li><?php echo CHtml::link('Request', '#' ); ?></li>
            <li><?php echo CHtml::link('History', '#' );  ?></li>
          </ul>
        </div>
            
    
    <?php } ?>
        
    </li>
    <li>
	<?php echo CHtml::link(Yii::app()->user->username, '#'); ?>
    </li>
    <li><?php echo CHtml::link('Logout', array('user/signout')); ?></li>
    <li class='field'>
        <?php echo CHtml::textField(null, null, array('class'=>'search input','placeholder'=>'Search')); ?>
    </li>
        
  </ul>
  
</div>