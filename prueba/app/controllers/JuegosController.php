<?php
class JuegosController extends \Phalcon\Mvc\Controller
{
    public function indexAction()
    {

    }

    public function filtrarAction()
    {
    	if($_SERVER['REQUEST_METHOD'] == "POST"){
	    	$nombre = $_POST['nombre'];
			$connection = new Mongo ();
			$db = $connection-> selectDB ("bdjuegos");
			$coleccion = $db->juegos;
			$juegos = $coleccion->find(array("nombre"=>new MongoRegex("/$nombre/")));
			//$cursor = $coleccion->find(array("nombre"=>$nombre)); 
		    foreach ($cursor as $documento) {
			    echo $documento["nombre"];
			}
			$this->view->juegos = $juegos;
    	}else{
    		header('location:/prueba/juegos/');
    	}
    	
    }
}

?>