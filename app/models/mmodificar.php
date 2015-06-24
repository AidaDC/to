<?php /**
* @author Andreu Sanz Miedes y Aida Dahdah Castelló
* @author asanzm.sanz@gmail.com, aidadahdah@gmail.com
* @copyright 2015 PROYECTO FINAL
* @version 1.0
*/ 

	class mModificar extends Model{
  
		function __construct(){
			parent::__construct();
		}
  /**
    * @return esta función se encarga de sustituir los accentos de una vocal, por la misma
    * sin el accento, tambien las ñ por n y las ç por c
    */

         function quitar_tildes($string)
{

    $string = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
        $string
    );

    $string = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        $string
    );

    $string = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
        $string
    );

    $string = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
        $string
    );

    $string = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
        $string
    );

    $string = str_replace(
        array('ñ', 'Ñ', 'ç', 'Ç'),
        array('n', 'N', 'c', 'C',),
        $string
    );


    return $string;
}

  /**
    * @return esta función se encarga de obtener el id de la población que nos pasan,
    * ya que en la base de datos guardamos un número en la población.
    */
 function id_poblacion($poblacion)
    {
     $result = $this->quitar_tildes($poblacion);
    try
        {
        $sql = "SELECT id_poblacion FROM poblacion WHERE poblacion=?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $result);
        $query->execute();
        if ($query->rowCount() >= 1)
            {
            $fetch = $query->fetchColumn();
            $_SESSION['id_pob'] = $fetch;
            return $fetch;
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

    function id_editorial($editorial)
    {
    try
        {
        $sql = "SELECT id_editorial FROM editorial WHERE nombre='$editorial'";
        $query = $this->db->prepare($sql);
        $query->execute();
        if ($query->rowCount() >= 1)
            {
            $fetch = $query->fetchColumn();
            $_SESSION['$id_edit'] = $fetch;
            return $fetch;
            }
          else
            {
            $fetch="5";
            return $fetch;
            }
        }
    catch(PDOException $e)
        {
        echo "Error:" . $e->getMessage();
        }
    }


  /**
    * @return esta función se encarga de modificar los datos del usuario en la base de datos.
    */
 function modificar($nif, $email, $poblacion, $codigo_postal, $direccion, $telefono, $nombre_usuario, $password)
    {
    $idresult = $this->id_poblacion($poblacion);
    try
        {        
        $sql = " UPDATE libros SET ";
        $vector = array($nombre_usuario,$telefono,$direccion,$idresult,$email,$codigo_postal,$password);
        $vector2 = array('nombre_usuario','telefono','direccion','poblacion','email','codigo_postal','password');
        $max = sizeof($vector);
        for ($i = 1; $i <= $max; $i++)
            {
            if ($i != $max)
                {
                $sql.= $vector2[$i - 1] . "=" . "'";
                $sql.= $vector[$i - 1] . "'" . ",";
                }
              else
                {
                $sql.= $vector2[$i - 1] . "='";
                $sql.= $vector[$i - 1] . "' WHERE nif='" . $nif . "';";
                }
            }

        $sentencia2 = $this->db->prepare($sql);
        $sentencia2->execute();
        if ($sentencia2->rowCount() == 1)
            {
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
            return $fetch;
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
    
    /**
    * @return esta función se encarga de obtener los datos de cada usuario para facilitar la modificación 
    * de los mismos.
    */
    public function obtener_datos()
    {
        try {
            $result = $this->get_id_user();
            $sql   = "SELECT nombre,apellidos,nif,email,tpob.poblacion,codigo_postal,direccion,telefono,nombre_usuario,password
            FROM usuarios usu inner join poblacion tpob on usu.poblacion = tpob.id_poblacion where usu.poblacion = tpob.id_poblacion && usu.id_usuario = ? ";
            $query = $this->db->prepare($sql);
            $query->bindParam(1, $result);
            $query->execute(); //fetch per rol

            $perfil.= '<div id="principal">
   <div id="dpersonales">'.'"<form class="registre" id="formregister" method="post" action="'.APP_W.'modificar/modificar" accept-charset="UTF-8">
    </br><p id="title"> Datos Personales</p></br> <label for="nombre">Nombre:</label>';


            while($fila = $query->fetch(PDO::FETCH_ASSOC))  {                                                              
                    
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
                            
           }    
           $perfil.='<input class="submit" id="mod" type="submit" value="Modificar datos!">';
           $perfil.="</form></div></div>"; 
           $_SESSION['perfil'] = $perfil;

            if ($query->rowCount() == 1) {
                $fetch           = $query->fetchColumn();
                $_SESSION['od'] = $fetch;
                return TRUE;
            } else {
                //Session::set('islogged',FALSE);
                $_SESSION['od'] = "Error";
                return FALSE;
            }      
        }
        catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
        }        
    } 


     function modificarlibro($nombre,$idioma,$imagen,$isbn,$precio,$valoration,$stock,$editorial,$n_paginas,$edicion,$novedad,$alt,$descripcion)
    {
    $idresult = $this->id_editorial($editorial);
    try
        {        
        $sql = " UPDATE libros SET ";
        $vector = array($nombre,$isbn,$idioma,$imagen,$descripcion,$precio,$valoration,$stock,$idresult,$n_paginas,$edicion,$novedad,$alt);
        $vector2 = array('nombre','ISBN','idioma','imagen','description','price','valoration','stock','editorial','n_paginas','edition','novedad','alt');
        $max = sizeof($vector);
        for ($i = 1; $i <= $max; $i++)
            {
            if ($i != $max)
                {
                $sql.= $vector2[$i - 1] . "=" . "'";
                $sql.= $vector[$i - 1] . "'" . ",";
                }
              else
                {
                $sql.= $vector2[$i - 1] . "='";
                $sql.= $vector[$i - 1] . "' WHERE ISBN='" . $isbn . "';";
                }
            }
        $sentencia2 = $this->db->prepare($sql);
        $sentencia2->execute();
        if ($sentencia2->rowCount() >= 1)
            {
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