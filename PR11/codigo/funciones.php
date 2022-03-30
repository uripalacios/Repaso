<?php
function recogeDatos(){
    $rutaFichero= "notas.csv";
    if(!$fp = fopen($rutaFichero,'r'))
    {
        echo "No se ha podido abrir el fichero";
        exit;
    }
 
    $textoLeido = fread($fp,filesize($rutaFichero));

    return $textoLeido;

    // 3º - Cerrar el fichero //
    fclose($fp);
}
function modificaFichero(){
    
    $newCont = array($_POST['nombre'],$_POST['nt1'],$_POST['nt2'],$_POST['nt3']);
    //escritura en fichero
    $rutafichero= "notas.xml";
    if(file_exists($rutafichero)){
        //Transforma el xml en un objeto de tipo simplexml
        $xml = simplexml_load_file($rutafichero);
        
    }else{
        exit;
    } 

    $dom = dom_import_simplexml($xml)->ownerDocument;

    $etiquetasNombre = $dom->getElementsByTagName("nombre");

    foreach ($etiquetasNombre as $NombreAlumno) {
       if($NombreAlumno->nodeValue == $newCont[0]){
            for ($i=1; $i <=3 ; $i++) { 
                $aux = $NombreAlumno;
                do
                    $aux = $aux->nextSibling;
                    
                while ($aux->nodeName != "notas".$i);   
                $aux->nodeValue = $newCont[$i];
            }
            
       }
    }


    $dom->save($rutafichero);
    
}

function compruebaBoton(){
    if(!empty($_POST['btn'])){
        if($_POST['btn']=="Editar"){
            header("Location: ./EditaXML.php?contador=".($_POST['contador']));
        }
        if($_POST['btn']=="Modificar"){
            modificaFichero();
            header("Location: ./LeeFicheroXML.php");
        }
    }
}
?>