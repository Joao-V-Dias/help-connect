<?php
    include_once("modelo/UsuarioDAO_class.php");
    class BuscarUsuario{
        public function __construct(){
            $dao = new UsuarioDAO();
			$cont = $dao->buscar($_GET["id"]);
        }
    }    
?>