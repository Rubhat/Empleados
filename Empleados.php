<?php
session_start();
if (!isset($_SESSION['user'])) {
	header("location: Empleados");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>
		Varuz Headhunters
	</title>
	<meta charset="utf-8">
	<meta name="author" content="Ruben Corona Morales">
	<meta name="title" content="Varuz Headhunters">
	<meta name="description" content="Página web que muestra los salarios de los empleados de la empresa y que permite realizar registros nuevos, consultas y conversión del salario.">
	<meta name="keywords" content="salarios, empleados, tipo de cambio">
	<link rel="shortcut icon" href="VH.ico" type="vh.ico" >
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Principal.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.css">
	<script src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.js"></script>

	<style>
		#mydatatable tfoot input{
			width: 100% !important;
		}
		#mydatatable tfoot {
			display: table-header-group !important;
		}
	</style>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#mydatatable tfoot th').each( function () {
				var title = $(this).text();
				$(this).html( '<input type="text" placeholder="Filtrar.." />' );
			} );

			var table = $('#mydatatable').DataTable({
				"dom": 'B<"float-left"i><"float-right"f>t<"float-left"l><"float-right"p><"clearfix">',
				"responsive": false,
				"language": {
					"url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
				},
				"order": [[ 0, "desc" ]],
				"initComplete": function () {
					this.api().columns().every( function () {
						var that = this;

						$( 'input', this.footer() ).on( 'keyup change', function () {
							if ( that.search() !== this.value ) {
								that
								.search( this.value )
								.draw();
							}
						});
					})
				}
			});
		});
	</script>

</head>
<body>
	<div id="container" class="container-fluid table-responsive" id="mydatatable-container">
		<div id="row" class="principal">
			<div id="empleados">
				<h3>EMPLEADOS</h3>
				<table id="tab1" class="records_list table table-striped table-bordered table-hover" id="mydatatable">
					<?php
					session_start(); 
					require "var.php";
					$server = mysqli_connect($serv, $usern, $passw, $dbname);

					$sql="SELECT * FROM empleados WHERE id='$id' AND compa='$company'";

					$result=mysqli_query($server,$sql);
					$final=mysqli_num_rows($result);
					if ($result3->num_rows > 0) {
						while($row = $result3->fetch_assoc()) {

							echo "<tfoot>
							<tr>";
							echo "<th>Empleado o Empresa</th>";
							echo "<th>Empleado o Empresa</th>";
							echo "<th>Empleado o Empresa</th>";
							echo "<th>Empleado o Empresa</th>";
							echo "<th>Empleado o Empresa</th>";
							echo "<th>Empleado o Empresa</th>";
							echo "<th>Empleado o Empresa</th>";
							echo "<th>Empleado o Empresa</th>";
							echo "</tr>
							</tfoot>";
							echo "<tr>
							<th>ID</th>";
							echo "<th>Nombre</th>";
							echo "<th>Apellido Paterno</th>";
							echo "<th>Apellido Materno</th>";
							echo "<th>Dirección</th>";
							echo "<th>Puesto</th>";
							echo "<th>Salario</th>";
							echo "<th>Empresa</th>";
							echo "</tr>
							<tr>
							<td>14221629</td>";
							echo "<td>value=".$row["nom"]."</td>";
							echo "<td>value=".$row["app"]."</td>";
							echo "<td>value=".$row["apm"]."</td>";
							echo "<td>value=".$row["add"]."</td>";
							echo "<td>value=".$row["pue"]."</td>";
							echo "<td class='right1'>value=".$row["sal"]."</td>";
							echo "<td>readonly value=".$row["emp"]."</td>
							</tr>
							</table>
							<table id='tab2'>
							<tr>
							<th id='tab2'>Total de Empleados: </th>
							</tr>
							<tr>
							<th id='tab2'>Salario mostrado en: </th>
							</tr>
							</table>";
						}
					} else {
						echo "0 results";
					}
					?>

					<input type="submit" name="add" id="submit" value="Agregar" class="add1"buttonenv>
					<input type="submit" name="mod" id="submit" value="Actualizar" class="mod1"buttonenv>
				</div>

				<div id="footer">

				</div>
			</div>
		</div>
	</body>
	</html>