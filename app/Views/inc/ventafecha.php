<?php

ob_start();
session_start();
if (!isset($_SESSION['nombre'])) {
  header("Location: login.html");
}else{


require 'header.php';

if ($_SESSION['consultav']==1) {

 ?>
    <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="row">
        <div class="col-md-12">
      <div class="box">
<div class="box-header with-border">
  <h1 class="box-title">Consulta de Ventas por Fecha</h1>
  <div class="box-tools pull-right">
    
  </div>
</div>
<!--box-header-->
<!--centro-->

  <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
    <thead>
      <th>Fecha</th>
      <th>Usuario</th>
      <th>Cliente</th>
      <th>Comprobante</th>
      <th>Número</th>
      <th>Total Ventas</th>
      <th>Recargo</th>
      <th>Estado</th>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
      <th>Fecha</th>
      <th>Usuario</th>
      <th>Proveedor</th>
      <th>Comprobante</th>
      <th>Número</th>
      <th>Total Compra</th>
      <th>Recargo</th>
      <th>Estado</th>
    </tfoot>   
  </table>
</div>

<!--fin centro-->
      </div>
      </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
<?php 
}else{
 require 'noacceso.php'; 
}

require 'footer.php';
 ?>
 <script src="scripts/ventasfechacliente.js"></script>
 <?php 
}

ob_end_flush();
  ?>

