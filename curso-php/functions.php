<?php

function render_template(string $template, array $data = []){

    extract($data);
    require "templates/$template.php";

}

?>