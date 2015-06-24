<?php $aaa.= ('
<p id="idioma">Idioma: ' . $fila['idioma'] . '</p>
<p id="valoration">Valoracion: ' . $fila['valoration'] . '</p>
<p id="stock">Stock: No hay stock disponible</p>
</div>
<div id="descripcion">
<p id="description">Sinopsis: ' . utf8_encode($fila['description']) . '</p></div>
<div id="der2p">
<form id="comp" name="' . 'form' . $idlib . '" method="post" accept-charset="UTF-8" action="' . APP_W . 'gestionar/gestionarlibros"><input id="comp" type="submit" value="Añadir al carrito" name="enviar" disabled>
</div>
</div> <!-- final del div der -->
');

?>