<?php include "secciones/header.php" ?>


<div class="text-wrap">
    <?php if ($rol == 'Administrador') { 
    ?>
    <div class="admin-content">
        <!-- <h2>Bienvenido, Administrador!!</h2> -->
        <div class="p-5 mb-4 bg- rounded-3">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Bienvenid@ al sistema</h1>
        <h2 class="col-md-8 fs-4">Administrador : <?php echo $_SESSION['usuario']; ?></h2>
        <!-- <button class="btn btn-primary btn-lg" type="button">Example button</button> -->
    </div>
</div>
    </div>
    <?php  } else { 
    ?>
    <div class="user-content">
        <!-- <h2>Bienvenido, Usuario!!</h2> -->
        <div class="p-5 mb-4 bg- rounded-3">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Bienvenid@ al sistema</h1>
        <h2 class="col-md-8 fs-4">Usuario : <?php echo $_SESSION['usuario']; ?></h2>
        <!-- <button class="btn btn-primary btn-lg" type="button">Example button</button> -->
    </div>
</div>
    </div>
    <?php } 
    ?>
</div>


<?php include "secciones/footer.php" ?>


