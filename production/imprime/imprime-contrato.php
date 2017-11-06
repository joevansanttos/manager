<?php	
	error_reporting(E_ALL ^ E_NOTICE);
	require_once "../includes/cabecalho.php"; 
	require_once "../dao/ContratoDao.php";
  $id = $_GET['id'];
  $contratoDao = new ContratoDao($conexao);
  $contrato = $contratoDao->buscaContrato($id);
  $numero = intval($contrato->getNumero());
  $number =str_pad($numero, 3, '0', STR_PAD_LEFT);
  $today = date("d.m.Y");
  $todayPieces = explode(".", $today);
  $departamentos = $contrato->getDepartamentos();
  $inicio = $contrato->getInicio();
  $pieces = explode(".", $inicio);
  $fim = $contrato->getFim();
  $pieces2 = explode(".", $fim);
  $plano =[];
  $end[0] = intval($pieces2[1]);
  $end[1] = intval($pieces2[2][2].$pieces2[2][3]);
  $begin[0] = intval($pieces[1]);
  $begin[1] = intval($pieces[2][2].$pieces[2][3]);
  $socios = $contrato->getSocios();
  $market = $contrato->getMarket();
?>

<h3>Imprimir Contrato</h3>

<?php require "../includes/body.php";	?>

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
   foreach ($socios as $key => $socio) {
  ?>
   <p><?=$socio->getNome()?>, brasileiro, empresário, casado CPF nº <?=$socio->getCpf()?>,  residente em <?=$socio->getResidencia()?>.</p>
  <?php   # code...
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
          foreach ($departamentos as  $d) {
        ?>
        <tr>
           <th><p><?=$d->getDescricao()?></p></th>
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
   <br><p><?=$socio[0]['nome']?> </p> 
   <br><p><?=$market->getRazao()?></p> 
   <br><br>
   <br><p>Testemunhas</p> 
   <br>
   <br><p>a)</p> .................................. 
   <br>
   <br><p>b)</p> ..................................
                         </span>
</div>

<?php	
	require_once "../includes/script.php";
	require_once "../includes/rodape.php"; 
?>