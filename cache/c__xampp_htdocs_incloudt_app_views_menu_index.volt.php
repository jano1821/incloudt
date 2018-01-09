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
        
    <?php require_once('files/datosSesion.php');?>
        <div class="container">
            <div class="row caja">
                <header class="dato">
                    <?php require_once('files/usuario.php');?>
                    <?php require_once('files/reloj.php');?>

                </header>
            </div>
        </div>

        <div class="container">
            <div class="row dato cajamenu">

                <div class="col-lg-5">
                    <section>
                        <?= $this->tag->image(['img/img.png', 'class' => 'logofox']) ?>
                        <h1> Empresa : <?php echo $nombreEmpresa;?></h1>
                    </section>
                </div>

                <div class="col-lg-7">
                    <section class=" menu text-center">
                        <ul>
                            <?php
                            if ($indicadorUsuarioAdministrador=='S' || $indicadorUsuarioAdministrador=='Z'){
                                ?>
                                <li><?= $this->tag->linkTo(['parametros_generales', $this->tag->image(['img/variable.png', 'class' => 'img-responsive'])]) ?><p>Datos</p>
                                <?php
                            }
                            if ($indicadorUsuarioAdministrador=='Z'){
                                ?>
                                <li><?= $this->tag->linkTo(['sistema/index', $this->tag->image(['img/sistema.png', 'class' => 'img-responsive'])]) ?><p>Sistemas</p>
                                <?php
                            }
                            if ($indicadorUsuarioAdministrador=='S' || $indicadorUsuarioAdministrador=='Z'){
                                ?>
                                <li><?= $this->tag->linkTo(['usuario_sistema/index', $this->tag->image(['img/cloud.png', 'class' => 'img-responsive'])]) ?><p>Sis-Usu</p>
                                <?php
                            }
                            if ($indicadorUsuarioAdministrador=='Z'){
                                ?>
                                <li><?= $this->tag->linkTo(['empresa/index', $this->tag->image(['img/empresa.png', 'class' => 'img-responsive'])]) ?><p>Empresas</p>
                                <?php
                            }
                            if ($indicadorUsuarioAdministrador=='S' || $indicadorUsuarioAdministrador=='Z'){
                                ?>
                                <li><?= $this->tag->linkTo(['usuario/index', $this->tag->image(['img/usuarios2.png', 'class' => 'img-responsive'])]) ?><p>Usuarios</p>
                                <?php
                            }
                            if ($indicadorUsuarioAdministrador=='Z'){
                                ?>
                                <li><?= $this->tag->linkTo(['configuracion/index', $this->tag->image(['img/settings.png', 'class' => 'img-responsive'])]) ?><p>Config</p>
                                <?php
                            }
                            ?>
                            <li><?= $this->tag->linkTo(['index/logout', $this->tag->image(['img/apagar.png', 'class' => 'img-responsive'])]) ?><p>Cerrar</p>
                        </ul>
                    </section>
                </div>

            </div>
        </div>


        <div class="container">
            <div class="row">
                <?php
                $contador=0;
                ?>
                <!-- 1era Columna -->
                <?php if (isset($menu)) { ?>
                    <?php foreach ($menu as $items) { ?>
                        <?php
                        $contador++;
                        if ($contador==1){
                        ?>
                        <div class="col-sm-6 col-lg-4">

                            <?= $this->tag->linkTo(['', $this->tag->image([$items->urlIcono, 'class' => 'img-responsive caja galeria'])]) ?>

                        </div>
                        <?php
                        }
                        if ($contador==2){
                        ?>
                        <!-- 2da Columna -->
                        <div class="col-xs-12 col-sm-6 col-lg-4">

                            <div class="galeria">
                                <?= $this->tag->linkTo(['', $this->tag->image([$items->urlIcono, 'class' => 'center-block img-responsive caja'])]) ?>
                            </div>
                        </div>
                        <?php
                        }
                        if ($contador==3){
                        ?>
                        <!-- 3era -->
                        <div class="col-xs-12 col-sm-12 col-lg-4">
                            <div class="col-xs-6 col-md-6 col-lg-6 padding_0">
                                <?= $this->tag->linkTo(['', $this->tag->image([$items->urlIcono, 'class' => 'img-responsive galeria padding_lt'])]) ?>
                            </div>

                            
                        </div>
                        <?php
                        $contador=0;
                        }
                        ?>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
        <script>
        var tiempo = "<?php echo $tiempoSesion; ?>";
        var segundo = 0;
        window.setTimeout('mostrar()', 100);
        function mostrar() {
            var etiqueta;

            if (tiempo == 0 && segundo == 0) {
                document.location.href = "index/logout";
            }

            etiqueta = completar(2, "" + tiempo, "0") + ":" + completar(2, "" + segundo, "0");

            if (segundo == 0) {
                tiempo--;
                segundo = 60;
            }

            segundo--;

            document.getElementById('hora').innerHTML = 'Tiempo Restante: ' + etiqueta;
            window.setTimeout('mostrar()', 1000);
        }
        function completar(len, cadena, caracter) {
            while (cadena.length < len) {
                cadena = caracter + cadena;
            }
            return cadena;
        }
        </script>
    </body>
    <script src="js/creartjava.js"></script>
    <script src="js/bootstrap.min.js"></script>
</html>