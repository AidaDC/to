<?php
$descripcion=utf8_encode($fila['description']);
$perfil.= ('<input id="isbn" type="text" name="isbn" value="' . utf8_encode($fila['ISBN']) . '"  placeholder="ISBN" disabled></input></br>
                        <label for="nombre">Nombre:</label><input id="nombre" type="text" name="nombre" value="' . utf8_encode($fila['nombre']) . '"  placeholder="Nombre" ></input></br>
                        <label for="idioma">Idioma:</label><input id="idioma" type="text" name="idioma" value="' . $fila['idioma'] . '" placeholder="Idioma" ></input></br>
                        <label for="imagen">Imagen:</label><input id="imagen" type="text" name="imagen" value="' . utf8_encode($fila['imagen']) . '" placeholder="Imagen" ></input></br>
                        <label for="price">Precio:</label><input id="price" type="text" name="price" value="' . $fila['price'] . '" placeholder="Precio" ></input></br>
                        <label for="valoration">Valoration:</label><input id="direcion" type="text" name="valoration" value="' . utf8_encode($fila['valoration']) . '" placeholder="Valoracion" ></input></br>
                        <label for="stock">Stock:</label><input id="stock" type="text" name="stock" value="' . $fila['stock'] . '" placeholder="Stock" ></input></br>
                        <label for="editorial">Editorial:</label><input id="editorial" type="text" name="editorial" value="' . utf8_encode($fila['editorial']) . '" placeholder="Editorial" ></input></br>
                        <label for="n_paginas">Numero Paginas:</label><input id="n_paginas" type="text" name="n_paginas" value="' . utf8_encode($fila['n_paginas']) . '" placeholder="Numero Paginas" ></input></br>
                        <label for="edition">edition:</label><input id="edition" type="text" name="edition" value="' . utf8_encode($fila['edition']) . '" placeholder="Edicion" ></input></br>
                        <label for="novedad">novedad:</label><input id="novedad" type="text" name="novedad" value="' . utf8_encode($fila['novedad']) . '" placeholder="Novedad" ></input></br>
                        <label for="alt">alt:</label><input id="alt" type="text" name="alt" value="' . utf8_encode($fila['alt']) . '" placeholder="alt" ></input></br>
                        <label for="descripcion">Descripcion:</label><textarea rows="15" cols="48" name="descripcion">'.$descripcion.'</textarea></br>
                        ');
?>