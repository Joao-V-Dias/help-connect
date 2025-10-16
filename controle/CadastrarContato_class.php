<?php
	include_once("modelo/UsuarioDAO_class.php");	
	class CadastrarContato{
		//CONTROLE
	
		public function __construct(){
			
			if(isset($_POST["enviar"])){
				//formulário enviar foi enviado
				
				$c = new Contato();
				$c->setNome($_POST["nome"]);
				$c->setEmail($_POST["email"]);
				$c->setTelefone($_POST["telefone"]);
				$c->setCidade($_POST["cidade"]);
				$c->setSenha($_POST["senha"]);
				$c->setFoto("qwe");
				
				$dao = new ContatoDAO();
				$dao->cadastrar($c);
				
				$status = "Cadastro do Usuario " . $c->getNome() . 
				" efetuado com sucesso";
				
				$lista = $dao->listar();
				
				include_once("visao/listaContato.php");
				
			} else{
			
				include_once("visao/formCadastroContato.php");	
			
			}
		}
	}
?>
