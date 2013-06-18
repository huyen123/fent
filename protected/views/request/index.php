<div class="row">
    <h2>All requests</h2>
</div>
<section class="sixteen colgrid">
    <div class="row">
        <div class="two columns">
            User
        </div>
        <div class="two columns">
            Device
        </div>
        <div class="three columns">
            Reason
        </div>
        <div class="two columns">
            Request start time
        </div>
        <div class="two columns">
            Request end time
        </div>
        <div class="two columns">
            Start time borrow
        </div>
        <div class="two columns">
            End time borrow
        </div>
        <div class="one columns">
            Status
        </div>
        <HR/>
    </div>
    
    <?php
        $timestamp = time();
        foreach ($requests as $request) {
            $this->renderPartial('_view', array('request' => $request, 'timestamp' => $timestamp));
        }
    ?>
</section>
<div class="row">
    <?php $this->widget('CLinkPager', array(
        'pages' => $pages,
    )); ?>
</div>