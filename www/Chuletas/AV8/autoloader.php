<?php
function miAutoloadUno($claseDesconocida){
    $fichero = "clases/$claseDesconocida.php";
    if(file_exists($fichero)){
        require_once $fichero;
    }
}

spl_autoload_register("miAutoloadUno");