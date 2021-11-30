<?php
    include ("conexion.php");
    if (isset($_GET['codigo'])){    
        $codigo = $_GET['codigo'];
        
        $delete = "DELETE FROM tamanio WHERE codigo = '$codigo '";
        $query = "SELECT * FROM tamanio where codigo = '$codigo'";
        $result = mysqli_query($conn, $query);
        $row3 = mysqli_fetch_array($result);
        if (mysqli_query($conn, $delete)){
            $_SESSION['message'] = 'Registro borrado exitosamente';
            $_SESSION['message_type'] = 'danger'; 
            header('Location:plantillaProducto.php?id='.$row3['id_asociado']); 
        }else{
            echo "Error al borrar registro: " . mysqli_error($conn);
        }
    }
?>
