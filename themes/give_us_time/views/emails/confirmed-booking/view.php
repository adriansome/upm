<p>Dear <?php echo $params['recipient_name'] ?>,</p>

<?php if (isset($header)) :?>
    <p  styles="margin:20px 0 20px 0;"><?php echo nl2br($header) ?></p>
<?php endif; ?>

<p>The holiday is from <?php echo $params['holiday_start'] ?> to <?php echo $params['holiday_end'] ?>.</p>
<p>The landlord's email address is: <?php echo $params['landlord_email']; ?></p>

<?php if (isset($footer)) :?>
    <p styles="margin:20px 0 20px 0;"><?php echo nl2br($footer) ?></p>
<?php endif; ?>
