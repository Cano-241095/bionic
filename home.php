<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/variables.css">
    <link rel="stylesheet" href="css/styleIndex.css">
    <link rel="shortcut icon" href="img/logo-png.ico">
    <link rel="stylesheet" href="css/btnAdmin.css">

    <title>Implants Bionic</title>
</head>

<body>
    
    <?php
    
    include("header.php");

// if(isset($_GET['contrasenia'])) {
//     $input = $_GET['contrasenia'];
//     if($input==1234){
//     header('Location:admin/home.php');
//     }else{
//         header('Location:home.php');  
//     }
// }
    ?> 
    
    <!-- <button type="button" class="btn btn-secondary btn-modal" data-bs-toggle="modal" data-bs-target="#exampleModal">
Ingresar
</button>
<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ingresar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="get" name="form" action="home.php">
            Contraseña:<input type="password" name="contrasenia" require>
            <button>784</button>
        </form>    
      </div>
    </div>
  </div>
</div> -->
    <main>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/bannerweb1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/bannerweb2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/bannerweb4.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/bannerweb5.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="menuImagenes">
            <a href="#"><img src="img/library.jpg" alt=""></a>
            <a href="#"><img src="img/banner2_1.jpg" alt=""></a>
            <a href="#"><img src="img/banner3.jpg" alt=""></a>
            <a href="#"><img src="img/banner4.jpg" alt=""></a>
            <a href="#"><img src="img/banner5.jpg" alt=""></a>
            <a href="#"><img src="img/banner6.jpg" alt=""></a>
            <a href="#"><img src="img/banner_inferior.jpg" alt=""></a>
        </div>
    </main>

    <aside>

    </aside>


    <?php
    include("footer.php");
    ?>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>