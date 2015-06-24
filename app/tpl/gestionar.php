<section>

<?php 
if(isset($_SESSION['compras'])){
	echo '<div id="vsesion">'.$_SESSION['compras'].'</div>';
}


if(isset($_SESSION['usuarios'])){
	echo '<div id="vsesion">'. $_SESSION['usuarios'].'</div>';
}

if(isset($_SESSION['libros'])){
	echo '<div id="vsesion">'.$_SESSION['libros'].'</div>';
}

if(isset($_SESSION['perfil'])){
	echo $_SESSION['perfil'];
}

if(isset($_SESSION['todoslibros'])){
	echo $_SESSION['todoslibros'];
}

if(isset($_SESSION['gestionarperfilibros'])){
	echo $_SESSION['gestionarperfilibros'];
}

if(isset($_SESSION['gestionargenero'])){
	echo $_SESSION['gestionargenero'];
}
// echo $_SESSION['id_usuario'];
?>

</section>