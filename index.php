<?php
include 'model/conexion.php';
$sentencia = $bd->query("SELECT * FROM autos;");
$autos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="assets/css/index.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar w/ text</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
            </ul>
            <span class="navbar-text">
                Navbar text with an inline element
            </span>
        </div>
    </nav>

    <!-- container -->
    <div class="container mt-5">
        <!-- title -->
        <h1> Empresa de venta de autos usados </h1>

        <!-- Button trigger modal -->
        <div class="row justify-content-end">
            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete">Eliminar</button>
            <button type="button" class="btn btn-success ml-3" data-toggle="modal" data-target="#modalInsert">
                Agregar Auto
            </button>
        </div>

        <!-- table -->
        <div class="scroll">
            <table class="table table-hover mt-3 table-data">
                <thead>
                    <tr>
                        <th scope="col">Marca</th>
                        <th scope="col">Color</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Año</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($autos as $dato) {
                    ?>
                        <tr>
                            <td><?php echo $dato->marca; ?></td>
                            <td><?php echo $dato->color; ?></td>
                            <td>$<?php echo $dato->precio; ?></td>
                            <td><?php echo $dato->anio; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-------------------  ------------------->
    <!------------------- MODALS ------------------->
    <!-------------------  ------------------->

    <!-- Modal insertar -->
    <div class="modal fade" id="modalInsert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" role="form" class="contactForm">

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <input type="text" name="marca" class="form-control" id="marca" placeholder="Ingresa la marca del auto" data-rule="minlen:3" data-msg="Ingrese al menos 3 caracteres para el campo marca" />
                                    <div class="validation"></div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="color" id="color" placeholder="Ingresa el color del auto" data-rule="minlen:2" data-msg="Ingrese al menos 2 caracteres para el campo color" />
                                    <div class="validation"></div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <input type="number" class="form-control" name="precio" id="precio" placeholder="Ingrese el precio del auto" data-rule="minlen:3" data-msg="Ingrese al menos 3 caracteres para el campo precio" />
                                    <div class="validation"></div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <input type="number" class="form-control" name="anio" id="anio" placeholder="Ingrese el año del auto" data-rule="minlen:4" data-msg="Ingrese al menos 4 caracteres para el campo año" />
                                    <div class="validation"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-success">Enviar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal eliminar -->
    <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span>¿Está seguro que quiere eliminar los registros?</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger" href="model/eliminar.php">Eliminar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer class="bg-light text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2020 Copyright:
            <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
    </footer>

    <!-- scripts -->
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/index.js"></script>
</body>

</html>