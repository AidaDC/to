<section>
<?php 

      if(isset($_SESSION['homeconcat'])){

    echo $_SESSION['homeconcat'];}else{

   	if(isset($_COOKIE['home'])){

   		echo isset($_COOKIE['home']);

   	}else{
      include 'sthome.php';
   	}
   	}
    

     ?>
    }
  </section>
  <?php include 'footer.php';?>