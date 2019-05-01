

<?php
require('scripts/Funciones.php');
if(!haIniciadoSesion() || !esAdmin())
{
header('Location:index.html');
desconectar();
}
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
    <link rel="icon" href="../../../../favicon.ico">

    <title>Menu Principal</title>


    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="css/blog.css" rel="stylesheet">

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
 <script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
 






<!-- Latest minified bootstrap css -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<!-- Latest minified bootstrap js -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<style>
.fullscreen-modal .modal-dialog {
  margin: 0;
  margin-right: auto;
  margin-left: auto;
  width: 100%;
}
@media (min-width: 768px) {
  .fullscreen-modal .modal-dialog {
    width: 750px;
  }
}
@media (min-width: 992px) {
  .fullscreen-modal .modal-dialog {
    width: 970px;
  }
}
@media (min-width: 1200px) {
  .fullscreen-modal .modal-dialog {
     width: 1170px;
  }
}


</style>

  </head>
    <body>
    <div class="container">
    <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
    <div class="col-4 pt-1">
    <img src="imagenes/logo.jpeg" class="zoom" width="120px" class="img-thumbnail">
    </div>
    <div class="col-4 text-center">
    
    
    </div>
    <div class="col-2 d-flex justify-content-end align-items-center">
    
    </div>
    </div>
    </header>
    <!---ACA INGRESE LO NUEVO---->
<div class="navbar navbar-expand-md navbar-dark bg-dark mb-4 " role="navigation">
    <a class="navbar-brand" href="http://analista.isft135.edu.ar">I.S.F.T 135-Saladillo</a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="true" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="dropdown2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">ALUMNOS</a>


                
                <ul class="dropdown-menu" aria-labelledby="dropdown2">
                    <li  class="dropdown-item">
                  <li class="dropdown-item"><a href="formularios/RegistrarAlumnos/registro-alumno.php">Registrar alumno nuevo</a>
                     
                   
                     
                     </li>
                <li class="dropdown-item"><a href="formularios/BuscarAlumnos/BuscarAlumnos.php">Buscar</a></li>
                    </li></li></ul>  

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="dropdown2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">CARRERAS</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown2">
                    <li class="dropdown-item" ><a href="formularios/InscribirEnCarreras/inscripcion-alumnos-carreras.php">Inscribir Alumno en Carrera</a></li>
                     <li class="dropdown-item"><a href="formularios/agregarCarrera/AgregarCarrera.php">Registrar Nueva Carrera</a></li>
                    </li></li></ul>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="dropdown2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">CURSADAS</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown2">
                    <li class="dropdown-item"><a  href="formularios/RegistroCursadas/registro-cursadas.php">Ingresar Notas de Cursadas</a></li>
                    </li></li></ul>     

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="dropdown2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">FINALES</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown2">
                    <li class="dropdown-item" ><a href="formularios/InscripcionFinales/inscripciones-finales.php">Inscribir Alumno a Mesa Final</a></li>
                    <li class="dropdown-item" ><a href="formularios/IngresarNotasFinales/registro-finales.php">Registrar Notas de Mesas Finales</a></li>   
                </li></li></ul>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="dropdown2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">REPORTES</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown2">       
                     <li class="dropdown-item" ><a href="formularios/Reportes/Alumnos/alumnos.php">Alumnos por Carreras</a></li>
                     <li class="dropdown-item" ><a href="formularios/Reportes/Actas/actas.php">Actas Mesas Finales</a></li>
                     <li class="dropdown-item" ><a href="formularios/Reportes/Salidas/salidas.php">Salidas</a></li>
                    </li></li></ul>
                   
                    <li class="nav-item dropdown">
                    
                    <a class="btn btn-xs  btn-outline-danger" href="index.html">Salir</a>
                    </li></li>





                </ul> <!--ul general-->    
    </div></div>
   <!---ACA TERMINA---->
  </nav>
  <div class="container">
  
<img src="imagenes/1.jpg"  class="img-thumbnail">


  </div>

    </div>

    </div>

  </body>

  <?php
  desconectar();?>



  <!----------------------------------------------
  
  
  <script>
function submitContactForm(){
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+.)+[A-Z]{2,4}$/i;
    var name = $('#inputName').val();
    var email = $('#inputEmail').val();
    var message = $('#inputMessage').val();
    if(name.trim() == '' ){
        alert('Please enter your name.');
        $('#inputName').focus();
        return false;
    }else if(email.trim() == '' ){
        alert('Please enter your email.');
        $('#inputEmail').focus();
        return false;
    }else if(email.trim() != '' && !reg.test(email)){
        alert('Please enter valid email.');
        $('#inputEmail').focus();
        return false;
    }else if(message.trim() == '' ){
        alert('Please enter your message.');
        $('#inputMessage').focus();
        return false;
    }else{
        $.ajax({
            type:'POST',
            url:'submit_form.php',
            data:'contactFrmSubmit=1&name='+name+'&email='+email+'&message='+message,
            beforeSend: function () {
                $('.submitBtn').attr("disabled","disabled");
                $('.modal-body').css('opacity', '.5');
            },
            success:function(msg){
                if(msg == 'ok'){
                    $('#inputName').val('');
                    $('#inputEmail').val('');
                    $('#inputMessage').val('');
                    $('.statusMsg').html('<span style="color:green;">Thanks for contacting us, we'll get back to you soon.</p>');
                }else{
                    $('.statusMsg').html('<span style="color:red;">Some problem occurred, please try again.</span>');
                }
                $('.submitBtn').removeAttr("disabled");
                $('.modal-body').css('opacity', '');
            }
        });
    }
}
</script>
  
  
  
  
  
  --->