<section>
   <div id="principal">
   <div id="dpersonales"> 
    <form class="registre2" id="formregister" method="post" action="<?= APP_W; ?>insert/insert">
      <div id="datos"></br><p id="title"> Datos Personales</p></br> 
 <input id="nombre" type="text" name="nombre"  placeholder="Nombre"></input>
    <label for="nombre"></label>
    <input id="apellidos" type="text" name="apellidos"  placeholder="Apellido"></input>
    <label for="apellidos"></label>
    <input type="text" name="dni" id="dni" value="" placeholder="Introduce un DNI">
    <label for="dni" id="ldni"></label>        
    <input type="email" id="email" name="email" placeholder="Introduce el Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"></input>
    <label for="email" id="lem"></label></div>
    <div id="datos2">
    <input type="text" id="poblacion" name="poblacion" value="" placeholder="Introduce una poblacion" >
    <label for="poblacion"></label>
    <input id="cpostal" type="text" name="cpostal"  placeholder="Introduce el código postal"></input>
    <label for="cpostal"></label>
    <input id="direccion" type="text" name="direccion"  placeholder="Introduce la direccion"></input>
    <label for="direccion"></label>  
    <input id="telefono" type="text" name="telefono"  placeholder="Introduce un teléfono"></input>
    <label for="telefono"></label></br></div> 
       <div id="datos"></br><p id="title"> Datos Usuario</p></br>
 <input id="nusuario" type="text" id="nusuario" name="nusuario"  placeholder="Introduce el nombre de usuario"></input> 
    <label for="nusuario" id="lnu"></label>
    <input id="password" type="password" name="password"   placeholder="Introduce la contraseña"></input> <label for="password"></label>
    <input id="rpassword" type="password" name="rpassword"  placeholder="Introduce nuevamente la contraseña"></input>    
    <label for="rpassword"></label></br><input class="submit" type="submit" value="Registrate!"></div>
    </form>

   </div>
    </div> 
  </section>