<h3>Dear <?php echo $params['recipient_name'] ?>,</h3>

<?php if (isset($header)) :?>
    <p><?php echo $header ?></p>
<?php endif; ?>

<p>The holiday is from <?php echo $params['holiday_start'] ?> to <?php echo $params['holiday_end'] ?>.
The email for the landlord of the property is <?php echo $params['landlord_email']; ?></p>

<?php if (isset($footer)) :?>
    <p><?php echo $footer ?></p>
<?php endif; ?>
