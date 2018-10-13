<?php

function load_classes($clase) {
    include '' . $clase . '.php';
}

spl_autoload_register('load_classes');

?>