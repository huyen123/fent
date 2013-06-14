
<div class="row navbar" id="nav1">
  <!-- Toggle for mobile navigation, targeting the <ul> -->
  <a class="toggle" gumby-trigger="#nav1 > .row > ul" href="#"><i class="icon-menu"></i></a>
  
  <ul class="sixteen columns">
    <li><?php echo CHtml::link('Home', '#'); ?></li>
    <li><?php echo CHtml::link('Introduction', '#'); ?></li>
    <li><?php echo CHtml::link('Support', '#' ); ?></li>
    <li>
      <?php echo CHtml::link('Devices', '#' ); ?>
      <div class="dropdown">
        <ul>
          <li><?php echo CHtml::link('Mac', '#' ); ?></li>
          <li><?php echo CHtml::link('Dell', '#' ); ?></li>
          <li><?php echo CHtml::link('Ipad', '#' ); ?></li>
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