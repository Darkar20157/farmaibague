<?php
 
class Controller{
    public function routePage($ruta){
        //Requerimos la ruta que enviamos de index y la decodificamos para que nos redireccione
        require_once ''.base64_decode($ruta).'';

    }
}

?>