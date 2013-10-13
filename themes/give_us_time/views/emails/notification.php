<?php

if (isset($params['status'])) {
    ?>
    <h3>Hi, <?php echo $data->initial . ". " . $data->lastname; ?></h3>
    <?php
    if ($params['status'] == 'rejected') {
        ?>
        <p>Unfortunately your provisional booking of <?php echo $params['property_name'] ?> has been rejected by the landlord.</p>
        <p>Please try booking a different holiday.</p>
        <?php
    } else if ($params['status'] == 'accepted') {
        ?>
        <p>Your provisional booking of <?php echo $params['property_name'] ?> has been accepted by the landlord.</p>
        <p>Enjoy your holiday!</p>        
        <?php
    }
    
    
}

?>