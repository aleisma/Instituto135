<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta charset="utf-8">
  <title>Busqueda de datos de Alumnos</title>
  <script src="../jquery/jquery.min.js"></script>
  <link href="../../css/grid.css" rel="stylesheet">
  <script src="peticion.js"></script>
  <!--SWEETALERT-->
  <script src="../js/sweetalert.min.js"></script>
<!-- SCRIPTS JS-->
<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
<!--ICONOS --->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<style>
.letra{

font-family:Tahoma;
        line-height: 1.5em;

}


</style>



</head>
  <body>
  <div class="container">
<div class="py-7 text-center">
<div class="col-12 text-center">
<img class="mb-12" src="../../imagenes/logos.png" width="500" height="100">
<hr>
<div class="col-md-12 order-md-1 align-center">
<h4 class="mb-3">Buscar Nuevos alumnos</h4>
<div class="row">
<div class="col-12">
  <label class="letra"  for="buscar">Ingrese Dni, Nombre ó Apellido para realizar la busqueda</label>
  <hr>
 <input type="text" name="busqueda" id="busqueda" placeholder="Buscar Alumno">
 <button  class="btn btn-danger" onclick="location.href='../../menu.php'" name="cancelar" > <i class="fas fa-home"></i> Cancelar</button>	
		</section>
    <br>
          </div>
					<main role="main" class="col-md-6 ml-sm-auto col-lg-12 px-2">
<section id="tabla_resultado">
    <!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->
    


		</section>

</div>
		 
    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    
  </body>
</html>