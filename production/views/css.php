</head>
<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <!-- Sidebar-->      
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          
          <div class="navbar nav_title" style="border: 0;">
            <a href="dashboard.php" class="site_title"><i class="fa fa-rocket"></i><span> Projek Manager!</span></a>
          </div>
          <div class="clearfix"></div>
          <div class="profile clearfix">
            <div class="profile_pic">
              <?php
                if($usuario->getImage() != null){
                  if (file_exists('../' . $usuario->getImage()) !== false) {

              ?>
                    <img class="img-responsive img-circle profile_img" src="<?= '../' . $usuario->getImage()?>">
              <?php
                  }else{

              ?>
                    <img class="img-responsive img-circle profile_img" src="../images/user.png">
              <?php
                  } 
                }else{
              ?>
                <img class="img-responsive img-circle profile_img" src="../images/user.png">
              <?php
                }
                
              ?>
              
              
            </div>
            <div class="profile_info">
              <span>Bem Vindo,</span>
              <h2><?=$usuario->getNome()?></h2>
            </div>
          </div>
          <br />
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> Menu<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="dashboard.php">Dashboard</a></li>
                  </ul>
                </li>
              <?php
                if($usuario->getProfissao()->getId() != 4){
              ?>                  
                <li><a><i class="fa fa-users"></i> Usuários<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="usuarios.php">Usuários</a></li>
                    <li><a href="consultores.php">Consultores</a></li>
                    <li><a href="partners.php">Partners</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-calendar"></i> Tarefas<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="atividades.php">Tarefas Requiridas</a></li>
                    <li><a href="atividades-delegadas.php">Tarefas Delegadas</a></li>
                  </ul>
                </li>
              <?php
                }
              ?>
                <li><a><i class="fa fa-cart-plus"></i> Produtos<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="produtos.php">Produtos Cadastrados</a></li>
                  </ul>
                </li>                  
                <li><a><i class="fa fa-briefcase"></i> Negócios <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="market.php">Market</a></li>
                    <li><a href="leads.php">Leads</a></li>
                    <li><a href="suspects.php">Suspects</a></li>
                    <li><a href="prospects.php">Prospects</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-file" aria-hidden="true"></i> Contratos <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="contratos.php">Todos Contratos</a></li>
              <?php
                if($usuario->getProfissao()->getId() != 4){
              ?>  
                    <li><a href="contratos_pendentes.php">Contratos Pendentes</a></li>
              <?php
                }
              ?>
                    <li><a href="contratos_aprovados.php">Contratos Aprovados</a></li>                      
                  </ul>
                </li>
              <?php
                if($usuario->getProfissao()->getId() != 4){
              ?> 
                
                <li><a><i class="fa fa-line-chart"></i> Consultoria <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="projetos.php">Projetos</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-comments" aria-hidden="true"></i> Pós-Venda <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="pos-venda.php">Pós-Venda</a></li>                      
                  </ul>
                </li>
                <li><a><i class="fa fa-calculator"></i> Financeiro <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="clientes.php">Clientes</a></li>                      
                    <li><a href="fornecedores.php">Fornecedores</a></li>
                    <li><a href="transacoes.php">Transações</a></li>
                  </ul>
                </li>
              <?php
                }
              ?>                     
              </ul>
            </div>
          </div>
          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>          
        </div>
      </div>      
      <!-- Col-->
      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                 <?php
                   if($usuario->getImage() != null){
                     if (file_exists('../' . $usuario->getImage()) !== false) {
                 ?>
                       <img  src="<?='../' . $usuario->getImage()?>">
                 <?php
                     }else{
                 ?>
                       <img src="../images/user.png" alt="">  
                 <?php
                     } 
                   }else{
                 ?>
                   <img src="../images/user.png" alt="">  
                 <?php
                   }
                 ?>

                  <?=$usuario->getNome()?>
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="usuario-perfil.php?id=<?=$usuario_id?>"> Perfil</a></li>
                  <li><a href="javascript:;">Ajuda</a></li>
                  <li><a href="../aut/logout.php"><i class="fa fa-sign-out pull-right"></i> Sair</a></li>
                </ul>
              </li>
              <li role="presentation" class="dropdown">
                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-envelope-o"></i>
                  <span class="badge bg-green"><?=count($mensagens)?></span>
                </a>
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                  <?php
                    foreach ($mensagens as $mensagem) {
                      if($mensagem->getStatusMensagem()->getId() == 1){
                  ?>

                      <li>
                        <a>
                          <span class="image"><img src="../images/user.png" alt="Profile Image" /></span>
                          <span>
                            <span><?=$mensagem->getEmissor()->getNome()?></span>
                            <span class="time"><?=$mensagem->getData()?></span>
                          </span>
                          <span class="message">
                            <?=$mensagem->getTitulo()?>
                          </span>
                        </a>
                      </li>

                  <?php                      
                      }
                    }
                  ?>
                 
                  <li>
                    <div class="text-center">
                      <a href="inbox.php">
                        <strong>Ver Todas Mensagens</strong>
                        <i  class="fa fa-angle-right"></i>
                      </a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation --> 
      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">