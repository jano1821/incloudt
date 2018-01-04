<div class="row">
<div class="container">
<div class="panel panel-info">
<div class="panel-heading">
<div class="btn-group pull-right">
{{ link_to("usuario_sistema", "<i class='glyphicon glyphicon-chevron-left'></i> Volver a Búsqueda","class":"btn btn-info") }}
        </div>
<h4><i class='glyphicon glyphicon-record'></i>Nueva Relacion Usuario Sistema</h4>
</div>

<div class="page-header">
</div>

{{ content() }}
{{ partial("usuario_sistema/findUsuario") }}
        {{ partial("usuario_sistema/findSistema") }}
{{ form("usuario_sistema/create", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

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
                            {{ form.render('nombreUsuario') }}
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
                            {{ form.render('nombreSistema') }}
                            {{ form.render('codSistema') }}
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalSistema" id="listaSistemas">
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
</div>
<div class="col-md-4">
{{ form.render('save') }}
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
            var params = "busquedaUsuario="+document.getElementById("labelBusquedaUsuario").value;
            $("#content").html("Cargando Contenido.......");
            $.post("{{ url('usuario_sistema/ajaxPostUsuario') }}", 
                    params, 
                    function(data) {
                        $("#content").html(data.res.codigo);
                    }).fail(function() {
                        $("#content").html("No hay Resultados");
                    })
        });
    });

    $(document).ready(function(){
        $("#listaSistemas").click(function(e){
            e.preventDefault();
            var params = "busquedaSistema="+document.getElementById("labelBusquedaSistema").value;
            $("#contentSistema").html("Cargando Contenido.......");
            $.post("{{ url('usuario_sistema/ajaxPostSistema') }}", 
                    params, 
                    function(data) {
                        $("#contentSistema").html(data.res.codigo);
                    }).fail(function() {
                        $("#contentSistema").html("No hay Resultados");
                    })
        });
    });

    
</script>