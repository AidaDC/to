<?php /**
* @author Andreu Sanz Miedes y Aida Dahdah Castelló
* @author asanzm.sanz@gmail.com, aidadahdah@gmail.com
* @copyright 2015 PROYECTO FINAL
* @version 1.0
*/

 class mGestionar extends Model
{

 function __construct(){parent::__construct();}

      /**
    * @return esta función se encarga de retornar el id del usuario conectado actualmente.
    */
 function get_id_user()
  {
  try
    {
    $nusuario = $_SESSION['user'];
    $sql = "SELECT id_usuario FROM usuarios WHERE nombre_usuario=? ";
    $query = $this->db->prepare($sql);
    $query->bindParam(1, $nusuario);
    $query->execute(); //fetch per rol
    if ($query->rowCount() == 1)
      {
      $fetch = $query->fetchColumn();
      $_SESSION['id_user'] = $fetch;
      $res = $_SESSION['id_user'];
      return $res;
      }
      else
      {
      $_SESSION['id_user'] = "Error";
      return FALSE;
      }
    }

  catch(PDOException $e)
    {
    echo "Error:" . $e->getMessage();
    }
  }


  function get_genero($genero)
  {
  try
    {
    $sql = "SELECT id_genero FROM genero WHERE nombre=? ";
    $query = $this->db->prepare($sql);
    $query->bindParam(1, $genero);
    $query->execute(); //fetch per rol
    if ($query->rowCount() == 1)
      {
      $fetch = $query->fetchColumn();
      return $fetch;
      }
      else
      {
      $_SESSION['genero'] = "Error";
      return FALSE;
      }
    }

  catch(PDOException $e)
    {
    echo "Error:" . $e->getMessage();
    }
  }


