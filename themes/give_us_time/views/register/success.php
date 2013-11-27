<div class="success-message">
<?php
if ($type == 'user') {
?>
<p><strong>Thank you for registering with Give Us Time</strong></p>
<p>Verifying your details may take up to 48 hours. Once verified, we'll notify you by email and send you a link to the Give Us Time holiday search page.</p>
<a href="/" class="back">Return to homepage</a>

<?php
} else if ($type == 'landlord') {
?>
<p>Thank you for registering with Give Us Time.  An email will be sent to your inbox where you can activate your account and kindly add your property details.</p>
<a href="/" class="back">Return to homepage</a>
<?php
}
?>
</div>