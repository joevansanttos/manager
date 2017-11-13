<?php
	require_once "../mailer/PHPMailerAutoload.php";
	require_once "../dao/UsuarioDao.php";

	class EmailDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
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
			  $mail->Username = 'joevansantos.projek@gmail.com'; // Usuário do servidor SMTP (endereço de email)
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
		

	}

?>