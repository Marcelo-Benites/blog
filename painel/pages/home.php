 <?php
    $usuariosOnline = Painel::listarUsuariosOnline();

    $pegarVisitasTotais = MySql::conectar()->prepare("SELECT * FROM `tb_admin.visitas` ");
   $pegarVisitasTotais->execute();

   $pegarVisitasTotais = $pegarVisitasTotais->rowCount();

   $pegarVisitasHoje = MySql::conectar()->prepare("SELECT * FROM `tb_admin.visitas` WHERE dia = ?");
   $pegarVisitasHoje->execute(array(date('Y-m-d')));

   $pegarVisitasHoje = $pegarVisitasHoje->rowCount();

 ?>
 <div class="box-content  left w100">
   	 	<h2><i class="fa fa-home"></i> Painel de controle - <?php echo NOME_EMPRESA ?></h2>

   	 	<div class="box-metricas">
   	 		<div class="box-metrica-single">
   	 			<div class="box-metrica-wraper">
   	 				<h2>Usúarios Online</h2>
   	 				<p><?php echo count($usuariosOnline); ?></p>
   	 			</div><!--box-metrica-single-->
   	 		</div><!--box-metrica-single-->
   	 		<div class="box-metrica-single">
            <div class="box-metrica-wraper">
              <h2>Total de Vizitas</h2>
              <p><?php echo $pegarVisitasTotais; ?></p>
            </div>
          </div>
          <div class="box-metrica-single">
            <div class="box-metrica-wraper">
              <h2>Vizitas Hoje</h2>
              <p><?php echo $pegarVisitasHoje; ?></p>
            </div>
          </div>

       </div><!--box-content-->
       <div class="clear"></div>

          <div class="box-content left w100">
            <h2><i class="fa fa-rocket"></i> Usúarios Online no Site</h2>
            <div class="table-responsive">
               <div class="row">
                 <div class="col">
                  <span>IP</span>
                 </div>
                 <div class="col">
                  <span>Última Ação</span>
                 </div><!--col-->
                 <div class="clear"></div>
               </div><!--row-->
               <?php
                 foreach ($usuariosOnline as $key => $value) {
               ?>
               <div class="row">
                 <div class="col">
                  <span><?php echo $value['ip']?></span>
                 </div>
                 <div class="col">
                  <span><?php echo date('d/m/Y  H:i:s',strtotime($value['ultima_acao']))?></span>
                 </div><!--col-->
                 <div class="clear"></div>
               </div><!--row-->
            <?php } ?>
            </div><!--table-responsive-->
         </div><!--box-content-->
          <div class="clear"></div>

          <div class="box-content left w100">
            <h2><i class="fa fa-rocket"></i> Usúarios do Painel</h2>
            
            <div class="table-responsive">
               <div class="row">
                 <div class="col">
                  <span>Nome</span>
                 </div>
                 <div class="col">
                  <span>Cargo</span>
                 </div><!--col-->
                 <div class="clear"></div>
               </div><!--row-->
               <?php
                 $usuariosPainel = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios`");
                 $usuariosPainel->execute();
                 $usuariosPainel = $usuariosPainel->fetchAll();
                 foreach ($usuariosPainel as $key => $value) {
               ?>
               <div class="row">
                 <div class="col">
                  <span><?php echo $value['user']?></span>
                 </div>
                 <div class="col">
                  <span><?php echo pegaCargo($value['cargo']); ?></span>
                 </div><!--col-->
                 <div class="clear"></div>
               </div><!--row-->
            <?php } ?>
            </div><!--table-responsive-->
         </div><!--box-content-->