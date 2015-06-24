<body>
<header>
<? header('Content-Type: text/html; charset=UTF-8'); ?>
<div id="principal">
   <div id="logos"><a href="<?= APP_W; ?>"><img class="logo" alt="Put your logo" src="<?= APP_W . 'pub/theme/k/' . $logo; ?>"/></a></div>
   <div id="titulos"><h3>Libreria TLO</h3></div>
  
  <?php /**
* @author Andreu Sanz Miedes y Aida Dahdah Castelló
* @author asanzm.sanz@gmail.com, aidadahdah@gmail.com
* @copyright 2015 PROYECTO FINAL
* @version 1.0
*/ 
    $destino = 'login/login';
    $texto_boton = "Entrar";
    if(isset($_SESSION['user'])){ $destino = 'salir';$texto_boton = 'home/Salir';}
  ?>

  <div id="log"><form class="reg" name="formlog" method="post" action="<?= APP_W.$destino; ?>">
  <?php 
  if($destino == 'login/login'){  ?>
    <div id="login">Login</div>
    <div id="logs"><label id="arr" for="nusuario">Nombre Usuario:</label> <input type="text" name="usuario" value="" placeholder="nombre de usuario" required>
    <label for="password">Password:</label> <input type="password" name="password" required>
    <input type="submit" class="bEntra" value="Entrar"/>
   <a id="reg" href="<?=APP_W.'reg';?>"><div class="breg" >Regístrate aqui</div></a>
    <div>
  <?php 
  }else{

    echo '<div id="regs">Bienvenido '.$_SESSION['user'].'&nbsp;<a href="'.APP_W.'home/Salir">Cerrar Sesion </a></div>';
    ?>

 <!--echo $_SESSION['user']; ?> </p> -->
  <?php 
  } ?>        
  </form>
</div>
</div>
</header>