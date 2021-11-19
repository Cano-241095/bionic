<?php
    include ("conexion.php");
    if (isset($_GET['id_categoria'])){    
        $id_categoria = $_GET['id_categoria'];
        
        $delete = "DELETE FROM soluciones_protesicas WHERE id_categoria = $id_categoria";

        if (mysqli_query($conn, $delete)){
            $_SESSION['message'] = 'Registro borrado exitosamente';
            $_SESSION['message_type'] = 'danger'; # Funcion de bootstrap
            header('Location:admin/solucionesProtesicas.php'); # Redireccionar el archivo
        }else{
            echo "Error al borrar registro: " . mysqli_error($conn);
        }
    }
?>



