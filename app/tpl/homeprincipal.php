  <section>
   <?php /*include APP.'tpl/sthome.php';*/?>

      <?php if(isset($_SESSION['home'])){

    echo $_SESSION['home'];
    } ?>
  </section>
<?php  
		include APP.'footer.php';?>