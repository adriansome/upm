<?php

if ($this->success) {
    echo "<p class='success'>Your message has been sent.</p>";
}
if (!empty($this->errors)) {
    echo "<p class='validation error'>An error occurred while trying to send the form.</p>";
}
?>
<div class="key">
    <p>Fields marked '<span class="required">(required)</span>' are mandatory.</p>
</div>

<form action="#" method="post" class="standard-form" id="contact-form">
    <div class="form-row">
        <label for="contact-name">Name <span class="required">(required)</span></label>
        <input name="name" id="contact-name" value="<?php if (isset($_POST['name'])) { echo  htmlentities($_POST['name']); } ?>" type="text" />
        <?php
        if (isset($errors['name'])):
        ?>
        <p class="validation error"><?php echo $errors['name'] ?></p>
        <?php
        endif;
        ?>
    </div>
    <div class="form-row">
        <label for="contact-email">E-mail <span class="required">(required)</span></label>
        <input name="email" value="<?php if (isset($_POST['email'])) { echo  htmlentities($_POST['email']); } ?>"  id="contact-email" type="text" />
        <?php
        if (isset($errors['email'])):
        ?>
        <p class="validation error"><?php echo $errors['email'] ?></p>
        <?php
        endif;
        ?>
    </div>
    <div class="form-row">
        <label for="contact-message">Message <span class="required">(required)</span></label>
        <textarea name="message" id="contact-message" cols="20" rows="6"><?php if (isset($_POST['message'])) { 
            echo htmlentities($_POST['message']);
        } ?></textarea>
        <?php
        if (isset($errors['message'])):
        ?>
        <p class="validation error"><?php echo $errors['message'] ?></p>
        <?php
        endif;
        ?>
    </div>
    <div class="form-row button-row">
        <input name="contact-send" type="submit" value="Send" />
    </div>
</form>