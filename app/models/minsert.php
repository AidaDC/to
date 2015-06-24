<?php /**
* @author Andreu Sanz Miedes y Aida Dahdah Castelló
* @author asanzm.sanz@gmail.com, aidadahdah@gmail.com
* @copyright 2015 PROYECTO FINAL
* @version 1.0
*/
class mInsert extends Model
{
    function __construct(){parent::__construct();}
   /**
    * @return esta función se encarga de convertir las minúsculas a mayúsculas
    */
     public function conv_mayus($dni)
        {
        $resultado = strtoupper($dni);
        return $resultado;
        }

    /**
    * @return esta función se encarga de comprobar si existe el dni en la base de datos.
    */
    public function dni($dni)
    {
    $result = $this->conv_mayus($dni);
    try
        {
        $sql = "SELECT nif FROM usuarios WHERE nif=? ";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $result);
        $query->execute(); //fetch per rol
        if ($query->rowCount() == 1)
            {
            $fetch = $query->fetchColumn();
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
    * @return esta función se encarga de destruir las variables de sesión y redireccionar la home.
    */
    public function salir()
    {
    session_destroy();
    header('Location:' . APP_W . 'home');
    }
    /**
    * @return esta función se encarga de comprobar que el email no exista en la base de datos.
    */
    function email($email)
    {
    try
        {
        $sql = "SELECT email FROM usuarios WHERE email=? ";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $email);
        $query->execute(); //fetch per rol
        if ($query->rowCount() == 1)
            {
            $fetch = $query->fetchColumn();
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
        $query->execute(); //fetch per rol

        // $query->rowCount() == 1

        if ($query->rowCount() == 1)
            {
            $fetch = $query->fetchColumn();
            $_SESSION['id_pob'] = $fetch;
            return $fetch;
            }
          else
            {
            return FALSE;
            die;
            }
        }
    catch(PDOException $e)
        {
        echo "Error:" . $e->getMessage();
        }
    }

    /**
    * @return esta función se encarga de obtener la fecha actual del sistema.
    */
    public function obtener_fecha()
    {
    $hoy = date("d/m/y");
    return $hoy;
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
    * @return esta función se encarga de insertar el usuario en la base de datos
    */
    function insert($dni, $nombre, $apellidos, $nusuario, $telefono, $direccion, $poblacion, $email, $cpostal, $password, $rpassword)
    {
    if ($this->dni($dni) || $this->email($email))
        {
        return FALSE;
        }
      else
        {
        try
            {
            $i_pob = $this->id_poblacion($poblacion);
            $data = $this->obtener_fecha();
            $rol = 2;
            $sql = "INSERT INTO usuarios (nombre,apellidos,nombre_usuario,direccion,codigo_postal,email,telefono,poblacion,password,rol,nif,fecha_creacion) VALUES (";
            $vector = array($nombre,$apellidos,$nusuario,$direccion,$cpostal,$email,$telefono,$i_pob,$password,$rol,$dni,$data);
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
                $this->salir();
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

    function insertlibro($nombre,$isbn,$idioma,$imagen,$descripcion,$precio,$valoration,$stock,$editorial,$n_paginas,$edicion,$novedad,$alt)
    {
        $idresult = $this->id_editorial($editorial);
        try
            {                
            $sql = "INSERT INTO libros (nombre,ISBN,idioma,imagen,description,price,valoration,stock,editorial,n_paginas,edition,novedad,alt) VALUES (";
            $vector = array($nombre,$isbn,$idioma,$imagen,$descripcion,$precio,$valoration,$stock,$idresult,$n_paginas,$edicion,$novedad,$alt);
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
                $this->salir();
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