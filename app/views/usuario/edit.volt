<div class="row">
<div class="container">
<div class="panel panel-info">
<div class="panel-heading">
<div class="btn-group pull-right">
        {{ link_to("usuario", "<i class='glyphicon glyphicon-chevron-left'></i> Volver","class":"btn btn-info") }}
            </div>
<h4><i class='glyphicon glyphicon-edit'></i> Editar Usuario</h4>
</div>
<div class="page-header">
</div>

{{ content() }}

{{ form("usuario/save", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="table">

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldCodempresa" >Empresa</label>
</div>
<div class="col-md-3">
    {% if empresa is defined %}
                            {{ select("codEmpresa", empresa,'useEmpty': true, 'emptyText': 'Seleccione Empresa...', 'emptyValue': '', 'using': ['codEmpresa', 'nombreEmpresa'], "class" : "form-control") }}
                        {% endif %}
    </div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldNombreusuario" >Usuario</label>
</div>
<div class="col-md-3">
        {{ text_field("nombreUsuario", "size" : 30, "class" : "form-control", "id" : "fieldNombreusuario") }}
    </div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldPasswordusuario" >Password</label>
</div>
<div class="col-md-3">
        {{ text_field("passwordUsuario", "size" : 30, "class" : "form-control", "id" : "fieldPasswordusuario") }}
    </div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldCantidadintentos" >Intentos</label>
</div>
<div class="col-md-3">
        {{ text_field("cantidadIntentos", "type" : "numeric", "class" : "form-control", "id" : "fieldCantidadintentos") }}
    </div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldIndicadorusuarioadministrador" >Administrador</label>
</div>
<div class="col-md-3">
{{ select_static('indicadorUsuarioAdministrador', [ '' : 'Selecciona Privilegios...', 'Z' : 'Super Administrador', 'S' : 'Administrador', 'N' : 'No Administrador'],'class':'form-control') }}
    </div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldEstadoregistro" c>Estado de Registro</label>
</div>
<div class="col-md-3">
{{ form.render('estadoRegistro',['class' : 'form-control']) }}
    </div>
</div>

{{ hidden_field("codUsuario") }}

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
</div>
<div class="col-md-2">
        {{ form.render('save') }}
{{ form.render('csrf', ['value': security.getToken()]) }}
    </div>
</div>
</div>
</form>
</div>
</div>