<?php
	include_once("modelo/UsuarioDAO_class.php");
	
	class ListarContato{
	
		public function __construct(){
			$dao = new ContatoDAO();
			$lista = $dao->listar();
			
			include_once("visao/listaContato.php");		
		}
	}
?>


