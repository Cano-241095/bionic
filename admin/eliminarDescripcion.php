<?php
    include ("conexion.php");
    if (isset($_GET['id'])){    
        $id = $_GET['id'];
        
        $delete = "DELETE FROM descripcion WHERE id = $id";

        $consulta = "SELECT * FROM descripcion WHERE id = $id";
        $result = mysqli_query($conn, $consulta);
        $idAsociado = '2';
        while ($row = mysqli_fetch_array($result)) {
            $idAsociado = $row['id_asociado'];
        }
        if (mysqli_query($conn, $delete)){
            $_SESSION['message'] = 'Registro borrado exitosamente';
            $_SESSION['message_type'] = 'danger'; 
            header('Location:plantillaProducto.php?id='.$idAsociado); 
        }else{
            echo "Error al borrar registro: " . mysqli_error($conn);
        }
    }
?>
