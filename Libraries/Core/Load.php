<?php
$controllerFile = "Controller/" . $controller . ".php";
if (file_exists($controllerFile)) {
    require_once($controllerFile);
    $controller = new $controller();
    if (method_exists($controller, $methop)) {
        $controller->{$methop}($params);
    } else {
        require_once("Controller/Error.php");
    }
} else {
    require_once("Controller/Error.php");
}

?>