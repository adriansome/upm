<?php
if (isset($header)) {
    echo $header . "\n\n";
}

echo $message . "\n\n";

if (isset($footer)) {
    echo $footer;
}
?>
