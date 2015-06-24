<?php /**
* @author Andreu Sanz Miedes y Aida Dahdah Castelló
* @author asanzm.sanz@gmail.com, aidadahdah@gmail.com
* @copyright 2015 PROYECTO FINAL
* @version 1.0
*/

 class mCarrito extends Model
{

 function __construct(){parent::__construct();}


     /**
    * 
    * @return esta función se encarga de retornar el id del usuario conectado actualmente.
    * 
    */
  function get_id_user(){
      
           try {
            $nusuario= $_SESSION['user'];
            $sql   = "SELECT id_usuario FROM usuarios WHERE nombre_usuario=? ";
            $query = $this->db->prepare($sql);
            $query->bindParam(1, $nusuario);
            $query->execute(); //fetch per rol

            if ($query->rowCount() == 1) {
                $fetch           = $query->fetchColumn();
                $_SESSION['id_user'] = $fetch;
                $res =   $_SESSION['id_user'];
                return $res;
            } else {
                 var_dump("error");
            die;
                $_SESSION['id_user'] = "Error";
                return FALSE;
            }
        }
        catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
        }
    }   


  public function obtener_fecha()
  {
  $hoy = date("d/m/y");
  return $hoy;
  }


    /**
    * 
    * @return esta función se encarga de insertar la compra, además de asociar los 
    * libros a la misma compra y actualizando el stock de los libros comprados.
    */
  function gestionarcarrito($precio, $id1, $id2, $id3, $id4, $id5, $id6, $id7, $id8, $id9,$tarjetacredito)
  {
  try
    {
    $result = $this->get_id_user();
    $data = $this->obtener_fecha();
    $estados = "Aceptada";
    $sql = "INSERT INTO compra (p_final,estados,numero_tarjeta,fecha_compra,Usuarios_id_usuario) VALUES (";
    $vector = array(
      $precio,
      $estados,
      $tarjetacredito,
      $data,
      $result
    );
    $max = sizeof($vector);
    for ($i = 1; $i <= $max; $i++)
      {
      if ($i != $max)
        {
        $sql.= "'" . $vector[$i - 1] . "',";
        }
        else
        {
        $sql.= "'" . $vector[$i - 1] . "')";
        }
      }

    $query = $this->db->prepare($sql);
    $query->execute();
    if ($query->rowCount() == 1)
      {
      $sql = "SELECT id_compra FROM compra ORDER BY id_compra DESC LIMIT 1";
      $query = $this->db->prepare($sql);
      $query->execute();
      $fetch = $query->fetchColumn();
      /**
       * @return aquí realizamos un include del fichero structlibros.php, el cual contiene toda la estructura
       * de añadir el libro a la compra y actualizar su stock *
       */
      include 'structlibros.php';

      $_SESSION['carrito'] = Array();
      $_SESSION['carrito_final'] = "La compra se ha realizado correctamente";
      return TRUE;
      }
      else
      {
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
    * @return esta función se encarga de añadir el libro seleccionado al carrito.
    *
    */
function carrito($id, $nombre, $precio, $cantidad)
  {
  try
    {
    $new = array(
      $id,
      $nombre,
      $precio,
      $cantidad
    );
    if (in_array($new, $_SESSION['carrito']))
      {
      $i = 0;
      $x = 1;
      $aaa = '<table id="tabla2" border=1><tr><td>Id libro</td><td>Nombre</td><td>Precio</td><td>Cantidad</td></tr><tr>';
      $aaa.= '<form id="comp" name="' . 'form' . $nombre . '" method="post" accept-charset="UTF-8" action="' . APP_W . 'carrito/gestionarcarrito">';
      include 'buclecarrito.php';

      }
      else
      {
      array_push($_SESSION['carrito'], $new);
      $i = 0;
      $x = 1;
      $p_final = 0;
      $aaa = '<table id="tabla2" border=1><tr><td>Id libro</td><td>Nombre</td><td>Precio</td><td>Cantidad</td></tr><tr>';
      $aaa.= '<form id="comp" name="' . 'form' . $nombre . '" method="post" accept-charset="UTF-8" action="' . APP_W . 'carrito/gestionarcarrito">';
      include 'buclecarrito.php';

      }

    return TRUE;
    }

  catch(PDOException $e)
    {
    echo "Error:" . $e - s > getMessage();
    }
  }


}

