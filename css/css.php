<?php
header("Content-type: text/css");
$css = array(
    'footer.css',
    'header.css',
    'schriftarten.css',
    'body.css'
);
$css_content = '';
foreach ($css as $css_file) {
    $css_content .= file_get_contents($css_file);
}
echo $css_content;
?>