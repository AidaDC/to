<?php /**
* @author Andreu Sanz Miedes y Aida Dahdah Castelló
* @author asanzm.sanz@gmail.com, aidadahdah@gmail.com
* @copyright 2015 PROYECTO FINAL
* @version 1.0
*/
  
    // Create the query
    $sql = 'SELECT nombre FROM poblacion';
    // we have to tell the PDO that we are going to send values to the query
    $stmt = $this->db->query($sql);
    // Extract the values from $stmt
    $rows = $stmt->fetchAll();
    if (empty($rows)) {
        $result = "No se encontraron resultados !!";
    }
 ?>