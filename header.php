
 <?php

if(isset($_GET['contrasenia'])) {
    $input = $_GET['contrasenia'];
    if($input==1984.1984){
    header('Location:admin/home.php');
    }else{
        header('Location:home.php');  
        // echo "Contraseña Incorrecta";
    }
}
    ?> 
<header class="sticky-top">
    <a href="home.php"><img src="img/completo1.png" alt="logoEntrada"></a>
    <nav>
        <a href="#">COMPAÑIA</a>
        <a href="productos.php">PRODUCTOS</a>
        <a href="#">TIENDA</a>
        <a href="#">CONTACTO</a>
        <a href="#"><i class="bi bi-search"></i></a>
        <a href="#"><i class="bi bi-cart"></i></a>
        <a href="#"><img src="img/mexico.jpg" alt="bandera"></a>
    </nav>
    <button data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" id="menu">
        <i class="bi bi-list"></i>
    </button>
</header>

<div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <div class="logo2">
            <a href="home.php">
                <img src="img/completo.png" alt="">
            </a>
        </div>
        <button type="button" class="btn-close text-ress" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="nav nav2">
            <a href="presupuesto.php">PRESUPUESTOS</a>
            <a href="productos.php">PRODUCTOS</a>
            <a href="venta.php">VENTAS</a>
            <a href="#">CONTACTO</a>
            <div>
                
                <a href="#"><i class="bi bi-search"></i></a>
                <a href="#"><i class="bi bi-cart"></i></a>
            </div>
            
        </div>
    </div>
</div>
<div>
    <button type="button" class="btn btn-secondary btn-modal botonAdmin" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="bi bi-shield-lock-fill"></i></button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Administrador</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="get" name="form" action="home.php">
            <label for="">Contraseña:</label>
            <input type="password" name="contrasenia" require>
            <button class="btn llave2"><i class="bi bi-key-fill llave"></i></button>
        </form>    
      </div>
    </div>
  </div>
</div>
    </div>