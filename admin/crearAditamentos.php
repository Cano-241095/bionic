<?php
include ("conexion.php");
if (isset($_POST['enviar'])){
    $id = $_POST['id'];
    $id_asociado = $_POST['id_asociado'];
    $nombre_aditamento = $_POST['nombre_aditamento'];
    $url = $_FILES["image"]["name"];
    $precio = $_POST['precio'];
    $titulo = $_POST['titulo'];

    $insertar = "INSERT INTO aditamentos (id,id_asociado,nombre_aditamento,url,precio)
        VALUES ('$id','$id_asociado','$nombre_aditamento','$url', '$precio')";
    
    if (mysqli_query($conn,$insertar)){
        $_SESSION['message'] = 'Registro guardado exitosamente';
        $_SESSION['message_type'] = 'success'; 
        $ir = 'Location:plantilla.php?id=';
        $ir .= $id_asociado;
        $ir .= '&titulo=';
        $ir .= $titulo;
        header($ir);
    }else{
    echo "El registro no se pudo guardar". mysqli_error($conn);
    }        
}

$url = $_FILES["image"]["name"];
$target_dir = "../img/aditamentos/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["enviar"])) {
$check = getimagesize($_FILES["image"]["tmp_name"]);
if($check !== false) {
echo "File is an image - " . $check["mime"] . ".";
$uploadOk = 1;
} else {
echo "File is not an image.";
$uploadOk = 0;
}
}

// Check if file already exists
if (file_exists($target_file)) {
echo "Sorry, file already exists.";
$uploadOk = 0;
}

// Check file size
if ($_FILES["image"]["size"] > 3000000) {
echo "Sorry, your file is too large.";
$uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
$uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
} else {
echo "Sorry, there was an error uploading your file.";
}
}
