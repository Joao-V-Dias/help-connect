<?php
	include_once("modelo/UsuarioDAO_class.php");	
	class CadastrarUsuario{
		public function __construct(){
			
			if(isset($_POST["enviar"])){
				
				$c = new Usuario();
				$c->setNome($_POST["nome"]);
				$c->setEmail($_POST["email"]);
				$c->setTelefone($_POST["telefone"]);
				$c->setCidade($_POST["cidade"]);
				$c->setSenha($_POST["senha"]);
				$c->setFoto("qwe");
				
				$dao = new UsuarioDAO();
				$dao->cadastrar($c);
				
				header('Location: /help-connect/?url=');
				exit;
				
			}
		}
	}
?>
