<?php
function miAutoloadUno($claseDesconocida){
    $fichero = "clases/$claseDesconocida.php";
    if(file_exists($fichero)){
        require_once $fichero;
    }
}
function miAutoloadDos($claseDesconocida){
    $fichero = "class2/$claseDesconocida.php";
    if(file_exists($fichero)){
        require_once $fichero;
    }
}

spl_autoload_register("miAutoloadUno");
spl_autoload_register("miAutoloadDos");

?>