<?php
	include_once("modelo/UsuarioDAO_class.php");	
	class CadastrarUsuario{
		//CONTROLE
	
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
				
				$status = "Cadastro do Usuario " . $c->getNome() . 
				" efetuado com sucesso";
				
				
				header('Location: /');
				exit;
				
			} else{
			
				// include_once("visao/formCadastroContato.php");	
			
			}
		}
	}
?>
