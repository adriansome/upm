<?php
if (isset($params['status'])) {
    ?>
    <h3>Dear <?php echo $data->initial . ". " . $data->lastname; ?></h3>
    <?php
    if ($params['status'] == 'rejected') {
        ?>
        <p>Thank you for your e-mail.  Unfortunately the property is now not 
        available on the dates you have requested.  I would suggest that you 
        request another week or another resort.</p>
        <p>Yours sincerely,</p>
        <p><?php echo $params['landlord_name'] ?></p>
        <?php
    } else if ($params['status'] == 'accepted') {
        ?>
        <p>Thank you for your e-mail.  We would be delighted to welcome you to 
        our property from <?php echo $params['holiday_start'] ?> to 
        <?php echo $params['holiday_end'] ?> Please take this e-mail as confirmation.  
        We would be grateful if you would contact <?php echo $params['landlord_email']; ?>
        via e-mail so we can provide you with the full address of the property, 
        give you more details about your holiday and take your contact details.</p>
        <p>Yours sincerely,</p>
        <p><?php echo $params['landlord_name']; ?></p>     
        <?php
    }
    
    
}

?>