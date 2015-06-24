<?php /**
* @author Andreu Sanz Miedes y Aida Dahdah Castelló
* @author asanzm.sanz@gmail.com, aidadahdah@gmail.com
* @copyright 2015 PROYECTO FINAL
* @version 1.0
*/

final class mHome extends Model
{
    
    
    
    function __construct($params)
    {
        parent::__construct($params);
        $this->db       = DB::singleton();
        // a litle prove in--->out
        $this->data_out = $params;
    }
    function get_out()
    {
        return $this->data_out;
    }
  /**
    * 
    * @return esta función se encarga de mostrar los libros masvisitados
    * 
    */
function masvisitados()
  {
  try
    {
    $no = 'no';
    $sql = "SELECT id_libro,imagen,alt,description,price,valoration,stock,edi.nombre,n_paginas,edition,lib.nombre,aut.nombre as 'nombre autor',aut.apellidos
 FROM libros lib INNER JOIN  editorial edi on lib.editorial = edi.id_editorial 
 inner join libros_autor la on lib.id_libro = la.Libros_id_libro 
 inner join autor aut on la.Autor_id_autor = aut.id_autor where lib.novedad = ?";
    $query = $this->db->prepare($sql);
    $query->bindParam(1, $no);
    $query->execute(); //fetch per rol
    if ($query->rowCount() > 0)
      {
      $aaa = '<div id="titulotira">Mas visitados!</div>
              <div id="libros">';
      while ($fila = $query->fetch(PDO::FETCH_ASSOC))
        {
        $idlib = $fila['id_libro'];
        $alt = $fila['alt'];
        /**
       * @return aquí realizamos un include al fichero generarlibro.php,el cual contiene toda la estructura
       * de los libros.
       */
        include 'generarlibro.php';
        $form = '<form class="registre" display="none"  name="' . 'form' . $idlib . '" method="post" accept-charset="UTF-8" action="' . APP_W . 'gestionar/gestionarlibros">"';
        $aaa.= $form;
        $datos = '"<input type="text" style="display:none;" name="id" value="' . $fila['id_libro'] . '"></label></form></div>';
        $aaa.= $datos;
        }

      $aaa.= "</div>";
      $_SESSION['homeconcat'] = $aaa;
      return $aaa;
      }
      else
      {
      $bbb = "No has realizado ninguna compra";
      $_SESSION['home'] = $bbb;
      return FALSE;
      }
    }

  catch(PDOException $e)
    {
    echo "Error:" . $e->getMessage();
    }
  }

 
  /**
    * @return esta función se encarga de mostrar los otras sugerencias de libros
    */
function otrasugerencias()
  {
  try
    {
    $no = 'sn';
    $sql = "SELECT id_libro,imagen,alt,description,price,valoration,stock,edi.nombre,n_paginas,edition,lib.nombre,aut.nombre as 'nombre autor',aut.apellidos
 FROM libros lib INNER JOIN  editorial edi on lib.editorial = edi.id_editorial 
 inner join libros_autor la on lib.id_libro = la.Libros_id_libro 
 inner join autor aut on la.Autor_id_autor = aut.id_autor where lib.novedad = ?";
    $query = $this->db->prepare($sql);
    $query->bindParam(1, $no);
    $query->execute(); //fetch per rol
    if ($query->rowCount() > 0)
      {
      $aaa = '<div id="titulotira">Otras sugerencias!</div>
              <div id="libros">';
      while ($fila = $query->fetch(PDO::FETCH_ASSOC))
        {
        $idlib = $fila['id_libro'];
        $alt = $fila['alt'];
          /**
       * @return aquí realizamos un include al fichero generarlibro.php,el cual contiene toda la estructura
       * de los libros.
       */
        include 'generarlibro.php';
        $form = '<form class="registre" display="none"  name="' . 'form' . $idlib . '" method="post" accept-charset="UTF-8" action="' . APP_W . 'gestionar/gestionarlibros">"';
        $aaa.= $form;
        $datos = '"<input type="text" style="display:none;" name="id" value="' . $fila['id_libro'] . '"></label></form></div>';
        $aaa.= $datos;
        }

      $aaa.= "</div>";
      $_SESSION['homeconcat'] = $aaa;
      return $aaa;
      }
      else
      {
      $bbb = "No has realizado ninguna compra";
      $_SESSION['home'] = $bbb;
      return FALSE;
      }
    }

  catch(PDOException $e)
    {
    echo "Error:" . $e->getMessage();
    }
  }
   /**
    * @return esta función se encarga de mostrar los libros que son novedad.
    */
function gestionarhome()
  {
  try
    {
    $concat = $this->masvisitados();
    $concat2 = $this->otrasugerencias();
    $resultado = 'si';
    $sql = "SELECT id_libro,alt,imagen,description,price,valoration,stock,edi.nombre,n_paginas,edition,lib.nombre,aut.nombre as 'nombre autor',aut.apellidos
 FROM libros lib INNER JOIN  editorial edi on lib.editorial = edi.id_editorial 
 inner join libros_autor la on lib.id_libro = la.Libros_id_libro 
 inner join autor aut on la.Autor_id_autor = aut.id_autor where lib.novedad = ?";
    $query = $this->db->prepare($sql);
    $query->bindParam(1, $resultado);
    $query->execute(); //fetch per rol
    if ($query->rowCount() > 0)
      {
      $aaa = '<div id="titulotira">Novedades!</div>
      		  <div id="general">
              <div id="libros">';
      while ($fila = $query->fetch(PDO::FETCH_ASSOC))
        {
        $idlib = $fila['id_libro'];
        $alt = $fila['alt'];
             /**
       * @return aquí realizamos un include al fichero generarlibro.php,el cual contiene toda la estructura
       * de los libros.
       */
        include 'generarlibro.php';
        $form = '<form class="registre" display="none"  name="' . 'form' . $idlib . '" method="post" accept-charset="UTF-8" action="' . APP_W . 'gestionar/gestionarlibros">"';
        $aaa.= $form;
        $datos = '"<input type="text" style="display:none;" name="id" value="' . $fila['id_libro'] . '"></label></form></div>';
        $aaa.= $datos;
        }

      $aaa.= "</div>";
      $aaa.= $concat;
      $aaa.= $concat2;
      $aaa.= "</div>";
      $_SESSION['homeconcat'] = $aaa;
      return $aaa;
      }
      else
      {
      $bbb = "No has realizado ninguna compra";
      $_SESSION['home'] = $bbb;
      return FALSE;
      }
    }

  catch(PDOException $e)
    {
    echo "Error:" . $e->getMessage();
    }
  }
  
}