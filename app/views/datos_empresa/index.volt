<div class="row">
    <div class="container">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="btn-group pull-right">
    {{ link_to("menu", "<i class='glyphicon glyphicon-chevron-left'></i> Volver al Menu","class":"btn btn-info") }}
    {{ link_to("datos_empresa/new", "<i class='glyphicon glyphicon-plus'></i> Nueva Empresa","class":"btn btn-info") }}
                </div>
                <h4><i class='glyphicon glyphicon-search'></i> Búsqueda de Empresas</h4>
            </div>
            <div class="page-header">
        </div>

{{ content() }}

{{ form("datos_empresa/search", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="table">

<div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
    <label for="fieldRazonsocial" class="col-sm-2 control-label">Razon Social</label>
</div>
                    <div class="col-md-3">
        {{ text_field("razonSocial", "size" : 30, "class" : "form-control", "id" : "fieldRazonsocial") }}
    </div>
</div>

<div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
    <label for="fieldLimiteusuarios" class="col-sm-2 control-label">Limite de Usuarios</label>
</div>
                    <div class="col-md-3">
        {{ text_field("limiteUsuarios", "type" : "numeric", "class" : "form-control", "id" : "fieldLimiteusuarios") }}
    </div>
</div>

<div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        {{ link_to("datos_empresa/reset", "Limpiar","class":"btn btn-default") }}   
                        {{ form.render('buscar') }}
                        {{ form.render('csrf', ['value': security.getToken()]) }}
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>