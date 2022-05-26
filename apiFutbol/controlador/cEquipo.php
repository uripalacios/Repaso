<?php

class cEquipo extends BaseControlador{
    public function general(){
        //Recoger la uri
        $uri = $this->getUri();
        $filtro = $this->getParametros();

        //Ver el metodo que pide
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                //Que pida todos

                //print_r($uri);
                //Existe en la uri un codigo? $uri[2]
                //Ej: http://10.1.160.105/RepasoTema3/apiFutbol/index.php/equipo/3  para cuando sea para usuario
                if(isset($uri[2])){
                    $equipo = EquipoDAO::findById($uri[2]);
                }else if(isset($uri[3])){
                    $equipo = EquipoDAO::mostrarJugadorPorEquipo($uri[2]);
                }else{
                    //Filtros todo lo que va despues de la ? para filtrar por estado
                    if(count($filtro)>0){
                        
                        //$equipo= EquipoDAO::findEstado($filtro['estado']);
                    //Busca todos
                    //Ej: http://10.1.160.105/RepasoTema3/apiFutbol/index.php/equipo
                    }else{
                        $equipo = EquipoDAO::findAll();
                    }
                }
                $enviarJSON = json_encode($equipo);

                $this->sendRespuesta(
                    $enviarJSON,
                    array( 'Content-Type: application/json', "HTTP/1.1 200 OK" )
                );
                break;
            case 'POST':
                //POSTMAN Body -> form-data
                //lo primero que tenga los parametros necesarios en el formulario, si no existe alguna ERROR
                if(!isset($_POST['nombreEquipo'])|| !isset($_POST['localidad'])){
                    
                    $this->sendRespuesta(
                        json_encode(array('Error'=>"No se han enviado todos los parametros")),
                        array('Content-Type: application/json', "HTTP/1.1 400 Error en el formato de la peticion")
                    );
                }else{
                    //Creamos el objeto equipo con los datos pasados por post
                    $equipo = new Equipo(0,$_POST['nombreEquipo'], $_POST['localidad']);
                    $todoBien = EquipoDAO::save($equipo);
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
                    $equipo = EquipoDAO::delete($uri[2]);
                    if($equipo->rowCount()>0){
                        $this->sendRespuesta(
                            json_encode("Hemos borrado el equipo"),
                            array( 'Content-Type: application/json', "HTTP/1.1 200 OK" )
                        );
                    }
                }else{
                    $this->sendRespuesta(
                        json_encode(array('Error'=>"Hace falta insertar el id /equipo({id}")),
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