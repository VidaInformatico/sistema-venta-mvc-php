<?php
spl_autoload_register(function ($class) {
    if (file_exists("Libraries/" . 'Core/' . $class . '.php')) {
        require_once("Libraries/" . 'Core/' . $class . '.php');
    }
});
?>