<?php
function base_url()
{
    return BASE_URL;
}
function encabezado($data="")
{
    $VistaH = "Views/Template/header.php";
    require_once($VistaH);
}
function pie($data="")
{
    $VistaP = "Views/Template/footer.php";
    require_once($VistaP);
}
/*function Limpiar($cadena)
{
    $String = trim($String);
    $String = stripslashes($String);
    $String = str_ireplace("<script>", "",$String);
    $String = str_ireplace("<script>", "",$String);
    $String = str_ireplace("<script src>", "",$String);
    $String = str_ireplace("</script type>", "", $String);
    $String = str_ireplace("SELECT * FROM ", "", $String);
    $String = str_ireplace("DELETE FROM", "", $String);
    $String = str_ireplace("INSERT INTO", "", $String);
    $String = str_ireplace("SELECT COUNT(*) FROM", "", $String);
    $String = str_ireplace("DROP TABLE", "", $String);
    $String = str_ireplace("OR '1' = '1", "", $String);
    $String = str_ireplace('OR "1" = "1"', "", $String);
    $String = str_ireplace('OR ´1" = "1"', "", $String);
    $String = str_ireplace("</script type>", "", $String);
    $String = str_ireplace("</script type>", "", $String);
    $String = str_ireplace("</script type>", "", $String);
}*/
?>