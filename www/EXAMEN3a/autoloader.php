<?php
function miAutoloadUno($claseDesconocida){
    $fichero = __DIR__ .  "/clases/$claseDesconocida.php";
    if(file_exists($fichero)){
        require_once $fichero;
    }
}

spl_autoload_register("miAutoloadUno");
?>