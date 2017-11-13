<?php	
	require_once "cabecalho.php"; 
?>	


<?php require_once "css.php"; ?>

<h3>Inbox</h3>

<?php require_once "body.php";	?>

<div class="col-sm-3 mail_list_column">
  <button id="compose" class="btn btn-sm btn-success btn-block" type="button">COMPOSE</button>
  <?php
    foreach ($mensagens as $m2){
  ?>

    <a href="#" data-toggle="collapse" data-target="<?='#' . $m2->getId()?>">
      <div class="mail_list">
        <div class="left">
          <i class="fa fa-circle"></i> <i class="fa fa-edit"></i>
        </div>
        <div class="right">
          <h3><?=$m2->getEmissor()->getNome()?> <small><?=$m2->getData()?></small></h3>
          <p><?=$m2->getTitulo()?></p>
        </div>
      </div>
    </a>

  <?php
    }
  ?>
</div>
<!-- /MAIL LIST -->

<!-- CONTENT MAIL -->
<div class="col-sm-9 mail_view">
  <?php
    foreach ($mensagens as $n) {
  ?>

    <div id="<?=$n->getId()?>" class="inbox-body collapse">
      <div class="mail_heading row">
        <div class="col-md-8">
          <div class="btn-group">
            <button class="btn btn-sm btn-primary" type="button"><i class="fa fa-reply"></i> Reply</button>
            <button class="btn btn-sm btn-default" type="button"  data-placement="top" data-toggle="tooltip" data-original-title="Forward"><i class="fa fa-share"></i></button>
            <button class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Print"><i class="fa fa-print"></i></button>
            <button class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Trash"><i class="fa fa-trash-o"></i></button>
          </div>
        </div>
        <div class="col-md-4 text-right">
          <p class="date"> <?=$n->getData()?></p>
        </div>
        <div class="col-md-12">
          <h4><?=$n->getTitulo()?></h4>
        </div>
      </div>
      <div class="sender-info">
        <div class="row">
          <div class="col-md-12">
            <strong><?=$n->getEmissor()->getNome()?></strong>
            <span>(<?=$n->getEmissor()->getEmail()?>)</span> to
            <strong>me</strong>
            <a class="sender-dropdown"><i class="fa fa-chevron-down"></i></a>
          </div>
        </div>
      </div>
      <div class="view-mail">
        <p><?=$n->getMensagem()?></p>
      </div>
    </div>

  <?php
    }
  ?>
  

</div>
<!-- /CONTENT MAIL -->

			
<?php	require_once "script.php"; ?>


<?php	require_once "rodape.php"; ?>