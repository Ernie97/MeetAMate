<div class = "w3-container w3-white w3-card w3-row-padding w3-margin-top">

<?php 
if (isset($_SESSION['LogIn']) && $_SESSION['LogIn']){ ?>	
	
	<form action="codesincss/insertarComentario.php?id=<?php echo $id; ?>&tipo=<?php echo $tipo; ?>" id="usrform" method="POST">
		<h3>¿Quieres hacer algún comentario?</h3>
		<textarea class="w3-input w3-border" name="comment" form="usrform">Escribe aquí tu comentario...</textarea>
		<h3>¡Envía tu valoración! </h3>
		<div class="valoracion w3-margin-left">
			<input id="radio1" type="radio" name="valoracion" value="1"><label for="radio1">&#9733;</label>
		  	<input id="radio2" type="radio" name="valoracion" value="2"><label for="radio2">&#9733;</label>
		  	<input id="radio3" type="radio" name="valoracion" value="3"><label for="radio3">&#9733;</label>
		  	<input id="radio4" type="radio" name="valoracion" value="4"><label for="radio4">&#9733;</label>
		  	<input id="radio5" type="radio" name="valoracion" value="5"><label for="radio5">&#9733;</label>
		</div>
		<div id="consulta" class="w3-margin-bottom">
			<input id="consulta-boton" class="w3-button" value="Enviar" type="submit">
		</div>
		
	</form>

<?php } ?>
</div>
</div>