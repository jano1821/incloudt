<!DOCTYPE html>
<html>
    <?= $this->getContent() ?>
    <head lang="es">
        <meta charset="UTF-8">
        <title></title>

        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/creartstyle.css">

        <style>
            .padding_0{ padding: 0px 0px 0px 0px}
            .padding_lt{padding: 0px 10px 10px 0px}
            .padding_rt{padding: 0px 0px 10px 10px}
            .padding_lb{padding: 10px 10px 0px 0px}
            .padding_rb{padding: 10px 0px 0px 10px}
            .fondo{
                background-image: url("img/fondo.jpg");
            }
        </style>
    </head>

    <body class="fondo">
        
    <?php
        $username = "";
        if ($this->session->has("Usuario")) {
            $usuario = $this->session->get("Usuario");
            $username=$usuario['nombreUsuario'];
        }
                ?>
        <div class="container">
            <div class="row caja">
                <header class="dato">

                    <div class="col-xs-6 col-sm-6 col-md-6">Usuario : <?php echo $username;?></div>
                    <div class="col-xs-6 col-sm-6 col-md-6 text-right"> tiempo : 12:22 </div>

                </header>
            </div>
        </div>

        <div class="container">
            <div class="row dato cajamenu">

                <div class="col-lg-5">
                    <section>
                        <?= $this->tag->image(['img/img.png', 'class' => 'logofox']) ?>
                        <h1> Nombre </h1>
                    </section>
                </div>

                <div class="col-lg-7">
                    <section class=" menu text-center">
                        <ul>
                            <li><?= $this->tag->image(['img/home.png', 'class' => 'img-responsive']) ?><p>inicio</p>
                            <li><?= $this->tag->image(['img/download_s.png', 'class' => 'img-responsive']) ?><p>descarga</p>
                            <li><?= $this->tag->image(['img/questionmark.png', 'class' => 'img-responsive']) ?><p>ayuda</p>
                        </ul>
                    </section>
                </div>

            </div>
        </div>


        <div class="container">
            <div class="row">
                <!-- 1era Columna -->

                <div class="col-sm-6 col-lg-4">

                    <?= $this->tag->linkTo(['', $this->tag->image(['img/almacen.jpg', 'class' => 'img-responsive caja galeria'])]) ?>
                    <?= $this->tag->linkTo(['', $this->tag->image(['img/asistencia.jpg', 'class' => 'img-responsive caja galeria'])]) ?>

                </div>
                <!-- 2da Columna -->
                <div class="col-xs-12 col-sm-6 col-lg-4">

                    <div class="galeria">
                        <?= $this->tag->image(['img/especievalorada.jpg', 'class' => 'center-block img-responsive caja']) ?>
                    </div>
                </div>

                <!-- 3era -->
                <div class="col-xs-12 col-sm-12 col-lg-4">
                    <div class="col-xs-6 col-md-6 col-lg-6 padding_0">
                        <?= $this->tag->image(['img/facturacion.jpg', 'class' => 'img-responsive galeria padding_lt']) ?>
                    </div>

                    <div class="col-xs-6 col-md-6 col-lg-6 padding_0">
                        <?= $this->tag->image(['img/venta.jpg', 'class' => 'img-responsive galeria padding_rt']) ?>
                    </div>

                    <div class="col-xs-6 col-md-6 col-lg-6 padding_0">
                        <?= $this->tag->image(['img/email.jpg', 'class' => 'img-responsive galeria padding_lb']) ?>
                    </div>

                    <div class="col-xs-6 col-md-6 col-lg-6 padding_0">
                        <?= $this->tag->image(['img/ayuda.jpg', 'class' => 'img-responsive galeria padding_rb']) ?>
                    </div>
                </div>

            </div>
        </div>

    </body>
    <script src="js/creartjava.js"></script>
    <script src="js/bootstrap.min.js"></script>

</html>






<?= $this->tag->linkTo(['index/logout', 'Cerrar Sesión']) ?>