      /**
    * 
    * @return esta función se encarga de mostrar las compras realizadas asi como sus detalles.
    * 
    */   
function gestionar()
  {
  try
    {
    $resultado = $this->get_id_user();
    $sql = "SELECT nombre_usuario,direccion,tpob.poblacion,nif,c.id_compra,c.p_final,c.estados,c.fecha_compra 
FROM compra c INNER JOIN usuarios usu on c.Usuarios_id_usuario = usu.id_usuario 
inner join poblacion tpob on usu.poblacion = tpob.id_poblacion 
where usu.poblacion = tpob.id_poblacion && usu.id_usuario = ?";
    $query = $this->db->prepare($sql);
    $query->bindParam(1, $resultado);
    $query->execute(); //fetch per rol
    if ($query->rowCount() > 0)
      {
      $aaa = "<table id="."tabla"." border=1>";
      $aaa.= ("<tr>" . "<td>" . "id_compra" . "</td>
              <td>" . "Precio Final" . "</td>
              <td>" . "Estado" . "</td>
              <td>" . "Fecha de compra" . "</td><td>
              Nombre de usuario" . "</td>
              <td>" . "Población" . "</td>
              <td>" . "nif" . "</td>
              <td>" . "Detalles" . "</td></tr>");
      while ($fila = $query->fetch(PDO::FETCH_ASSOC))
        {
        $aaa.= ("<tr>" . "<td>" . $fila['id_compra'] . "</td>" . "<td>" . $fila['p_final'] . "</td>" . "<td>" . utf8_encode($fila['estados']) . "</td>
            <td>" . $fila['fecha_compra'] . "</td>" . "<td>" . utf8_encode($fila['nombre_usuario']) . "</td>" . "<td>" . utf8_encode($fila['poblacion']) . "</td>" . "<td>" . $fila['nif'] . "</td>
            <td id='masdet'>Más detalles</td></tr>");
        }

      $aaa.= "</table>";
      $sql = "SELECT c.id_compra,lib.nombre,ISBN,idioma,description,price,valoration,edi.nombre as editorial,n_paginas,edition,clib.cantidad
FROM libros lib INNER JOIN compra_libros clib on lib.id_libro = clib.Libros_id_libro 
inner join compra c on clib.Compra_id_compra = c.id_compra inner join editorial edi on lib.editorial = edi.id_editorial 
where c.Usuarios_id_usuario = ?";
      $query = $this->db->prepare($sql);
      $query->bindParam(1, $resultado);
      $query->execute(); //fetch per rol
      if ($query->rowCount() > 0)
        {
        $aaa.= '<table id="detalles" style="display:none">';
        $aaa.= ("<tr>" . "<td>" . "Nº Compra" . "</td>". "<td>" . "Nombre" . "</td>
      <td>" . "ISBN" . "</td>
      <td>" . "Idioma" . "</td>
      <td>" . "Descripcion" . "</td>
      <td>" . "Precio" . "</td>
      <td>" . "Valoración" . "</td>
      <td>" . "Editorial" . "</td>
      <td>" . "Nª páginas" . "</td>
      <td>" . "Edición" . "</td>
      <td>" . "Cantidad" . "</td>
      </tr>");
        while ($fila = $query->fetch(PDO::FETCH_ASSOC))
          {
          $aaa.= ("<td>" . utf8_encode($fila['id_compra']) . "<td>" . utf8_encode($fila['nombre']) . "</td>" . "<td>" . $fila['ISBN'] . "</td>
            <td>" . $fila['idioma'] . "</td>
            <td>" . utf8_encode($fila['description']) . "</td>
            <td>" . utf8_encode($fila['price']) . "</td>" . "<td>" . $fila['valoration'] . "</td>" . "<td>" . utf8_encode($fila['editorial']) . "</td>" . "<td>" . $fila['n_paginas'] . "</td>" . "<td>" . utf8_encode($fila['edition']) . "</td>" . "<td>" . $fila['cantidad'] . "</td></tr>");
          }

        $aaa.= '</table>';
        }
      $_SESSION['libros'] = "";
      $_SESSION['perfil'] = "";
      $_SESSION['todoslibros']="";
       $_SESSION['gestionargenero'] = "";
      $_SESSION['compras'] = $aaa;
      return $aaa;
      }
      else
      {
      $_SESSION['libros'] = "";
      $_SESSION['perfil'] = "";
       $_SESSION['gestionargenero'] = "";
      $_SESSION['todoslibros']="";
   $_SESSION['gestionarperfilibros'] = "";
      $bbb = "<p class=vacio>No has realizado ninguna compra</p>";
      $_SESSION['compras'] = $bbb;
      return $aaa;
      }
    }
  catch(PDOException $e)
    {
    echo "Error:" . $e->getMessage();
    }
  }

     /**
    * 
    * @return esta función se encarga de retornar todos los usuarios registrados en nuestra aplicación.
    * 
    */
 function gestionarusuarios()
  {
  try
    {
    $sql = "SELECT id_usuario,nombre_usuario,direccion,codigo_postal,email,telefono,tpob.poblacion,password,rol,nif,fecha_creacion FROM  usuarios usu inner join poblacion tpob on usu.poblacion = tpob.id_poblacion where usu.poblacion = tpob.id_poblacion";
    $query = $this->db->prepare($sql);
    $query->execute(); //fetch per rol
    $aaa = "<table id="."tabla"." border=1>";
    $aaa.= ('<tr>' . '<td>' . 'id' . '</td>' . '<td>' . 'Nombre usuario' . '</td>' . '<td>' . 'Direccion' . '</td>' . '<td>' . 'Código Postal' . '</td>' . '<td>' . 'Email' . '</td>' . '<td>' . 'Teléfono' . '</td>' . '<td>' . 'Población' . '</td>' . '<td>' . 'Nif' . '</td>' . '<td>' . 'Fecha de creación' . '</td>' . '<td>' . 'Eliminar Usuario' . '</td>' . '</tr>');
    $i = 0;
    while ($fila = $query->fetch(PDO::FETCH_ASSOC))
      {
      $idlib . $i = $fila['id_usuario'];
      $form = '"<form class="registre"  name="' . 'form' . $idlib . $i . '" method="post" accept-charset="UTF-8" action="' . APP_W . 'eliminar/eliminar">"';
      $aaa.= $form;
      $aaa.= ('<tr><td>' . utf8_encode($fila['id_usuario']) . '</td><td>' . $fila['nombre_usuario'] . '</td><td>' . utf8_encode($fila['direccion']) . '</td><td>' . $fila['codigo_postal'] . '</td><td>' . $fila['email'] . '</td>
            <td>' . $fila['telefono'] . '</td><td>' . utf8_encode($fila['poblacion']) . '</td><td>' . $fila['nif'] . '</td><td>' . $fila['fecha_creacion'] . '</td><td>' . '<input type="submit" style="width:100%;" value="borrar" name="' . $idlib . $i . '">' . '</td></tr>');
      $input = '"<input type="text" style="display:none;" name="id" value="' . $idlib . $i . '"></label></form>"';
      $aaa.= $input;
      $i++;
      }

    $aaa.= "</table>";
    $_SESSION['libros'] = "";
    $_SESSION['perfil'] = "";
    $_SESSION['todoslibros']="";
     $_SESSION['gestionargenero'] = "";
   $_SESSION['gestionarperfilibros'] = "";
    $_SESSION['usuarios'] = $aaa;
    if ($query->rowCount() == 1)
      {
      return $aaa;
      }
      else
      {
     $_SESSION['libros'] = "";
      $_SESSION['perfil'] = "";
       $_SESSION['gestionargenero'] = "";
      $_SESSION['todoslibros']="";
   $_SESSION['gestionarperfilibros'] = "";
      return $aaa;
      }
    }

  catch(PDOException $e)
    {
    echo "Error:" . $e - s > getMessage();
    }
  }

     /**
    * 
    * @return esta función se encarga de gestionar los libros,es decir nos muestra el libro seleccionado
    * además de otras sugerencias.
    */
  function gestionarlibros($idlib)
  {
  try
    {
    $sql = "SELECT id_libro,lib.nombre as 'nombrelibro',imagen,description,ISBN,price,idioma,valoration,stock,edi.nombre,n_paginas,edition,lib.nombre,aut.nombre as 'nombre autor',aut.apellidos
 FROM libros lib INNER JOIN  editorial edi on lib.editorial = edi.id_editorial 
 inner join libros_autor la on lib.id_libro = la.Libros_id_libro 
 inner join autor aut on la.Autor_id_autor = aut.id_autor where lib.id_libro = ?";
    $query = $this->db->prepare($sql);
    $query->bindParam(1, $idlib);
    $query->execute(); //fetch per rol
    if ($query->rowCount() > 0)
      {
      while ($fila = $query->fetch(PDO::FETCH_ASSOC))
        {
        $idlib = $fila['id_libro'];
        $autor =  utf8_encode($fila['nombre autor']);
        $nom =  utf8_encode($fila['nombrelibro']);
        $aaa.= ('
<div id="titulotira">' . utf8_encode($fila['nombre']) . '</div>        
<div id="librop">
<div id="izqp"><img id="imagen" src="' . $fila['imagen'] . '"></div>
<div id="derp"><div id="descrip"><p>Nombre: ' . utf8_encode($fila['nombre']) . '</p>
<p>Autor: ' . utf8_encode($fila['nombre autor']) . ' ' . utf8_encode($fila['apellidos']) . '</p>
<p>ISBN: ' . $fila['ISBN'] . '</p>
<p >Precio: ' . $fila['price'] . '</p>');
        if ($fila['stock'] == 0)
          {
            /**
       * @return aquí realizamos un include al fichero stock0,el cual contiene toda la estructura
       * al estar el stock del libro a 0
       */
          include 'stock0.php';
          }
          else
          {
          /**
         * @return aquí realizamos un include al fichero stock!0,el cual contiene toda la estructura
         * al tener un libro stock
         */
          include 'stock!0.php';
          }
        }

      $aaa.= "</div>";
      $sql = "SELECT id_libro,imagen,description,price,idioma,valoration,stock,edi.nombre,n_paginas,edition,lib.nombre,aut.nombre as 'nombre autor',aut.apellidos
 FROM libros lib INNER JOIN  editorial edi on lib.editorial = edi.id_editorial 
 inner join libros_autor la on lib.id_libro = la.Libros_id_libro 
 inner join autor aut on la.Autor_id_autor = aut.id_autor where aut.nombre = ?  && lib.nombre != ? LIMIT 3";
      $query = $this->db->prepare($sql);
      $query->bindParam(1, $autor);
      $query->bindParam(2, $nom);
      $query->execute();
      if ($query->rowCount() > 0)
        {
        $aaa.= '<div id="titulotira">Otras sugerencias!</div>
              <div id="libros">';
        while ($fila = $query->fetch(PDO::FETCH_ASSOC))
          {
          $idlib = $fila['id_libro'];
          $aaa.= ('
<div id="libro">
<div id="izq"><img id="imagen" src="' . $fila['imagen'] . '"></div>
<div id="der"><div id="descrip"><p>Nombre:  ' . utf8_encode($fila['nombre']) . '</p>
  <p>Autor:' . utf8_encode($fila['nombre autor']) . ' ' . utf8_encode($fila['apellidos']) . '</p>
  <p >Precio:  ' . $fila['price'] . '</p>
  <p>Stock:  ' . $fila['stock'] . '</p></div>
<div id="der2">
<form id="comp" name="' . 'form' . $idlib . '" method="post" accept-charset="UTF-8" action="' . APP_W . 'gestionar/gestionarlibros"><input id="comp" type="submit" value="Más  Información" name="enviar">
</div>
</div> <!-- final del div der -->');
          $form = '<form class="registre" display="none"  name="' . 'form' . $idlib . '" method="post" accept-charset="UTF-8" action="' . APP_W . 'gestionar/gestionarlibros">"';
          $aaa.= $form;
          $input = '"<input type="text" style="display:none;" name="id" value="' . $fila['id_libro'] . '"></label></form></div>';
          $aaa.= $input;
          }

        $aaa.= "</div>";
        }
      $_SESSION['usuarios'] = "";
      $_SESSION['compras'] = "";
      $_SESSION['perfil'] = "";
       $_SESSION['gestionargenero'] = "";
      $_SESSION['todoslibros']="";
      $_SESSION['libros'] = $aaa;
      return TRUE;
      }
      else
      {
        $_SESSION['libros'] = "";
      $_SESSION['perfil'] = "";
      $_SESSION['todoslibros']="";
       $_SESSION['gestionargenero'] = "";
   $_SESSION['gestionarperfilibros'] = "";
      return FALSE;
      }
    }

  catch(PDOException $e)
    {
    echo "Error:" . $e->getMessage();
    }
  }
  /**
    * 
    * @return esta función se encarga de gestionar el perfil de cada usuario.
    */
  function gestionarperfil()
  {
  try
    {
    $result = $this->get_id_user();
    $sql = "SELECT nombre,apellidos,nif,email,tpob.poblacion,codigo_postal,direccion,telefono,nombre_usuario,password
            FROM usuarios usu inner join poblacion tpob on usu.poblacion = tpob.id_poblacion where usu.poblacion = tpob.id_poblacion && usu.id_usuario = ? ";
    $query = $this->db->prepare($sql);
    $query->bindParam(1, $result);
    $query->execute();
    $perfil.= '<div id="principal">
   <div id="dpersonales">' . '"<form class="registre" id="formregister" method="post" action="' . APP_W . 'modificar/modificar" accept-charset="UTF-8">
    </br><p id="title"> Datos Personales</p></br> <label for="nombre">Nombre:</label>';
    while ($fila = $query->fetch(PDO::FETCH_ASSOC))
      {
      /**
       * @return aquí realizamos un include al fichero perfil.php,el cual contiene toda la estructura
       * del perfil de usuario.
       */
      include 'perfil.php';
      }

    $perfil.= '<input class="submit" id="mod" type="submit" value="Modificar datos!">';
    $perfil.= "</form></div></div>";
    $_SESSION['usuarios'] = "";
    $_SESSION['compras'] = "";
    $_SESSION['libros'] = "";
   $_SESSION['gestionarperfilibros'] = "";
    $_SESSION['gestionargenero'] = "";
    $_SESSION['perfil'] = $perfil;
    $_SESSION['todoslibros']="";
    if ($query->rowCount() == 1)
      {
      $fetch = $query->fetchColumn();
      $_SESSION['od'] = $fetch;
      return TRUE;
      }
      else
      {

      $_SESSION['od'] = "Error";
      return FALSE;
      }
    }

  catch(PDOException $e)
    {
    echo "Error:" . $e->getMessage();
    }
  }

  function gestionarperfilibros($id)
  {
    try
    {
    $sql = "SELECT id_libro,lib.nombre,imagen,description,ISBN,price,idioma,valoration,stock,n_paginas,edition,edi.nombre as 'editorial',alt,novedad
 FROM libros lib INNER JOIN  editorial edi on lib.editorial = edi.id_editorial where lib.id_libro =  ?";
    $query = $this->db->prepare($sql);
    $query->bindParam(1, $id);
    $query->execute();
    $perfil= '<div id="principal">
   <div id="dpersonales">' . '"<form class="registre" id="formregister" method="post" action="' . APP_W . 'modificar/modificarlibro" accept-charset="UTF-8">
    </br><p id="title"> Modificar los datos del Libro</p></br> <label for="isbn">ISBN:</label>';
    while ($fila = $query->fetch(PDO::FETCH_ASSOC))
      {

      /**
       * @return aquí realizamos un include al fichero perfil.php,el cual contiene toda la estructura
       * del perfil de usuario.
       */
      include 'perfil2.php';
      }

    $perfil.= '<input class="submit" id="mod" type="submit" value="Modificar datos!">';
    $perfil.= "</form></div></div>";
    $_SESSION['usuarios'] = "";
    $_SESSION['compras'] = "";
    $_SESSION['libros'] = "";
    $_SESSION['todoslibros']="";
     $_SESSION['gestionargenero'] = "";
    $_SESSION['gestionarperfilibros'] = $perfil;
    if ($query->rowCount() == 1)
      {
      $fetch = $query->fetchColumn();
      $_SESSION['od'] = $fetch;
      return TRUE;
      }
      else
      {
      
   $_SESSION['gestionarperfilibros'] = "";
      $_SESSION['od'] = "Error";
      return FALSE;
      }
    }

  catch(PDOException $e)
    {
    echo "Error:" . $e->getMessage();
    }
  }

function gestionlibros()
  {
  try
    {
    $sql = "SELECT id_libro,lib.nombre,imagen,description,ISBN,price,idioma,valoration,stock,n_paginas,edition,edi.nombre as 'editorial',alt,novedad
 FROM libros lib INNER JOIN  editorial edi on lib.editorial = edi.id_editorial ";
    $query = $this->db->prepare($sql);
    $query->bindParam(1, $idlib);
    $query->execute(); //fetch per rol
     $aaa = "<table id="."tabla3"." border=1 style='max-heigth:150px'> ";
    $aaa.= ('<tr><td>' . 'Nombre Libro' . 
    '</td>' . '<td>' . 'ISBN' . '</td>' .  
    '<td>' . 'Imagen' . '</td>' . '<td>' . 'Descripción' . '</td>' . '<td>' .
    'Precio' . '</td>' . '<td>' . 'Valoración' . '</td>' . '<td>' . 'Stock' . '</td>' .
    '<td>' . 'Editorial' . '</td>' . '<td>' . 'Número Páginas' . '</td>' .
    '<td>' . 'Edición' . '</td>' . '<td>' . 'novedad' . '</td>'. '<td>' . 'alt' . '</td>'.    
    '<td>' . 'Modificar Libro' . '</td>' . '</tr>');

 if ($query->rowCount() >= 1)
      {
    $i = 0;
    while ($fila = $query->fetch(PDO::FETCH_ASSOC))
      {
      $idlib . $i = $fila['id_libro'];
      $ext= substr(utf8_encode($fila['description']),0,94);
      $ext.=" ...";
  
      $form = '"<form class="registre"  name="' . 'form' . $idlib . $i . '" method="post" accept-charset="UTF-8" action="' . APP_W . 'gestionar/gestionarperfilibros">"';
      $aaa.= $form;
      $aaa.= ('<tr></td><td>' . utf8_encode($fila['nombre']) . 
        '</td><td>' . utf8_encode($fila['ISBN']) . 
        '</td><td>' . utf8_encode($fila['imagen']) . 
        '</td><td>' . $ext .
        '</td><td>' . utf8_encode($fila['price']) . 
        '</td><td>' . utf8_encode($fila['valoration']) . 
        '</td><td>' . utf8_encode($fila['stock']) . 
        '</td><td>' . utf8_encode($fila['editorial']) . 
        '</td><td>' . utf8_encode($fila['n_paginas']) . 
        '</td><td>' . utf8_encode($fila['edition']) . 
        '</td><td>' . utf8_encode($fila['novedad']) . 
        '</td><td>' . utf8_encode($fila['alt']) .     

        '</td><td>' . '<input type="submit" style="width:100%;" value="Modificar" name="' . $idlib . $i . '">' . '</td></tr>');
      $input = '<input type="text" style="display:none;" name="id" value="' . $idlib . $i . '"></label></form>';
      $aaa.= $input;
      $i++;
      }
      
    $aaa.= "</table>";

    $aaa.=('<form class="registre6" name="insertar" method="post" accept-charset="UTF-8" action="' . APP_W . 'lib">
    <input id="ilibro" style="height: 106px;width: 20%;
" type="submit" name="id" value="Insertar un nuevo libro">
    </form>');
  
    $_SESSION['libros'] = "";
    $_SESSION['perfil'] = "";
    $_SESSION['usuarios'] = "";
    $_SESSION['todoslibros']=$aaa;
     $_SESSION['gestionargenero'] = "";
   $_SESSION['gestionarperfilibros'] = "";
      return TRUE;
      }
      else
      {
      $_SESSION['todoslibros']="";
      return FALSE;
      }
    }
  // 
  catch(PDOException $e)
    {
    echo "Error:" . $e->getMessage();
    }
  }




  function gestionargenero($genero)
  {
  try
    {
$resultado = $this->get_genero($genero);
$cont=0;
$sql = "SELECT id_libro, alt, imagen, description, price, valoration, stock, edi.nombre, n_paginas, edition, lib.nombre, aut.nombre AS  'nombre autor', aut.apellidos
FROM libros lib
INNER JOIN editorial edi ON lib.editorial = edi.id_editorial
INNER JOIN libros_autor la ON lib.id_libro = la.Libros_id_libro
INNER JOIN autor aut ON la.Autor_id_autor = aut.id_autor
INNER JOIN libros_generos libgen ON lib.id_libro = libgen.Libros_id_libro
INNER JOIN genero gen ON libgen.Genero_id_genero = gen.id_genero
WHERE gen.id_genero =  ?";
    $query = $this->db->prepare($sql);
    $query->bindParam(1, $resultado);
    $query->execute(); //fetch per rol
    if ($query->rowCount() > 0)
      {
      $aaa = '<div id="titulotira">Categoría: '.$genero.'</div>
            <div id="general">
              <div id="libros">';
      while ($fila = $query->fetch(PDO::FETCH_ASSOC))
        {
        $idlib = $fila['id_libro'];
        $alt = $fila['alt'];
        if($cont==3){
        }else{
        include 'generarlibro.php';
        $form = '<form class="registre" display="none"  name="' . 'form' . $idlib . '" method="post" accept-charset="UTF-8" action="' . APP_W . 'gestionar/gestionarlibros">"';
        $aaa.= $form;
        $datos = '"<input type="text" style="display:none;" name="id" value="' . $fila['id_libro'] . '"></label></form></div>';
        $aaa.= $datos;
        $cont++;
        }
             /**
       * @return aquí realizamos un include al fichero generarlibro.php,el cual contiene toda la estructura
       * de los libros.
       */
        }

      $aaa.= "</div>";
      $aaa.= $concat;
      $aaa.= $concat2;
      $aaa.= "</div>";
        $_SESSION['usuarios'] = "";
      $_SESSION['compras'] = "";
      $_SESSION['perfil'] = "";
      $_SESSION['todoslibros']="";
      $_SESSION['gestionargenero'] = $aaa;
      return $aaa;
      }
      else
      {
      $bbb = "No hay ningun libro con esta categoria";
      $_SESSION['gestionargenero'] = $bbb;
      return $bbb;
      }
    }

  catch(PDOException $e)
    {
    echo "Error:" . $e->getMessage();
    }
  }
}

