  <section>
  <p>

 <?php /**
* @author Andreu Sanz Miedes y Aida Dahdah Castelló
* @author asanzm.sanz@gmail.com, aidadahdah@gmail.com
* @copyright 2015 PROYECTO FINAL
* @version 1.0
*/

/*
echo "<strong>Bienvenido ".$_SESSION['user']."</strong>";*/
echo "<br><br>";
 // $aaa = $_SESSION['user'];
 //            echo "patata";
 //                Coder::code($aaa);
 //                die;

if($_SESSION['rol']==1){
// echo "<a href=".APP_W."reg>"." Insertar usuario </a></br></br>";
// echo "<a href=".APP_W."modificar>"." Modificar usuario </a></br></br>";
// echo "<a href=".APP_W."regeliminar>"." Eliminar usuario</a>";

}else{

echo "<a href=".APP_W."modificar>"." Modificar usuario</a>";

}

// echo "<br><br>";
// echo "Bienvenido ";
// echo $_SESSION['user'];

?></p>


  </section>