<?php

$perfil.= ( '<input id="nombre" type="text" name="nombre" value="'.utf8_encode($fila['nombre']).'"  placeholder="Nombre" disabled></input></br>
                        <label for="apelllidos">Apellidos:</label><input id="apellidos" type="text" name="apellidos" value="'.utf8_encode($fila['apellidos']).'"  placeholder="Apellidos" disabled></input></br>
                        <label for="nif">Nif:</label><input id="nif" type="text" name="nif" value="'.$fila['nif'].'" placeholder="Nif" disabled></input></br>
                        <label for="email">Email:</label><input id="email" type="text" name="email" value="'.utf8_encode($fila['email']).'" placeholder="Email" ></input></br>
                        <label for="poblacion">Poblacion:</label><input id="poblacion" type="text" name="poblacion" value="'.utf8_encode($fila['poblacion']).'" placeholder="Poblacion" ></input></br>
                        <label for="cpostal">Código postal:</label><input id="cpostal" type="text" name="cpostal" value="'.$fila['codigo_postal'].'" placeholder="Código postal" ></input></br>
                        <label for="direccion">Direccion:</label><input id="direcion" type="text" name="direccion" value="'.utf8_encode($fila['direccion']).'" placeholder="Direccion" ></input></br>
                        <label for="telefono">Teléfono:</label><input id="telefono" type="text" name="telefono" value="'.$fila['telefono'].'" placeholder="telefono" ></input></br>
                        <label for="nusuario">Nombre de usuario:</label><input id="nusuario" type="text" name="nusuario" value="'.utf8_encode($fila['nombre_usuario']).'" placeholder="Nombre de usuario" ></input></br>
                        <label for="password">Contraseña:</label><input id="password" type="password" name="password" value="" placeholder="Contraseña" ></input></br>
                        <label for="rpassword">Repetir contraseña:</label><input id="rpassword" type="password" name="rpassword" value="" placeholder="Repetir contraseña" ></input></br>
                        ');
?>
