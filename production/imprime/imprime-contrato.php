<?php	
	error_reporting(E_ALL ^ E_NOTICE);
	require_once "../dao/ContratoDao.php";
  require_once "../dao/DepartamentoContratoDao.php";
  require_once "../class/Conexao.php";
  $conexao = new Conexao();   
  $id = $_GET['id'];
  $contratoDao = new ContratoDao($conexao);
  $contrato = $contratoDao->buscaContrato($id);
  $socios = $contratoDao->listaSocios($id);
  $departamentoContratoDao = new DepartamentoContratoDao($conexao);
  $departamentosContratos = $departamentoContratoDao->listaDepartamentosContratos($contrato);
  $market = $contrato->getMarket();

  $numero = intval($contrato->getNumero());
  $number =str_pad($numero, 3, '0', STR_PAD_LEFT);
  $today = date("d.m.Y");
  $todayPieces = explode(".", $today);
  $inicio = $contrato->getInicio();
  $pieces = explode("-", $inicio);
  $fim = $contrato->getFim();
  $pieces2 = explode("-", $fim);
  $plano =[];
  $begin[0] = intval($pieces[1]);
  $begin[1] = intval($pieces[0][2].$pieces[0][3]);
  $end[0] = intval($pieces2[1]);
  $end[1] = intval($pieces2[0][2].$pieces2[0][3]);
    while($begin[0] != $end[0] || $begin[1] != $end[1]){
    if($begin[0]== 12){
      $begin0 = (string)$begin[0];
      $begin1 = (string)$begin[1];
      $mes = 'Dezembro'.'/'.$begin1;
      array_push($plano, $mes);
      $begin[0]=1;
      $begin[1] =  $begin[1] + 1;
    }else{
      $begin0 = (string)$begin[0];
      $begin1 = (string)$begin[1];
      switch ($begin0) {
        case '1':
          $begin0 = 'Janeiro';
          break;
        case '2':
          $begin0 = 'Fevereiro';
          break;
        case '3':
          $begin0 = 'Março';
          break;
        case '4':
          $begin0 = 'Abril';
          break;
        case '5':
          $begin0 = 'Maio';
          break;
        case '6':
          $begin0 = 'Junho';
          break;
        case '7':
          $begin0 = 'Julho';
          break;
        case '8':
          $begin0 = 'Agosto';
          break;
        case '9':
          $begin0 = 'Setembro';
          break;      
        case '10':
          $begin0 = 'Outubro';
          break;
        case '11':
          $begin0 = 'Novembro';
          break;    
        
        default:
          # code...
          break;
      }
      $mes = $begin0.'/'.$begin1; 
      array_push($plano, $mes);
      $begin[0] = $begin[0] + 1;
    }
  }

?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <!-- Bootstrap -->
  <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="../../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="../../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="../../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="../../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
  <style type="text/css">
    #conteudo  p {
       text-align: justify;
       font-size: 11pt;
       font-family: Calibri;
       display: inline;
       
    }

    #conteudo {
        text-align: justify;
        text-justify: inter-word;
    }

    #conteudo  h1{
        font-size: 16pt;
       font-family: Calibri;
    }

    #conteudo  h2{
        font-size: 18pt;
       font-family: Calibri;
    }
    
    #conteudo {
      background-color: white;
      padding: 50px;
      margin: 10px;
    }

    .center{
      font-size: 100pt;
      text-align: center;
    }
    @media print {
  #button {
    display: none;
  }
}
  </style>
