<?php
    include ("conexion.php");
    if (isset($_GET['id'])){    
        $id = $_GET['id'];
        $id_asociado = $_GET['id_asociado'];
        $titulo = $_GET['titulo'];
        
        $delete = "DELETE FROM aditamentos WHERE id = $id";

        if (mysqli_query($conn, $delete)){
            $_SESSION['message'] = 'Registro borrado exitosamente';
            $_SESSION['message_type'] = 'danger'; # Funcion de bootstrap
            $ir = 'Location:plantilla.php?id=';
            $ir .= $id_asociado;
            $ir .= "&titulo=";
            $ir .= $titulo;
            header($ir);
        }else{
            echo "Error al borrar registro: " . mysqli_error($conn);
        }
    }
?>

