<?php
    header("Content-type: text/css");
    /* Get all css in Array */
    $css = array(
        'footer.css',
        'header.css',
        'table.css'
    );
    $css_content = '';
    /* Make all array in one file */
    foreach ($css as $css_file) {
        $css_content .= file_get_contents($css_file);
    }
    /* Echo and get read by include */
    echo $css_content;
?>