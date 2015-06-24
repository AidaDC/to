<?php /**
* @author Andreu Sanz Miedes y Aida Dahdah Castelló
* @author asanzm.sanz@gmail.com, aidadahdah@gmail.com
* @copyright 2015 PROYECTO FINAL
* @version 1.0
*/


if(isset($_SESSION['rol']) ){
$menu = '<div id="menu"><div><a href="'.APP_W.'home">Inicio</a></div>';

if($_SESSION['rol']==1){
	$menu.= '<div><a href="'.APP_W.'gestionar/gestionarusuarios">Gestionar Usuarios</a></div>';
	$menu.= '<div><a href="'.APP_W.'gestionar/gestionlibros">Gestionar Libros</a></div>
		     <div id="princip">Categorias';
	$menu.= '<div id="menu2"><div id="sec"><form class="registre5"  name="genero" method="post" accept-charset="UTF-8" action="' . APP_W . 'gestionar/gestionargenero"><label><input type="submit" style="display:none;z-index:100;"  name="genero" value="misterio">Misterio</label></form></div>
                        		<div id="sec"><form class="registre5"  name="genero" method="post" accept-charset="UTF-8" action="' . APP_W . 'gestionar/gestionargenero"><label><input type="submit" style="display:none;z-index:100;"  name="genero" value="aventura">Aventura</label></form></div>
                        		<div id="sec"><form class="registre5"  name="genero" method="post" accept-charset="UTF-8" action="' . APP_W . 'gestionar/gestionargenero"><label><input type="submit" style="display:none;z-index:100;"  name="genero" value="fantasia">Fantasia</label></form></div>
                        		<div id="sec"><form class="registre5"  name="genero" method="post" accept-charset="UTF-8" action="' . APP_W . 'gestionar/gestionargenero"><label><input type="submit" style="display:none;z-index:100;"  name="genero" value="accion">Accion</label></form></div>
                        		</div></div>';
}else{
	$menu.= '<div><a href="'.APP_W.'gestionar/gestionarcompras">Ver pedidos</a></div>
	<div><a href="'.APP_W.'gestionar/gestionarperfil">Modificar Perfil</a></div>
	<div><a href="'.APP_W.'carrito">Ver Carrito</a></div><div id="princip">Categorias';
		$menu.= '<div id="menu2"><div id="sec"><form class="registre5"  name="genero" method="post" accept-charset="UTF-8" action="' . APP_W . 'gestionar/gestionargenero"><label><input type="submit" style="display:none;z-index:100;"  name="genero" value="misterio">Misterio</label></form></div>
                        		<div id="sec"><form class="registre5"  name="genero" method="post" accept-charset="UTF-8" action="' . APP_W . 'gestionar/gestionargenero"><label><input type="submit" style="display:none;z-index:100;"  name="genero" value="aventura">Aventura</label></form></div>
                        		<div id="sec"><form class="registre5"  name="genero" method="post" accept-charset="UTF-8" action="' . APP_W . 'gestionar/gestionargenero"><label><input type="submit" style="display:none;z-index:100;"  name="genero" value="fantasia">Fantasia</label></form></div>
                        		<div id="sec"><form class="registre5"  name="genero" method="post" accept-charset="UTF-8" action="' . APP_W . 'gestionar/gestionargenero"><label><input type="submit" style="display:none;z-index:100;"  name="genero" value="accion">Accion</label></form></div>
                        		</div></div>';
}



$menu.= '</div>';
echo $menu;
}


?>