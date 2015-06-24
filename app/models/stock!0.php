<?php $aaa.= ('
<p id="idioma">Idioma: ' . $fila['idioma'] . '</p>
<p id="valoration">Valoración: ' . $fila['valoration'] . '</p>
<p id="stocks">Stock: ' . $fila['stock'] . '</p>
</div>
<div id="descripcion">
<p id="description">Descripción: ' . $fila['description'] . '</p></div>
<div id="der2p">
<form id="comp" name="' . 'form' . $idlib . '" method="post" accept-charset="UTF-8" action="' . APP_W . 'carrito/carrito">
<input type="text" style="display:none;" name="id" value="' . $fila['id_libro'] . '"></label>
<input type="text" style="display:none;" name="precio" value="' . $fila['price'] . '"></label>
<input type="text" style="display:none;" name="nombre" value="' . utf8_encode($fila['nombre']) . '"></label>
<input id="comp" type="submit" value="Añadir al carrito" name="enviar" >
</form>
</div>
</div> <!-- final del div der -->
');
?>