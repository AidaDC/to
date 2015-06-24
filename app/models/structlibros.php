 <?php 
        if($id1 != null){
        $sql    = "INSERT INTO compra_libros(Compra_id_compra,Libros_id_libro,cantidad) values ($fetch,$id1,1)";
        $query = $this->db->prepare($sql);
        $query->execute();

         $sql    = "UPDATE `libros` SET stock=  stock - 1 WHERE id_libro=$id1";
        $query = $this->db->prepare($sql);
        $query->execute();
        }

        if($id2 != null){
        $sql    = "INSERT INTO compra_libros(Compra_id_compra,Libros_id_libro,cantidad) values ($fetch,$id2,1)";
        $query = $this->db->prepare($sql);
        $query->execute();

         $sql    = "UPDATE `libros` SET stock=  stock - 1 WHERE id_libro=$id2";
        $query = $this->db->prepare($sql);
        $query->execute();
        }
     
      if($id3 != null){
        $sql    = "INSERT INTO compra_libros(Compra_id_compra,Libros_id_libro,cantidad) values ($fetch,$id3,1)";
        $query = $this->db->prepare($sql);
        $query->execute();


         $sql    = "UPDATE `libros` SET stock=  stock - 1 WHERE id_libro=$id3";
        $query = $this->db->prepare($sql);
        $query->execute();
        }
     
      if($id4 != null){
        $sql    = "INSERT INTO compra_libros(Compra_id_compra,Libros_id_libro,cantidad) values ($fetch,$id4,1)";
        $query = $this->db->prepare($sql);
        $query->execute();

        $sql    = "UPDATE `libros` SET stock=  stock - 1 WHERE id_libro=$id4";
        $query = $this->db->prepare($sql);
        $query->execute();
        }
     
      if($id5 != null){
        $sql    = "INSERT INTO compra_libros(Compra_id_compra,Libros_id_libro,cantidad) values ($fetch,$id5,1)";
        $query = $this->db->prepare($sql);
        $query->execute();

         $sql    = "UPDATE `libros` SET stock=  stock - 1 WHERE id_libro=$id5";
        $query = $this->db->prepare($sql);
        $query->execute();
        }
     
      if($id6 != null){
        $sql    = "INSERT INTO compra_libros(Compra_id_compra,Libros_id_libro,cantidad) values ($fetch,$id6,1)";
        $query = $this->db->prepare($sql);
        $query->execute();

         $sql    = "UPDATE `libros` SET stock=  stock - 1 WHERE id_libro=$id6";
        $query = $this->db->prepare($sql);
        $query->execute();
        }
     
      if($id7 != null){
        $sql    = "INSERT INTO compra_libros(Compra_id_compra,Libros_id_libro,cantidad) values ($fetch,$id7,1)";
        $query = $this->db->prepare($sql);
        $query->execute();

         $sql    = "UPDATE `libros` SET stock=  stock - 1 WHERE id_libro=$id7";
        $query = $this->db->prepare($sql);
        $query->execute();
        }
     
      if($id8 != null){
        $sql    = "INSERT INTO compra_libros(Compra_id_compra,Libros_id_libro,cantidad) values ($fetch,$id8,1)";
        $query = $this->db->prepare($sql);
        $query->execute();

         $sql    = "UPDATE `libros` SET stock=  stock - 1 WHERE id_libro=$id8";
        $query = $this->db->prepare($sql);
        $query->execute();
        }
     
      if($id9 != null){
        $sql    = "INSERT INTO compra_libros(Compra_id_compra,Libros_id_libro,cantidad) values ($fetch,$id9,1)";
        $query = $this->db->prepare($sql);
        $query->execute();

         $sql    = "UPDATE `libros` SET stock=  stock - 1 WHERE id_libro=$id9";
        $query = $this->db->prepare($sql);
        $query->execute();
        }

?>