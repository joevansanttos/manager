<?php	
	require_once "cabecalho.php"; 
	require_once "../dao/MarketDao.php"; 

	$id = $_GET['id'];
  $marketDao = new MarketDao($conexao);
  $market = $marketDao->buscaMarket($id);
  $market_id = $market->getId();
  $leads = $marketDao->listaLeadsMarket($market_id);
  $suspects = $marketDao->listaSuspectsMarket($market_id);
  $prospects = $marketDao->listaProspectsMarket($market_id);
  $historicos = $marketDao->listaHistoricosMarket($market_id);
?>	

<?php require_once "css.php"; ?>

<h3>Perfil do Market</h3>
	
<?php require_once "body.php";	?>

  <div class="profile_img">
    <div id="crop-avatar">
      <!-- Current avatar -->
      <img class="img-responsive avatar-view" src="../images/user.png" alt="Avatar" title="Change the avatar">
    </div>
  </div>
  <h3><?=$market->getNome()?></h3>

  <ul class="list-unstyled user_data">
    <li><i class="fa fa-map-marker user-profile-icon"></i><?=$market->getEndereco()?>
    </li>

    <li>
      <i class="fa fa-phone user-profile-icon"></i> <?=$market->getTel()?>
    </li>

    <li class="m-top-xs">
      <i class="fa fa-external-link user-profile-icon"></i>
        <?=$market->getSite()?>
    </li>

    <li class="m-top-xs">
      <i class="fa fa-industry user-profile-icon"></i>
        <?=$market->getSegmento()?>
    </li>

    <li class="m-top-xs">
      <i class="fa fa-map user-profile-icon"></i>
        <?=$market->getEstado()?> 
    </li>
  </ul>
</div>

<!-- Teste -->
<div class="x_content" style="display: block;">
  <div class="container">
  <br />
  <!-- start accordion -->
  <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel">
      <a class="panel-heading collapsed" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseOne">
        <h4 class="panel-title">Histórico</h4>
      </a>
      <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
        <div class="panel-body">
        <?php
          foreach ($historicos as $historico) {
        ?>
            <table class="table table-bordered table-striped">
              <thead>
                <th class="col-md-1">Data</th>
                <th>Histórico</th>
                <th class="col-md-2" align="center">Ações</th>
              </thead>
              <tbody>
                <td><?=$historico->getData()?></td>
                <td><?=$historico->getDescricao()?></td>
                <td>
                  <a href="../tables/historico-altera.php?id=<?=$historico->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Altera Histórico" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                </td>
              </tbody>
            </table>
        <?php
           }
        ?>
        </div>
      </div>
    </div>
    <div class="panel">
      <a class="panel-heading collapsed" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
        <h4 class="panel-title">Leads</h4>
      </a>
      <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
        <div class="panel-body">
        <?php
        	foreach ($leads as $lead){
        ?>
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Email</th>
                  <th>Telefone</th>
                  <th>Cargo</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?=$lead->getNome()?></td>
                  <td><?=$lead->getEmail()?></td>
                  <td><?=$lead->getTel()?></td>
                  <td><?=$lead->getCargo()?></td>
                  <td align="center">                                                
                    <a href="../tables/lead-altera.php?id=<?=$lead->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Altera Lead" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                    <a  href="../remove/remove-lead.php?id=<?=$lead->getId()?>" data-toggle="tooltip" data-placement="top" title="Remover Lead"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
                  </td>
                </tr>
              </tbody>
            <?php
              }
            ?>
          </table>
        </div>
      </div>
    </div>
    <div class="panel">
      <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        <h4 class="panel-title">Suspects</h4>
      </a>
      <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
        <div class="panel-body">
        <?php
          foreach ($suspects as $suspect){
        ?>
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Contato</th>
                  <th>Data</th>
                  <th>Status</th>
                  <th>Hora</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?=$suspect->getNome()?></td>
                  <td><?=$suspect->getData()?></td>
                  <td><?=$suspect->getStatus()?></td>
                  <td><?=$suspect->getHora()?></td>
                  <td align="center">                                                
                    <a href="../tables/suspect-altera.php?id=<?=$suspect->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Alterar Lead" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                    <a  href="../remove/remove-suspect.php?id=<?=$suspect->getId()?>" data-toggle="tooltip" data-placement="top" title="Remover Suspect"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
                  </td>
                </tr>
              </tbody>
            <?php
              }
            ?>
          </table>
        </div>
      </div>
    </div>
    <div class="panel">
      <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        <h4 class="panel-title">Prospects</h4>
      </a>
      <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">
        <div class="panel-body">
          <?php
            foreach ($prospects as $prospect){
          ?>
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Valor</th>
                    <th>Recebimento</th>
                    <th>Fechamento</th>
                    <th>Ações</th>                                        
                  </tr>
                </thead>
                <tbody>
                  <tr align="center">
                    <td><?=$prospect->getValorEs()?></td>
                    <td><?=$prospect->getRecebimento()?></td>
                    <td><?=$prospect->getFechamento()?></td>                                          
                    <td>
                      <a href="../tables/prospect-altera.php?id=<?=$prospect->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Altera Prospect" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                      <a  href="../remove/remove-prospect.php?id=<?=$prospect->getId()?>" data-toggle="tooltip" data-placement="top" title="Remover Prospect"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>                   
                    </td>
                  </tr>
                </tbody>
              <?php
                }
              ?>
            </table>
        </div>
      </div>
    </div>
  </div>
  <!-- end of accordion -->



<?php	require_once "script.php"; ?>
<?php	require_once "rodape.php"; ?>