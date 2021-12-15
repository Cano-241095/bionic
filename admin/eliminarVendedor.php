<?php
    include ("conexion.php");
    if (isset($_GET['id'])){    
        $id = $_GET['id'];
        
        $delete = "DELETE FROM vendedores WHERE id = '$id'";
        if (mysqli_query($conn, $delete)){
            $_SESSION['message'] = 'Registro borrado exitosamente';
            $_SESSION['message_type'] = 'danger'; 
            header('Location:vendedor.php'.$row['id']); 
        }else{
            echo "Error al borrar registro: " . mysqli_error($conn);
        }
    }
?>
