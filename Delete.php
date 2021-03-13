<?php
 
    
            include "DB_con_class.php";
            $obj=new DB_con_class();
            
            $conn = $obj->connection();

            $id = $_GET['id'];

            $del = "delete from etudiant where cne = '$id'"; 

            if( ($conn->query($del) === TRUE))
            {
                mysqli_close($conn); 
                header("location: admin.php"); 
                exit;	
            }
            else
            {
                echo "Error deleting record"; 
            }
            $del = "delete from parcours_etu where cne_etu = '$id'"; 
            if( ($conn->query($del) === TRUE))
            {
                mysqli_close($conn); 
                header("location: admin.php"); 
                exit;	
            }
            else
            {
                echo "Error deleting record"; 
            }
            $del = "delete from fichier where cne_etu  = '$id'"; 
            if( ($conn->query($del) === TRUE))
            {
                mysqli_close($conn); 
                header("location: admin.php"); 
                exit;	
            }
            else
            {
                echo "Error deleting record"; 
            }
                    
        ?>