<div class="row">
    <?php
        if ($devices != null) {
            echo '<h2>Devices</h2>';
            foreach ($devices as $device) {
                echo $device->name;
                echo '<br />';
            }
        }
        
        if ($profiles != null) {
            echo '<h2>Profiles</h2>';
            foreach ($profiles as $profile) {
                echo $profile->email;
                echo '<br />';
            }
        }
    ?>
</div>