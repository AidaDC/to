<?php /**
* @author Andreu Sanz Miedes y Aida Dahdah Castelló
* @author asanzm.sanz@gmail.com, aidadahdah@gmail.com
* @copyright 2015 PROYECTO FINAL
* @version 1.0
*/
	class mEliminar extends Model{


    /**
    * 
    * @return esta función se encarga de eliminar el usuario que seleccionemos,
    * desde el administrador
    */

 function eliminar($id)
  {
  try
    {
    $sql = "SELECT id_compra FROM compra WHERE Usuarios_id_usuario = ? ";
    $query = $this->db->prepare($sql);
    $query->bindParam(1, $id);
    $query->execute(); //fetch per rol
    if ($query->rowCount() == 1)
      {
    /**
    * 
    * @return Debido a las relaciones entre tablas,si el usuario dispone de alguna compra,
    *primero tendremos que eliminar en la tabla compra_libros,compra y finalmente usuarios.
    */
   
      $icom = $query->fetchColumn();
      $sql = "DELETE FROM compra_libros WHERE Compra_id_compra = ? ";
      $query = $this->db->prepare($sql);
      $query->bindParam(1, $icom);
      $query->execute();
      $sql = "DELETE FROM compra WHERE Usuarios_id_usuario = ? ";
      $query = $this->db->prepare($sql);
      $query->bindParam(1, $id);
      $query->execute();
      $sql = "DELETE FROM usuarios WHERE id_usuario = ? ";
      $query = $this->db->prepare($sql);
      $query->bindParam(1, $id);
      $query->execute();
      return TRUE;
      }
      else
      {
      $sql = "DELETE FROM usuarios WHERE id_usuario = ? ";
      $query = $this->db->prepare($sql);
      $query->bindParam(1, $id);
      $query->execute();
      return TRUE;
      }
    }

  catch(PDOException $e)
    {
    echo "Error:" . $e->getMessage();
    }
  }

		
	}
