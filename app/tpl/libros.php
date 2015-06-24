<section>
   <div id="principal">
   <div id="libros"> 
    <form class="registre3" id="formregister" method="post" action="<?= APP_W; ?>insert/insertlibro">
                         <p id="titulotira">Datos del Libro:</p><br><br>
                        <label for="isbn">ISBN:</label><input id="isbn" type="number" name="isbn" value="" maxlength="10"  placeholder="ISBN" required></input></br>
                        <label for="nombre">Nombre:</label><input id="nombre" type="text" name="nombre" value=""  placeholder="Nombre" required></input></br>
                        <label for="idioma">Idioma:</label><input id="idioma" type="text" name="idioma" value="" placeholder="Idioma" required></input></br>
                        <label for="imagen">Imagen:</label><input id="imagen" type="text" name="imagen" value="http://placehold.it/350x150" placeholder="Imagen" required disabled></input></br>
                        <label for="price">Precio:</label><input id="price" type="number" name="price" value="" placeholder="Precio" required></input></br>
                        <label for="valoration">Valoration:</label><input id="direcion" type="text" name="valoration" value="" placeholder="Valoracion" required></input></br>
                        <label for="stock">Stock:</label><input id="stock" type="number" name="stock" value="" placeholder="Stock" required></input></br>
                        <label for="editorial">Editorial:</label><input id="editorial" type="text" name="editorial" value="" placeholder="Editorial" required></input></br>
                        <label for="n_paginas">Numero Paginas:</label><input id="n_paginas" type="number" name="n_paginas" value="" placeholder="Numero Paginas" required></input></br>
                        <label for="edition">edition:</label><input id="edition" type="text" name="edition" value="" placeholder="Edicion" required></input></br>
                        <label for="novedad">novedad:</label><input id="novedad" type="text" name="novedad" value="si/no/sn" placeholder="Novedad" required></input></br>
                        <label for="alt">alt:</label><input id="alt" type="text" name="alt" value="" placeholder="alt" ></input></br>
                        <label for="descripcion">Descripcion:</label><textarea rows="15" cols="48" name="descripcion"></textarea></br>
    <input id="mods"  class="submit" type="submit" value="Inserta el Libro!"></div>
    </form>

   </div>
    </div> 
  </section>