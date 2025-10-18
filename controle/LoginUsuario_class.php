<?php
	include_once("modelo/UsuarioDAO_class.php");	
	class CadastrarUsuario{
		//CONTROLE
	
		public function __construct(){
			
			if(isset($_POST["enviar"])){
				
				$c = new Usuario();
				$c->setEmail($_POST["email"]);
				$c->setSenha($_POST["senha"]);
				
				$dao = new UsuarioDAO();
				$dao->login($c);

				header('Location: /help-connect/?url=');
				exit;
				
			} else{
			
				// include_once("visao/formCadastroContato.php");	
			
			}
		}
	}
?>