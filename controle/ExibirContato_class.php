<?php

	include_once("modelo/ContatoDAO_class.php");
	
	class ExibirContato{
	
		public function __construct(){
			
			$dao = new UsuarioDAO();
			$cont = $dao->buscar($_GET["id"]);
			include_once("visao/exibeContato.php");	
			
		}
	}

?>