</head>
<body>

  <div id="conteudo">
    <button id="button" onclick="window.print()" class="btn btn-default">Baixar</button>    
    <span class="section"><h1><center><strong>CONTRATO DE PRESTAÇÃO DE SERVIÇOS</strong></center></h1>                
    <br>
          <center><h2><strong><?=$number.'.2017'?></strong></h2> </center>
    <br>
    <p>Por este instrumento particular, as Partes adiante identificadas e qualificadas, a saber:</p><br><br> 

    <p><strong>CONTRATADA:</strong> PROJEK CONSULTORIA , inscrita no Cadastro Nacional de Pessoas Jurídicas sob o nº 23.913.067/0001-12, com sede RUA ALCEU AMOROSO LIMA Nº786, SALA 312, EDF. TANCREDO NEVES TRADE CENTER,  SALVADOR – BA. Tel: 71 3039-9780, neste ato representada pelo seu administrador, Sr. Fábio Martins da Silva, RG: 4978785-34, residente na Rua Salgueiro, 455, Apto. 2101, Condomínio ATMOS – Greenville, Torre Átria, Patamares, Salvador – Ba.</p><br><br>

    <p><strong>CONTRATANTE:</strong> <?=$market->getRazao()?> , Nome Fantasia <?=$market->getNome()?>, pessoa jurídica de direito privado, inscrita no Cadastro Nacional de Pessoas Jurídicas sob nº CNPJ Nº <?=$market->getCnpj()?>, com sede na <?=$contrato->getSede()?>,neste ato representada pelo seu administrador,</p>

    <?php
     foreach ($socios as  $socio) {
    ?>
     <p><?=$socio->getNome()?>, brasileiro, empresário, casado CPF nº <?=$socio->getCpf()?>,  residente em <?=$socio->getResidencia()?>.</p>
    <?php 
     }
    ?>
    
    <p>Considerando que a Contratada está disposta a prestar os serviços a seguir enumerados e definidos à Contratante, e que esta está disposta a remunerar tais serviços de acordo com as condições também a seguir estipuladas, </p><br><br>  


    <center><p><strong>RESOLVEM</strong></p></center><br>
    
    <p><strong>Cláusula I – Do objeto</strong><br> 
      A <strong>Contratada</strong> se compromete a aplicar a Plataforma de Treinamento EAD, baseado em um sistema de gestão de aprendizagem, desenvolvido a partir de uma metodologia pedagógica para promover o ensino online de forma eficiente e bem estruturada.<br>
      §1 – O produto da Plataforma EAD está descrito abaixo:<br>
     <strong>Cursos online personalizados</strong> – Nos cursos online estão disponíveis um ambiente de sala de aula virtual personalizado, para o colaborador aprender e aperfeiçoar conhecimentos de forma simples e lúdica através de slides sincronizados com explicações de profissionais qualificados.<br>
     <strong>Exercícios de fixação:</strong> Para uma aprendizagem mais eficiente o aluno poderá realizar, ao longo das aulas exercícios para uma melhor memorização do conteúdo. <br>

     <strong>Avalições com diferentes tipos de questões –</strong> Após a conclusão de cada curso o colaborador poderá testar seus conhecimentos a fim de avaliar se o aprendizado foi realmente eficiente.<br>
     <strong>Certificação automatizada – </strong> Após a conclusão dos cursos e aprovação com média suficiente na avaliação, o colaborador sairá certificado, comprovando assim o conhecimento obtido.</p><br>

      <br>
      <center><p><strong>AULAS POR DEPARTAMENTO</strong></p></center><br>
      <table class="table table-bordered">
           <?php
            foreach ($departamentosContratos as  $d) {
          ?>
          <tr>
             <th><p><?=$d->getDepartamento()->getDescricao()?></p></th>
             <td><p>40 h</p></td> 
          </tr>
               
                  
              <?php
                }
               ?>
          
      </table>
      
      </br>
      </br>
      </br>

      <p>§2 – As partes dão de acordo no cronograma de trabalho abaixo que irá nortear as atividades de consultoria.</p><br>  
      
      <center><br><strong><p>PLANO DE TRABALHO –   2017 / 2018</p></strong></center>
      <br>
      <table class="table table-bordered">
          <?php
             foreach ($plano as  $value) {
           ?>
              <tr>
                  <th><p><?=$value?></p></th>
                  <td><p>40 h</p></td>
              </tr>
             
           <?php
             }
          ?> 
      </table>
      

     <br><p><strong>Cláusula II - Do prazo</strong><br> 
     Os serviços a que se refere a cláusula antecedente serão realizados e postos à disposição da Contratante a partir de 1 de Julho de 2017 a 1 de Julho de 2018.</p><br><br>

     <p><strong>Cláusula III - Da remuneração</strong><br> 
     A Contratante pagará por tais serviços o valor de 2,0 (dois) salários mínimos por contra a apresentação e a aceitação do relatório final, conforme estabelecido no cronograma abaixo.
     §1 O pagamento dos serviços será feito em parcelas mensais até o dia 1 (um) de cada mês conforme o cronograma de desembolsos e orçamento apresentado no cronograma abaixo.
     §2 O primeiro pagamento deverá ser feito no ato da assinatura do contrato.</p><br><br>

     <p><strong>Cláusula IV - Das obrigações da CONTRATADA</strong><br> 
     A CONTRATADA se compromete a utilizar qualquer informação e/ou documentos obtidos da CONTRATANTE, ou proporcionados por ela para fins do presente Contrato, exclusivamente para as atividades aqui estipuladas.<br> 
     § 1 Este Contrato não poderá ser cedido, no todo ou em parte, ressalvada a concordância expressa, escrita, de ambas as partes. </p><br><br>

     <p><strong>Cláusula V - Das obrigações da CONTRATANTE</strong><br> 
     A contratante se compromete a colocar à disposição da CONTRATADA (informações / documentos / meios / recursos / pessoas etc.) necessários à realização dos serviços aqui estipulados.</p><br><br> 

     <p><strong>Cláusula VI - Da Liberação dos pagamentos</strong><br> 
     Todos os pagamentos previstos neste instrumento serão liberados e realizados após aprovação formal pela Contratante , no que diz respeito à qualidade do trabalho apresentada pela Contratada através da entrega das etapas cumpridas no objeto desse contrato.</p><br><br> 

     <p><strong>Cláusula VII - Das alterações</strong><br> 
     Qualquer modificação que afete os termos, condições ou especificações do presente Contrato deverá ser objeto de alteração por escrito com anuência de ambas as partes.</p><br><br> 

     <p> <strong>Cláusula VIII – Rescisão</strong><br>
     Para a rescisão do contrato por qualquer uma das partes fica estabelecido que a outra parte deverá informar com 30 dias de antecedência.</p><br><br>

     <p><strong>Cláusula XIX - Do foro</strong><br> 
     O foro deste contrato é o da Comarca Salvador, Estado de Bahia com preferência sobre qualquer outro. 
     E, por estarem assim justas e contratadas, as partes assinam o presente instrumento em 2 (duas) vias de igual forma e teor, para um só efeito.</p><br><br> 
     <br>
     <p>Salvador, <?=$today?></p>
     <br><br>
     ____________________ 
     <br><p>Contratada</p> 
     <br><p>FÁBIO MARTINS DA SILVA</p>
     <br><p>PROJEK CONSULTORIA</p>
     <br><br>
     ___________________ 
     <br><p>Contratante</p>
     <?php
        foreach ($socios as $socio){ 
     ?>
     <br><p><?=$socio->getNome()?> </p> 
     <?php
      }
     ?>
     <br><p><?=$market->getRazao()?></p> 
     <br><br>
     <br><p>Testemunhas</p> 
     <br>
     <br><p>a)</p> .................................. 
     <br>
     <br><p>b)</p> ..................................
                           </span>
  </div>
  <!-- jQuery -->
  <script src="../../vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>