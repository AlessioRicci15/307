<?php
    header("Content-type: text/css");
    /* Array all css */
    $css = array(
        'footer.css',
        'header.css',
        'schriftarten.css',
        'body.css'
    );
    $css_content = '';
    /* Put together to one CSS */
    foreach ($css as $css_file) {
        $css_content .= file_get_contents($css_file);
    }
    /* Echo and then by head got read all files */
    echo $css_content;
?>