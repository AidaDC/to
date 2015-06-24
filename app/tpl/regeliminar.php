<section>
    <h2>Eliminar Usuario</h2>
    <div class="formreg">
                <form class="registre" name="formregister" method="post" action="<?= APP_W; ?>eliminar/eliminar">
                    <div id="hello"></div><!-- this is to show Hello name message -->
                    <label for="nusuario">Nombre de usuario: <input type="text" name="nusuario" value="" placeholder="Introduce un nombre de usuario" required></label></br></br>
                    <label for="password">Contraseña: <input type="password" name="password" value=""  placeholder="Introduce una contraseña"required></label></br></br>
                    <input id="no" type="submit" value="Eliminar" id="regsend">
                </form>
           
              </div>
  </section>