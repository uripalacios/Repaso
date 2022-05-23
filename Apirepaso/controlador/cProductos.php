<?php

class cProductos extends BaseControlador{
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
                //Ej: http://10.1.160.105/RepasoTema3/Apirepaso/index.php/producto/3
                if(isset($uri[2])){
                    $producto = ProductoDao::findById($uri[2]);
                }else{
                    //Filtros todo lo que va despues de la ?
                    if(count($filtro)>0){
                        
                    //Busca todos
                    //Ej: http://10.1.160.105/RepasoTema3/Apirepaso/index.php/producto
                    }else{
                        $producto = ProductoDAO::findAll();
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
                if(!isset($_POST['cod_producto']) || !isset($_POST['descripcion']) || !isset($_POST['precio'])|| !isset($_POST['stock'])){
                    $this->sendRespuesta(
                        json_encode(array('Error'=>"No se han enviado todos los parametros")),
                        array('Content-Type: application/json', "HTTP/1.1 400 Error en el formato de la peticion")
                    );
                }else{
                    //Creamos el objeto producto con los datos pasados por post
                    $producto = new Producto($_POST['cod_producto'], $_POST['descripcion'], $_POST['precio'],$_POST['stock']);
                    $todoBien = ProductoDAO::save($producto);
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
                if(!isset($array['codigo']) || !isset($array['descripcion']) || !isset($array['precio'])|| !isset($array['stock'])){
                    $this->sendRespuesta(
                        json_encode(array('Error'=>"No se han introducido por put todos los parametros")),
                        array('Content-Type: application/json', "HTTP/1.1 400 Error en el formato de la peticion")
                    );
                }else{
                    $usuario = new Producto($array['codigo'], $array['descripcion'], $array['precio'], $array['stock']);

                    $objeto = ProductoDAO::update($usuario);
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
                    $producto = ProductoDAO::delete($uri[2]);
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