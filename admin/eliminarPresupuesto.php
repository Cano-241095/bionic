<?php
    include ("conexion.php");
    if (isset($_GET['id'])){    
        $id = $_GET['id'];
        
        $delete = "TRUNCATE TABLE presupuesto";
    
        mysqli_query($conn, $delete);
        
        if (mysqli_query($conn, $delete)){
            $_SESSION['message'] = 'Registro borrado exitosamente';
            $_SESSION['message_type'] = 'danger'; 
            header('Location:presupuesto.php'); 
        }else{
            echo "Error al borrar registro: " . mysqli_error($conn);
            header('Location:presupuesto.php'); 
        }
        
        header('Location:presupuesto.php'); 
    }else{
        $delete = "TRUNCATE TABLE presupuesto";
    
        mysqli_query($conn, $delete);
        
        if (mysqli_query($conn, $delete)){
            $_SESSION['message'] = 'Registro borrado exitosamente';
            $_SESSION['message_type'] = 'danger'; 
            header('Location:presupuesto.php'); 
        }else{
            echo "Error al borrar registro: " . mysqli_error($conn);
            header('Location:presupuesto.php'); 
        }

    }
?>
