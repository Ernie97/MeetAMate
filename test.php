<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <link rel="stylesheet" href="CSS/w3cssgeneral.css">
    <link rel="stylesheet" href="CSS/estilo-login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
	<title>MeetAMate: Test</title>
</head>

  <body class="color-fondo">
    	<div class="w3-content w3-sand">
    <?php
          require('codesincss/includes/comun/cabecera.php');
        ?> 

        <div id="contenedor-login">
            <div class="w3-container w3-margin w3-card w3-white">

            	<p> A continuación vas a realizar un test para estar seguros de encontrar la opción perfecta para ti.</p>
            	<p> Responde con sinceridad, solo así podremos aconsejarte lo mejor para ti. Una vez realizado el test puedes cambiar tus opciones desde "Perfil". Aquellas opciones marcadas con * son obligatorias de responder.</p>

              <form action="codesincss/procesarHacerTest.php" method="get">
                <div class="w3-half">
                <h4><i class="fa fa-home fa-fw w3-large w3-text-dark-blue"></i> Tu estancia</h4> 
                <p><i class="fa fa-calendar fa-fw w3-large w3-text-dark-blue w3-margin-bottom"></i> Fecha de inicio de tu estancia* <br/>
                <input class ="w3-sand" type="date" name="fecha_inicio" value=2018-01-01></p>
                <p><i class="fa fa-calendar fa-fw w3-large w3-text-dark-blue w3-margin-bottom"></i> Fecha de fin de tu estancia* <br/>
                <input class = "w3-sand" type="date" name="fecha_fin" value=2019-01-01></p>
                
                <h4><i class= "fa fa-usd fa-fw w3-large w3-text-dark-blue"></i>Tu presupuesto </h4>
                <p> Presupuesto mínimo <br/>
                <input class ="w3-sand" type="text" name="presupuesto_min"></p>
                <p> Presupuesto máximo* <br/>
                <input class = "w3-sand"type="text" name="presupuesto_max"></p>

                <h4><i class= "fa fa-language fa-fw w3-large w3-text-dark-blue"></i>Idiomas</h4>
                <p> Aquí puedes seleccionar hasta 4 de los idiomas que hablas: </p>
                <select class ="w3-dark-blue" name="Idioma1">
                 <option value="1">English</option> 
                 <option value="2">Français</option> 
                 <option value="3">Deutsch</option>
                 <option value="4">Portugués</option> 
                 <option value="5">中國</option> 
                 <option value="6">日本</option>
                 <option value="7">Español</option> 
                 <option value="8">--</option>  
              </select>
              <select class = "w3-sand" name="Idioma2">
                 <option value="1">English</option> 
                 <option value="2">Français</option> 
                 <option value="3">Deutsch</option>
                 <option value="4">Portugués</option> 
                 <option value="5">中國</option> 
                 <option value="6">日本</option> 
                 <option value="7">Español</option> 
                 <option value="8">--</option>  
              </select>
              <select class ="w3-dark-blue" name="Idioma3">
                 <option value="1">English</option> 
                 <option value="2">Français</option> 
                 <option value="3">Deutsch</option>
                 <option value="4">Portugués</option> 
                 <option value="5">中國</option> 
                 <option value="6">日本</option> 
                 <option value="7">Español</option> 
                 <option value="8">--</option>  
              </select>
              <select class = "w3-sand" name="Idioma4">
                 <option value="1">English</option> 
                 <option value="2">Français</option> 
                 <option value="3">Deutsch</option>
                 <option value="4">Portugués</option> 
                 <option value="5">中國</option> 
                 <option value="6">日本</option> 
                 <option value="7">Español</option> 
                 <option value="8">--</option> 
              </select>
              </div>
                
                <div class="w3-half w3-margin-bottom">
                <h4> <i class= "fa fa-thumbs-o-up fa-fw w3-large w3-text-dark-blue"></i>Personalidad</h4>
                <p> Selecciona las siguientes casillas si:</p>
                <p><input class= "w3-check" type="checkbox" name="sexo" value=1> Quieres únicamente compañeros de tu mismo sexo </p>
                <p><input class= "w3-check" type="checkbox" name="nacionalidad" value=1> Quieres únicamente compañeros de tu misma nacionalidad </p>
                <p><input class= "w3-check" type="checkbox" name="fumador" value=1> Eres fumador </p>
                <p><input class= "w3-check" type="checkbox" name="no_fumadores" value=1> Quieres únicamente compañeros NO fumadores </p>
                <p><input class= "w3-check" type="checkbox" name="mascotas" value=1> NO quieres tener mascotas en casa </p>
                <p><input class= "w3-check" type="checkbox" name="centro" value=1> Buscas alojamiento únicamente en el centro de Madrid </p>
                <p><input class= "w3-check" type="checkbox" name="fiestas" value=1> NO quieres que se puedan hacer fiestas en tu piso </p>
                <p><input class= "w3-check" type="checkbox" name="tranquilidad" value=1> Quieres vivir con gente tranquila y silenciosa </p>
                <p><input class= "w3-check" type="checkbox" name="espanol" value=1> Quieres vivir con gente que hable Español </p>
                <p><input class= "w3-check" type="checkbox" name="ingles" value=1> Quieres vivir con gente que hable Inglés </p>
                </div>
                

              <div class="w3-margin-top">
                <p> *Si marcas muchas casillas será más difícil para nosotros encontrar algo que satisfaga todas tus necesitades. Por eso si algo no es fundamental para ti, te aconsejamos no marcar la casilla. </p>
                
                <p><input type="checkbox" name="perfil_publico" value=1> Quiero que mi perfil sea público. Cuando la gente busque un compañero de piso, saldrá mi perfil.</p>

                <div id="button-login" class="w3-margin-bottom w3-margin-top">
                    <input class="w3-button w3-dark-blue" type="submit" value="Guardar">
                </div>

              </div>
              </form>

        </div>
    </div>

      <?php 
      include("codesincss/includes/comun/pie.php"); 
    ?>

    
  </body>
</html>