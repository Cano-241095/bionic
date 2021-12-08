<?php
    include ("conexion.php");
    if (isset($_GET['id'])){    
        $codigo = $_GET['id'];
        
        $query = "SELECT * FROM tamanio where codigo = '$codigo'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        $nombre = $row['nombre'];
        $descripcion = '';
        $cantidad = 1;
        $id = $row['id_asociado'];
        
        $query = "SELECT * FROM aditamentos where id = $id";
        $result2 = mysqli_query($conn, $query);
        $row2 = mysqli_fetch_array($result2);
        $precio = $row2['precio'];

        $insert = "INSERT INTO presupuesto (codigo,producto,descripcion,cantidad,precio)
        VALUES ('$codigo', '$nombre','$descripcion',$cantidad,$precio)";
        
        if (mysqli_query($conn, $insert)){
            $_SESSION['message'] = 'ok'; 
            $_SESSION['message_type'] = 'danger'; 
            
// echo'<script type="text/javascript">
// alert("agregado");
// window.location.href="presupuesto.php";
// </script>';
            header('Location:presupuesto.php'); 
        }else{
            echo'<script type="text/javascript">
            alert("ERROR");
            windows.location.href="presupuesto.php";
            </script>'; 
            header('Location:presupuesto.php'); 
        }
    }
?>
