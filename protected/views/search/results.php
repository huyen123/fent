<div class="row">
    <?php
        $devices_count = count($devices_found);
        $profiles_count = count($profiles_found);
        if ($devices_count + $profiles_count == 0) {
            echo '<h2>Sorry, No results found.<h2>';
        }
        if ($devices_count) {
            echo "<h2>Devices ({$devices_count})</h2>";
            foreach ($devices_found as $df) {
                echo '</br>';
                $device = $df[0];
                $attr = $df[1];
                echo $device->createViewLink($device->{$attr});
            }
        }
        
        if ($profiles_count) {
            echo "<h2>Profiles ({$profiles_count})</h2>";
            foreach ($profiles_found as $pf) {
                echo '</br>';
                $profile = $pf[0];
                $attr = $pf[1];
                echo $profile->createViewLink($profile->{$attr});
            }
        }
    ?>
</div>