	<!--Datatables styles-->
	<link rel="stylesheet"  type="text/css" href="../assets/datatables/css/dataTables.bootstrap5.min.css">

	<!--Datatables Buttons-->
	<link rel="stylesheet"  type="text/css" href="../assets/datatables/css/buttons.bootstrap5.css">

	<!--Responsive datatables-->
	<script type="text/javascript" src="../assets/datatables/js/dataTables.responsive.min.js"></script>

	<!--Datatables Scripts-->
	<script type="text/javascript" src="../assets/datatables/js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="../assets/datatables/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="../assets/datatables/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="../assets/datatables/js/dataTables.bootstrap5.min.js"></script>

	<!--Botones para exportar-->
	<script type="text/javascript" src="../assets/datatables/js/
	pdfmake.min.js"></script>
	<script type="text/javascript" src="../assets/datatables/js/
	jszip.min.js"></script>
	<script type="text/javascript" src="../assets/datatables/js/
	vfs_fonts.js"></script>
	<script type="text/javascript" src="../assets/datatables/js/
	buttons.html5.js"></script>
	<script type="text/javascript" src="../assets/datatables/js/
	buttons.print.js"></script>

	<!--Datatables responsive script-->
	<script type="text/javascript" src="../assets/datatables/js/dataTables.responsive.min.js"></script>


    <script type="text/javascript"> 
	$(document).ready(function () {
		$('#tableresponsive').DataTable({
			dom: 'Bflrtip',
			buttons: [
				{
               //Boton Copiar
			   extend: 'copyHtml5',
			   footer: true,
			   titleAttr:'Copiar',
			   className: 'btn btn-outline-info btn-md',
			   text: '<i class="bi bi-clipboard"></i>'

				},
				{//Boton Excel
			   extend: 'excelHtml5',
			   footer: true,
			   titleAttr:'Exportar Excel',
			   className: 'btn btn-outline-success btn-md',
			   text: '<i class="bi bi-file-spreadsheet"></i>'

				},
				{//Boton pdf
			    extend: 'pdfHtml5',
			   footer: true,
			   titleAttr:'Exportar pdf',
			   className: 'btn btn-outline-danger  btn-md',
			   text: '<i class="bi bi-file-pdf"></i>'

				},
				{//Boton print
			   extend: 'print',
			   footer: true,
			   titleAttr:'imprimir',
			   className: 'btn btn-outline-info btn-md',
			   text: '<i class="bi bi-printer-fill"></i>'

				},
			],
			responsive: true,
			language: {
				url: '../assets/datatables/es-ES.json'
			},
		});
	});
</script>

<?php
if (is_array($data)) {


	/*eliminar registro*/
	if (isset($_GET['eli'])) {
$eli = $conn->prepare('DELETE FROM vendedor WHERE idvendedor=?');
$eli->bindParam(1,$_GET['eli']);
$eli->execute();

if ($eli){
	//echo "Registro borrado";
	?>
	<script type="text/javascript">

$( document ).ready(function() {
$('#avisoeli').modal('toggle')
$('#cerrar').on('click', function () {
	$(location).attr('href','homeadm.php?page=tabla');
});
});
</script>

<!-- Modal eliminar datos -->
<div class="modal fade" id="avisoeli">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Alerta de datos</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       Datos eliminados con exito
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"  id="cerrar">Cerrar</button>
      </div>
	</div>
</div>
</div>

	<?php
}else{
	echo "Error al borrar";
}
	}

	/*eliminar registro*/
    ?>


<table class="table table-strip table-bordered table-hover" id="tableresponsive"  style="width: 100%;">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Documento</th>
				<th>Telefono</th>
                <th>Direccion</th>
                <th>correo electronico</th>
                <th>operacion</th>
            </tr>
        </thead>
		<tbody>
            <?php
            $result=$conn->prepare('SELECT * FROM vendedor WHERE idvendedor !=?');
			$result->bindParam(1,$data['idvendedor']);
            $result->execute();

            while ($view=$result->fetch(PDO::FETCH_ASSOC)){

            ?>
			<tr>
            <td><?php echo $view['nombre']; ?></td>  
			<td><?php echo $view['apellido']; ?></td>  
			<td><?php echo $view['documento']; ?></td>  
			<td><?php echo $view['telefono']; ?></td>  
			<td><?php echo $view['direccion']; ?></td>  
            <td><?php echo $view['correo_electronico']; ?></td>
            <td>
				<a href="" title="editar" class="btn btn-outline-primary"><i class="bi bi-pencil-square"></i></a>
				<button type="button" data-bs-toggle="modal" data-bs-target="#eli" title="Eliminar"
				 class="btn btn-outline-danger" title="Eliminar Datos"><i class="bi bi-trash3-fill"></i></button>
			</td>
            </tr>
			<!--Modal eliminar datos-->
<div class="modal fade" id="eli">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Alerta de datos</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Realmente desea eliminar el registro con documento
		<p><?php echo $view['documento']; ?></p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
		<a href="homeadm.php?page=tabla&eli=<?php echo $view['idvendedor']; ?>" title="Aceptar" class="btn btn-success">Aceptar</a>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>
            <?php  }  ?>	
       </tbody>
  </table>
  <?php
}else{
    header('location: ./');
}

?>
