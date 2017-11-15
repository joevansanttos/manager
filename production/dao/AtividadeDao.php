<?php
	require_once "../factory/AtividadeFactory.php";
	require_once "../mailer/PHPMailerAutoload.php";
	require_once "../dao/UsuarioDao.php";

	class AtividadeDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function listaAtividades($usuario_id) {
			$atividades = array();
			if($usuario_id == 1){
				$resultado = mysqli_query($this->conexao->conecta(), "select u.* from atividades as u");
			}else{
				$resultado = mysqli_query($this->conexao->conecta(), "select u.* from atividades as u where delegado_id = $usuario_id");

			}			
			while($atividade_array = mysqli_fetch_assoc($resultado)) {
				$factory = new AtividadeFactory();
				$atividade_id = $atividade_array['id'];				
				$atividade = $factory->criaAtividade($atividade_array);
				$atividade->setId($atividade_id);
				array_push($atividades, $atividade);
			}
			return $atividades;
		}

		function insereAtividade(Atividade $atividade) {
			$query = "insert into atividades ( descricao, inicio, fim, prazo, setor, filial, resultados, importancia, objetivo, observacao, status_atividade_id, delegado_id, delegante_id) values ('{$atividade->getDescricao()}', '{$atividade->getInicio()}', '{$atividade->getFim()}', '{$atividade->getPrazo()}', '{$atividade->getSetor()}', '{$atividade->getFilial()}', '{$atividade->getResultados()}', '{$atividade->getImportancia()}', '{$atividade->getObjetivo()}', '{$atividade->getObservacao()}', '{$atividade->getStatusAtividade()->getId()}', '{$atividade->getDelegado()->getId()}', '{$atividade->getDelegante()->getId()}')";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

		function buscaAtividade($id) {
			$query = "select * from atividades where id = {$id}";
			$resultado = mysqli_query($this->conexao->conecta(), $query);
			$atividade_buscada = mysqli_fetch_assoc($resultado);
			$atividade_id = $atividade_buscada['id'];
			$factory = new AtividadeFactory();
			$atividade = $factory->criaAtividade($atividade_buscada);
			$atividade->setId($atividade_id);
			return $atividade;
		}

		function atualizaAtividade(Atividade $atividade) {
			date_default_timezone_set('America/Bahia');
			if($atividade->getStatusAtividade()->getId() == 5){
				$today = date("Y-m-d H:i:s");
				$query = "update atividades set  objetivo = '{$atividade->getObjetivo()}', observacao = '{$atividade->getObservacao()}',status_atividade_id = '{$atividade->getStatusAtividade()->getId()}', fim = '{$today}' where id = '{$atividade->getId()}'";

			}else{
				$query = "update atividades set  objetivo = '{$atividade->getObjetivo()}', observacao = '{$atividade->getObservacao()}',status_atividade_id = '{$atividade->getStatusAtividade()->getId()}' where id = '{$atividade->getId()}'";
			}
			

			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

		function remove(Atividade $atividade){
			$query = "delete from atividades where id = {$atividade->getId()}";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

		function enviaEmail($params){
			$usuarioDao = new UsuarioDao($this->conexao);
			$delegado_id = $params["delegado_id"];
			$delegado = $usuarioDao->buscaUsuario($delegado_id);
			$delegante_id = $params["delegante_id"];
			$delegante = $usuarioDao->buscaUsuario($delegante_id);
			$novoInicio = date("d-m-Y", strtotime($params['inicio']));
			$novoPrazo = date("d-m-Y", strtotime($params['prazo']));

			
			// Inicia a classe PHPMailer
			$mail = new PHPMailer(true);

			// Define os dados do servidor e tipo de conexão
			// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
			$mail->IsSMTP(); // Define que a mensagem será SMTP

			try {

			  $mail->SMTPDebug  = 1; 
			  $mail->SMTPAuth = true;     // Autenticação ativada
			  $mail->SMTPSecure = 'ssl';  // SSL REQUERIDO pelo GMail
			  $mail->Host = 'smtp.gmail.com'; // Endereço do servidor SMTP (Autenticação, utilize o host smtp.seudomínio.com.br)
			  $mail->Port = 465;
			  $mail->Username = 'manager.projek@gmail.com'; // Usuário do servidor SMTP (endereço de email)
			  $mail->Password = 'Projek@90'; // Senha do servidor SMTP (senha do email usado)

			  //Define o remetente
			  // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=    
			  $mail->SetFrom($delegado->getEmail(), $delegado->getNome()); //Seu e-mail
			  $mail->AddReplyTo($delegado->getEmail(), $delegado->getNome()); //Seu e-mail
			  $mail->Subject = "Projek - Nova Atividade adicionada";

			  //Define os destinatário(s)
			  //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
			  $mail->AddAddress($delegado->getEmail(), $delegado->getNome());

			  //Campos abaixo são opcionais 
			  //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
			  //$mail->AddCC('destinarario@dominio.com.br', 'Destinatario'); // Copia
			  //$mail->AddBCC('destinatario_oculto@dominio.com.br', 'Destinatario2`'); // Cópia Oculta
			  //$mail->AddAttachment('images/phpmailer.gif');      // Adicionar um anexo

			  $mensagem = 'Nova atividade adicionada na Projek. A descrição da atividade é ' . $params['descricao'] . ', com inicio em ' . $novoInicio . ' e o prazo de '. $novoPrazo . '. O objetivo da atividade é '. $params['objetivo'] . ' e os resultados esperados são ' . $params['resultados'];
			  $mail->msgHTML($mensagem);
			  $mail->CharSet = 'UTF-8';

			  $mail->send();
			
			}catch (phpmailerException $e) {
			  echo $e->errorMessage(); //Mensagem de erro costumizada do PHPMailer
			}
			

		}

		function listaAtividadesDelegadadas($usuario_id) {
			$atividades = array();
			if($usuario_id == 1){
				$resultado = mysqli_query($this->conexao->conecta(), "select u.* from atividades as u");
			}else{
				$resultado = mysqli_query($this->conexao->conecta(), "select u.* from atividades as u where delegante_id = $usuario_id");

			}			
			while($atividade_array = mysqli_fetch_assoc($resultado)) {
				$factory = new AtividadeFactory();
				$atividade_id = $atividade_array['id'];				
				$atividade = $factory->criaAtividade($atividade_array);
				$atividade->setId($atividade_id);
				array_push($atividades, $atividade);
			}
			return $atividades;
		}		
		

	}

?>