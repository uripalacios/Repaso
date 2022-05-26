<?php

class cJugador extends BaseControlador{
    public function generalJugador(){
        //Recoger la uri
        $uri = $this->getUri();
        $filtro = $this->getParametros();

        //Ver el metodo que pide
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                //Que pida todos

                //print_r($uri);
                //Existe en la uri un codigo? $uri[2]
                //Ej: http://10.1.160.105/RepasoTema3/apiFutbol/index.php/jugador/3  para cuando sea para usuario
                if(isset($uri[2])){
                    $jugador = JugadorDAO::findById($uri[2]);
                }else{
                    //Filtros todo lo que va despues de la ? para filtrar por estado
                    $filtros = "";
                    $cont=0;
                    $array=[];
                    if(count($filtro)>0){
                        foreach ($filtro as $key => $value) {
                            # code...
                            if($key =="nombre")
                                $filtros += $key." like%?%";
                            else if($key =="posicion")
                                $filtros += $key." =?";
                            else if($cont==0){
                                 $filtros += " AND ";
                             }
                             $cont++;
                             array_push($array,$value);
                        }
                        $jugador= JugadorDAO::findFiltros($filtros,$array);
                    //Busca todos
                    //Ej: http://10.1.160.105/RepasoTema3/apiFutbol/index.php/jugador
                    }else{
                        $jugador = JugadorDAO::findAll();
                    }
                }
                $enviarJSON = json_encode($jugador);

                $this->sendRespuesta(
                    $enviarJSON,
                    array( 'Content-Type: application/json', "HTTP/1.1 200 OK" )
                );
                break;
            case 'POST':
                //POSTMAN Body -> form-data
                //lo primero que tenga los parametros necesarios en el formulario, si no existe alguna ERROR
                if(!isset($_POST['nombreJugador'])|| !isset($_POST['posicion'])|| !isset($_POST['sueldo']) || !isset($_POST['codEquipo'])){
                    
                    $this->sendRespuesta(
                        json_encode(array('Error'=>"No se han enviado todos los parametros")),
                        array('Content-Type: application/json', "HTTP/1.1 400 Error en el formato de la peticion")
                    );
                }else{
                    //Creamos el objeto jugador con los datos pasados por post
                    $jugador = new Jugador(0,$_POST['nombreJugador'], $_POST['posicion'], $_POST['sueldo'],$_POST['codEquipo']);
                    $todoBien = JugadorDAO::save($jugador);
                    //Entra siempre que no haya un error en la BBDD, que no sea nulo
                    if($todoBien){
                        $datos = json_encode($todoBien);
                        $this->sendRespuesta($datos, array( 'Content-Type: application/json', "HTTP/1.1 200 OK" ));
                    }else{
                        $this->sendRespuesta(
                            json_encode(array('Error'=>"No se han enviado todos los parametros")),
                            array('Content-Type: application/json', "HTTP/1.1 400 Error en el formato de la peticion")
                        );
                    }
                }
                break;
            case 'PUT':
                # code...
                //POSTMAN Body -> raw formato JSON
                
                break;
            case 'DELETE':
                # code...
                //lo primero que tenga el parametro id del uri
                if(isset($uri[2])){
                    $jugador = JugadorDAO::delete($uri[2]);
                    if($jugador->rowCount()>0){
                        $this->sendRespuesta(
                            json_encode("Hemos borrado el jugador"),
                            array( 'Content-Type: application/json', "HTTP/1.1 200 OK" )
                        );
                    }
                }else{
                    $this->sendRespuesta(
                        json_encode(array('Error'=>"Hace falta insertar el id /jugador({id}")),
                        array('Content-Type: application/json', "HTTP/1.1 400 Error en el formato de la peticion")
                    );
                }
                break;
            default:
                # code...
                break;
        }
    }
    
}

?>