<?php
require "./funciones.php";
//lectura del fichero csv
$contenido = recogeDatos();

$porAlumno = explode("\n",$contenido);

//apertura del DOM para XML
$XML = new DOMDocument("1.0","utf-8");
$XML->formatOutput = true;

//notas
    //Elemento
    $ElementoRaiz = $XML->createElement("notas");
    //añadimos la raiz
    $raiz = $XML->appendChild($ElementoRaiz);

foreach ($porAlumno as $value) {
    $separados = explode(";",$value);
    //creado etiqueta alumno
    $alumno = $XML->createElement("alumno");
    //añadido
    $ElementoRaiz->appendChild($alumno);
    foreach ($separados as $key=>$value) {
        //creado etiqueta nombre, notas1, notas2 o notas3
        switch ($key) {
            case 0:
                # code...
                $nombre = $XML->createElement("nombre");
                break;
            case 1:
                # code...
                $nombre = $XML->createElement("notas1");
                break;
            case 2:
                # code...
                $nombre = $XML->createElement("notas2");
                break;
            case 3:
                # code...
                $nombre = $XML->createElement("notas3");
                break;
            default:
                # code...
                break;
        }
         //creo texto
        $texto = $XML->createTextNode($value);
        $nombre->appendChild($texto);
        $alumno->appendChild($nombre);
    }
}
$XML->save("./notas.xml");



?>