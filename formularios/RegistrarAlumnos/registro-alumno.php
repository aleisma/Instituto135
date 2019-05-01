<?php
require '../../scripts/Funciones.php';
conectar();

$localidades = getLocalidades();



?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../imagenes/logos.png">

    <title>REGISTRO DE ALUMNOS</title>

     <script src="../jquery/jquery.min.js"></script>
  <link href="../../css/grid.css" rel="stylesheet">
  <script src="../js/functions.js"></script>
  <!--SWEETALERT-->
  <script src="../js/sweetalert.min.js"></script>
<!-- SCRIPTS JS-->
<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
<!--ICONOS --->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
<script>
//------------------------------------------------------------------------------------------------
//ENVIAR DATOS DE FORMULARIO.
function enviarDatos(){
var dni= $('#dni').val();
var nombre= $('#nombre').val();
var apellido= $('#apellido').val();
var fecha= $('#fecha').val();
var lugar= $('#lugar').val();
var correo= $('#correo').val();
var tel= $('#tel').val();
var calle= $('#calle').val();
var numero= $('#numero').val();
var piso= $('#piso').val();
var dto= $('#dto').val();
var provincia= $('#provincia').val();
var localidad= $('#localidad').val();
var secundaria= $('#secundaria').val();
var titulo= $('#titulo').val();
var trabajo= $('#trabajo').val();
var lugarN= $('#lugarN').val();
var obra= $('#obra').val();
var dataen = 'dni='+dni+'&nombre='+nombre+'&apellido='+apellido+'&fecha='+fecha
             +'&lugar='+lugar+'&correo='+correo+'&tel='+tel+'&calle='+calle
             +'&numero='+numero+'&piso='+piso+'&dto='+dto+'&provincia='+provincia+'&localidad='+localidad
             +'&secundaria='+secundaria+'&titulo='+titulo+'&trabajo='+trabajo+'&lugarN='+lugarN+'&obra='+obra;
$.ajax({
type: 'post',
url:'registrar.php',
data:dataen,
success:function(resp){
  swal({
  title: "Registro Guardado",
  text: "Presione acceptar",
  icon: "success",
  button: "Aceptar",
});
  //vacio los campos
var dni= $('#dni').val("");
var nombre= $('#nombre').val("");
var apellido=$('#apellido').val("");
var fecha= $('#fecha').val("");
var lugar= $('#lugar').val("");
var correo= $('#correo').val("");
var tel= $('#tel').val("");
var calle= $('#calle').val("");
var numero= $('#numero').val("");
var piso= $('#piso').val("");
var dto= $('#dto').val("");
var provincia= $('#provincia').val("");
var localidad= $('#localidad').val("");
var secundaria=$('#secundaria').val("");
var titulo=$('#titulo').val("");
var trabajo=$('#trabajo').val("");
var lugarN= $('#lugarN').val("");
var obra= $('#obra').val("");

}
});
return false;
}
  </script>

    <div class="container">
    <div class="py-5 text-center">
    <div class="col-12 text-center">
    <img class="mb-12" src="../../imagenes/logos.png" width="500" height="100">
      <hr>
    <div class="col-md-12 order-md-1 align-center">
    <h4 class="mb-3">Datos del Alumno</h4>
    <div class="row">
    <div class="col-2">
    <form  method="post" onsubmit="return enviarDatos();">
    <label for="dni">DNI</label>
    <input type="text" class="form-control" id="dni" name="dni" maxlength="8"  required>
    </div>
    <div class="col-2">
    <label for="firstName">Nombre</label>
    <input type="text" class="form-control" id="nombre"  name="nombre" maxlength="15" required>
    </div>
    <div class="col-2">
    <label for="lastName">Apellido</label>
    <input type="text" class="form-control" id="apellido"  name="apellido" maxlength="15" required>
    </div>
    <div class="col-2">
    <label for="date">Fecha.Nac</label>
    <input type="date" class="form-control" id="fecha"  name="fecha"  required>
    </div>
    <div class="col-2">
    <label for="lug-nac">Lugar.Nac</label>
    <input type="text" class="form-control" id="lugarN"  name="lugarN" maxlength="20" required>
    </div>

    </div> <!--cierro row -->
    <div class="row">
    
    <div class="col-2">
    <label for="email">Email </label>
    <input type="email" class="form-control" id="correo" placeholder="user@ejemplo.com" name="correo">
    <div class="invalid-feedback">
    Seleccione un Email Valido.
    </div>
    </div>
    <div class="col-2">
    <label for="tel">Teléfono</label>
    <input type="text" class="form-control" id="tel"  name="tel" maxlength="20" required >
  </div>
  <div class="col-2">
    <label for="calle">Calle</label>
    <input type="text" class="form-control" id="calle"  name="calle" maxlength="15" required>
    </div>
    <div class="col-1">
    <label for="numero">Número</label>
    <input type="text" class="form-control" id="numero"  name="numero" maxlength="4" required>
    </div>
    <div class="col-1">
    <label for="piso">Piso</label>
    <input type="number" class="form-control" id="piso" name="piso" maxlength="2" >
    </div>
    <div class="col-1">
    <label for="depto">Dto</label>
    <input type="text" class="form-control" id="dto"  name="dto" maxlength="3">
    </div> 
    <div class="col-2 ">
                <label for="titulo">Titulo Secundario</label>
                <input type="text" class="form-control" id="titulo"  name="titulo" required>
              
              </div>
    </div> <!--cierro row-->
    </div>
    <div class="row">
    <div class="col-2">
    <label for="country">Provincia</label>
    <select class="custom-select d-block w-100" id="provincia" name="provincia" > <!-- Lo pide?-->
    <option value="">Buenos Aires</OPTION>
    </select>
    </div>
    <div class="col-2">
    <label for="state">Localidad</label>
    <select class="custom-select d-block w-100" id="localidad" name="localidad" required> <!-- Lo pide?-->
                <?php
                foreach($localidades as $fila):
                ?>
                <option value="<?php echo $fila[0]?>"><?php echo $fila[1]?></OPTION>
                <?php endforeach; ?>
                </select>
                </div>
                
         
                <div class="col-2 ">
                <label for="esc">Escuela Secundaria</label>
                <input type="text" class="form-control" id="secundaria"  name="secundaria" value="" required>
                
              </div>
              <div class="col-2 ">
                <label for="trabaja">¿Trabaja?</label>
                <select class="custom-select d-block w-100" id="trabajo" name="trabajo" >
                  <option value="">Seleccionar</option>
                  <option>SI</option>
                  <option>NO</option>
                </select>
                </div>
              <div class="col-2 ">
                <label for="trab">Lugar de Trabajo</label>
                <input type="text" class="form-control"  id="lugar" name="lugar">
              </div>
              <div class="col-2 ">
                <label for="osoc"> ¿Tiene Obra Social?</label>
                <select class="custom-select d-block w-100" id="obra" placeholder="" name="obra"value="" required>
                <option value="">Seleccionar</option>
                  <option>SI</option>
                  <option>NO</option>
                </select>
              </div>   
  
    </div> <!--cierro row -->
              <div class="row">
              <div class="col-3">
            <button  class="btn btn-info" type="submit"  ><i class="far fa-save"></i> Guardar</button>
            </div>
            </form>
            <div class="col-3">
            <button class="btn btn-danger" onclick="location.href='../../menu.php'" name="cancelar"><i class="fas fa-home"></i> Cancelar</button>     
            </div>

        </div>
      </div>

    </div>  
  </body>
</html>








