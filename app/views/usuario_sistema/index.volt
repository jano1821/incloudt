<div class="row">
    <div class="container">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="btn-group pull-right">
                    {{ link_to("menu", "<i class='glyphicon glyphicon-chevron-left'></i> Volver al Menu","class":"btn btn-info") }}
                    {{ link_to("usuario_sistema/new", "<i class='glyphicon glyphicon-plus'></i> Nuevo Registro","class":"btn btn-info") }}
                </div>
                <h4><i class='glyphicon glyphicon-search'></i> Búsqueda de Sistemas</h4>
            </div>
            <div class="page-header">
        </div>

        {{ content() }}
        {{ partial("usuario_sistema/findUsuario") }}
        {{ form("usuario_sistema/search", "method":"post", "autocomplete" : "off", "class" : "form-horizontal", "id" : "searchform") }}
        
        <div class="table">
            <div class="form-group">
                <div class="col-md-3">
                </div>
                <div class="col-md-2">
                    <label for="fieldCodusuario">Usuario</label>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-5">
                            {{ form.render('codUsuario') }}
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" id="listaUsuarios">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3">
                </div>
                <div class="col-md-2">
                    <label for="fieldCodsistema">Sistema</label>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-5">
                            {{ form.render('codSistema') }}
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" id="listaSistemas">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3">
                </div>
                <div class="col-md-2">
                    <label for="fieldEstadoregistro">Estado de Registro</label>
                </div>
                <div class="col-md-3">
                    {{ form.render('estadoRegistro',['class' : 'form-control']) }}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3">
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-2">
                    {{ link_to("sistema/reset", "Limpiar","class":"btn btn-default") }}   
                    {{ form.render('buscar') }}
                    {{ form.render('csrf', ['value': security.getToken()]) }}
                </div>
            </div>
        </div>

        </form>
    </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#listaUsuarios').on("click",function(e){
            e.preventDefault();
            var params = "busquedaUsuario="+$("#labelBusquedaUsuario").val();
            $("#content").html("please wait");
            $.post("{{ url('usuario_sistema/ajaxPost') }}", 
                    params, 
                    function(data) {
                        $("#content").html(data.res.codigo);
                    }).fail(function() {
                        $("#content").html("No hay Resultados");
                    })
        });
    });

    /*$(document).ready(function() {
        $("#listaUsuarios").click(function(e){
            e.preventDefault();
            var labelBusquedaUsuario = $("#labelBusquedaUsuario").val();
            $("#content").html("please wait");
            datos = {"parametro":labelBusquedaUsuario};
            $.ajax({
		url: "ajaxPost",
		type: "POST",
		data: datos
            }).done(function(respuesta){
                if (respuesta.estado === "ok") {
                    console.log(JSON.stringify(respuesta));

                    var nombre = respuesta.nombre,
                    apellido = respuesta.apellido,
                    edad = respuesta.edad;

                    $("#content").html("Servidor:<br><pre>"+JSON.stringify(respuesta, null, 2)+"</pre>");
                }
                $("#content").html(respuesta.res.codigo);
            });
        });
    });*/

    $(document).ready(function(){
        $("#listaSistemas").click(function(){
            alert("Sistemas");
            /*$.ajax({url: "demo_test.txt", success: function(result){
                $("#div1").html(result);
            }});*/
        });
    });
</script>