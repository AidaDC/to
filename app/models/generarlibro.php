<?php
$aaa.= ('
<div id="libro">
<div id="izq"><img id="imagen" src="'.$fila['imagen'].'" alt="'.utf8_encode($fila['alt']). '"></div>
<div id="der"><div id="descrip"><p>Nombre:  ' . utf8_encode($fila['nombre']) . '</p>
<p>Autor:  ' . utf8_encode($fila['nombre autor']) . ' ' . utf8_encode($fila['apellidos']) . '</p>
<p >Precio:  ' . $fila['price'] . '</p>
<p>Stock:  ' . $fila['stock'] . '</p></div>
<div id="der2">
');

if($fila['stock']==0){
$aaa.=('
<form id="comp" name="' . 'form' . $idlib . '" method="post" accept-charset="UTF-8" action="' . APP_W . 'gestionar/gestionarlibros">
<input type="text" style="display:none;" name="id" value="' . $fila['id_libro'] . '"></label><input id="comp" type="submit" value="Más  Información" name="enviar"></form>
</div>
</div> <!-- final del div der -->');
}else{
$aaa.=('
<form id="carrito" name="' . 'form' . $idlib . '" method="post" accept-charset="UTF-8" action="' . APP_W . 'carrito/carrito"><input id="carrito" type="submit" value="Añadir al Carrito" name="enviar">
<input type="text" style="display:none;" name="id" value="' . $fila['id_libro'] . '"></label>
<input type="text" style="display:none;" name="precio" value="' . $fila['price'] . '"></label>
<input type="text" style="display:none;" name="nombre" value="' . utf8_encode($fila['nombre']) . '">
</form>
<form id="comp margen" name="' . 'form' . $idlib . '" method="post" accept-charset="UTF-8" action="' . APP_W . 'gestionar/gestionarlibros">
<input type="text" style="display:none;" name="id" value="' . $fila['id_libro'] . '"></label><input id="comp" type="submit" value="Más  Información" name="enviar"></form>
</div>
</div> <!-- final del div der -->');
}



?>