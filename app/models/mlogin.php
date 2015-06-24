<?php /**
* @author Andreu Sanz Miedes y Aida Dahdah Castelló
* @author asanzm.sanz@gmail.com, aidadahdah@gmail.com
* @copyright 2015 PROYECTO FINAL
* @version 1.0
*/

	class mLogin extends Model{

		function __construct(){
			parent::__construct();
		}

	 /**
    * @return esta función se encarga de retornar el rol del usuario.
    */
    function rol($nusuario)
    {
    try
        {
        $sql = "SELECT rol FROM usuarios WHERE nombre_usuario=? ";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $nusuario);
        $query->execute();
        if ($query->rowCount() == 1)
            {
            $fetch = $query->fetchColumn();
            $_SESSION['rol'] = $fetch;
            return TRUE;
            }
          else
            {
            $_SESSION['rol'] = "Error";
            return FALSE;
            }
        }

    catch(PDOException $e)
        {
        echo "Error:" . $e->getMessage();
        }
    }
    
    /**
    * @return esta función se encarga de comprobar que el usuario y la contraseña son correctos,
    * en caso contrario no nos logueara,además de generar un carrito.
    */
    function login($nusuario, $password)
    {
    try
        {
        $sql = "SELECT * FROM usuarios WHERE nombre_usuario=? AND password=?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $nusuario);
        $query->bindParam(2, $password);
        $query->execute();
        if ($query->rowCount() == 1)
            {
            $_SESSION['user'] = $_REQUEST['usuario'];
            $_SESSION['carrito'] = Array();
            $this->rol($nusuario);
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
}