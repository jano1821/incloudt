{{ content() }}
<!DOCTYPE html>
<html>
    
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
        $usuario = "";
        $username = "";
        $nombreEmpresa = "";
        $nombresPersona = "";
        $tiempoSesion = "";
        if ($this->session->has("Usuario")) {
            $usuario        =   $this->session->get("Usuario");
            
            $username       =   $usuario['nombreUsuario'];
            $nombreEmpresa  =   $usuario['nombreEmpresa'];
            $nombresPersona =   $usuario['nombresPersona'];
            $tiempoSesion   =   $usuario['tiempoSesion'];
        }
                ?>
        <div class="container">
            <div class="row caja">
                <header class="dato">

                    <div class="col-xs-6 col-sm-6 col-md-6">Usuario : <?php echo $nombresPersona;?></div>
                    <div class="col-xs-6 col-sm-6 col-md-6 text-right"> Tiempo Restante :   <div id="hora">
                                                                                                
                                                                                            </div> 
                    </div>

                </header>
            </div>
        </div>

        <div class="container">
            <div class="row dato cajamenu">

                <div class="col-lg-5">
                    <section>
                        {{ image("img/img.png", "class":"logofox") }}
                        <h1> Empresa : <?php echo $nombreEmpresa;?></h1>
                    </section>
                </div>

                <div class="col-lg-7">
                    <section class=" menu text-center">
                        <ul>
                            <li>{{ image("img/home.png", "class":"img-responsive") }}<p>inicio</p>
                            <li>{{ image("img/questionmark.png", "class":"img-responsive") }}<p>ayuda</p>
                            <li>{{ link_to("index/logout",image('img/logout.png', "class":"img-responsive")) }}<p>Cerrar</p>
                        </ul>
                    </section>
                </div>

            </div>
        </div>


        <div class="container">
            <div class="row">
                <!-- 1era Columna -->

                <div class="col-sm-6 col-lg-4">

                    {{ link_to('', image('img/almacen.jpg', "class":"img-responsive caja galeria")) }}
                    {{ link_to('', image('img/asistencia.jpg', "class":"img-responsive caja galeria")) }}

                </div>
                <!-- 2da Columna -->
                <div class="col-xs-12 col-sm-6 col-lg-4">

                    <div class="galeria">
                        {{ image("img/especievalorada.jpg", "class":"center-block img-responsive caja") }}
                    </div>
                </div>

                <!-- 3era -->
                <div class="col-xs-12 col-sm-12 col-lg-4">
                    <div class="col-xs-6 col-md-6 col-lg-6 padding_0">
                        {{ image("img/facturacion.jpg", "class":"img-responsive galeria padding_lt") }}
                    </div>

                    <div class="col-xs-6 col-md-6 col-lg-6 padding_0">
                        {{ image("img/venta.jpg", "class":"img-responsive galeria padding_rt") }}
                    </div>

                    <div class="col-xs-6 col-md-6 col-lg-6 padding_0">
                        {{ image("img/email.jpg", "class":"img-responsive galeria padding_lb") }}
                    </div>

                    <div class="col-xs-6 col-md-6 col-lg-6 padding_0">
                        {{ image("img/ayuda.jpg", "class":"img-responsive galeria padding_rb") }}
                    </div>
                </div>

            </div>
        </div>
        <script>
        var segundo = 0;
        var tiempo = <?php echo $tiempoSesion;?>;
        window.setTimeout('mostrar()', 100);
        function mostrar() {
            var etiqueta;
            
            if (tiempo == 0 && segundo==0){
                document.location.href = "index/logout";
            }
            
            etiqueta =  completar(2,""+tiempo,"0")+":"+completar(2,""+segundo,"0");

            if (segundo==0){
                tiempo--;
                segundo = 60;
            }
            
            segundo--;
    
            document.getElementById('hora').innerHTML = etiqueta;
            window.setTimeout('mostrar()', 1000);
        }
        function completar(len, cadena, caracter){
            while(cadena.length< len){
                cadena= caracter + cadena;
            }
            return cadena;
        }
        </script>
    </body>
    <script src="js/creartjava.js"></script>
    <script src="js/bootstrap.min.js"></script>
</html>