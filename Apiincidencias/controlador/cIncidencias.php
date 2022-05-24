<?php

class cIncidencias extends BaseControlador{
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
                //Ej: http://10.1.160.105/RepasoTema3/Apirepaso/index.php/producto/3  para cuando sea para usuario
                if(isset($uri[2])){
                    $producto = IncidenciasDAO::findById($uri[2]);
                }else{
                    //Filtros todo lo que va despues de la ? para filtrar por estado
                    if(count($filtro)>0){
                        
                        $producto= IncidenciasDAO::findEstado($filtro['estado']);
                    //Busca todos
                    //Ej: http://10.1.160.105/RepasoTema3/Apirepaso/index.php/producto
                    }else{
                        $producto = IncidenciasDAO::findAll();
                    }
                }
                $enviarJSON = json_encode($producto);

                $this->sendRespuesta(
                    $enviarJSON,
                    array( 'Content-Type: application/json', "HTTP/1.1 200 OK" )
                );
                break;
            case 'POST':
                //POSTMAN Body -> form-data
                //lo primero que tenga los parametros necesarios en el formulario, si no existe alguna ERROR
                if(!isset($_POST['aula']) || !isset($_POST['equipo']) || !isset($_POST['descripcion'])|| !isset($_POST['fecha'])|| !isset($_POST['idusuario'])){
                    
                    $this->sendRespuesta(
                        json_encode(array('Error'=>"No se han enviado todos los parametros")),
                        array('Content-Type: application/json', "HTTP/1.1 400 Error en el formato de la peticion")
                    );
                }else{
                    //Creamos el objeto producto con los datos pasados por post
                    $producto = new Incidencias(0,$_POST['aula'], $_POST['equipo'], $_POST['descripcion'],"",$_POST['fecha'],'',"",$_POST['idusuario']);
                    $todoBien = IncidenciasDAO::save($producto);
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
                $put = file_get_contents("php://input");
                $array = json_decode($put, true);
                if(!isset($array['solucion']) || !isset($array['fecha_solucion']) || !isset($array['id'])){
                    //$objeto->solucion,$objeto->fecha_solucion,$objeto->id
                    $this->sendRespuesta(
                        json_encode(array('Error'=>"No se han introducido por put todos los parametros")),
                        array('Content-Type: application/json', "HTTP/1.1 400 Error en el formato de la peticion")
                    );
                }else{
                    $usuario = new Incidencias($array['id'],$array['aula'], $array['equipo'], $array['descripcion'], $array['solucion'],$array['fecha'], $array['fecha_solucion'], $array['estado'],$array['idusuario']);

                    $objeto = IncidenciasDAO::update($usuario);
                    if(!$objeto){
                        $this->sendRespuesta(
                            json_encode(array('Error'=>"No existe el usuario")),
                            array('Content-Type: application/json', "HTTP/1.1 400 Error en el formato de la peticion")
                        );
                    }else{
                        $datos = json_encode($objeto);
                        $this->sendRespuesta($datos, array( 'Content-Type: application/json', "HTTP/1.1 200 OK" ));
                    }
                }
                break;
            case 'DELETE':
                # code...
                //lo primero que tenga el parametro id del uri
                if(isset($uri[2])){
                    $producto = IncidenciasDAO::delete($uri[2]);
                    if($producto->rowCount()>0){
                        $this->sendRespuesta(
                            json_encode("Hemos borrado el producto"),
                            array( 'Content-Type: application/json', "HTTP/1.1 200 OK" )
                        );
                    }
                }else{
                    $this->sendRespuesta(
                        json_encode(array('Error'=>"Hace falta insertar el id /producto({id}")),
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