<div class="row">
<div class="container">
<div class="panel panel-info">
<div class="panel-heading">
<div class="btn-group pull-right">
        {{ link_to("empresa", "<i class='glyphicon glyphicon-chevron-left'></i> Volver","class":"btn btn-info") }}
            </div>
<h4><i class='glyphicon glyphicon-edit'></i> Editar Empresa</h4>
</div>
<div class="page-header">
</div>
{{ content() }}

{{ form("empresa/save", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="table">

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldNombreempresa" >Nombre de Empresa</label>
</div>
    <div class="col-md-3">
{{ form.render('nombreEmpresa') }}
    </div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldRazonsocial" >Razón Social</label>
</div>
    <div class="col-md-3">
{{ form.render('razonSocial') }}
    </div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldLimiteUsuarios" >Límite de Usuarios</label>
</div>
    <div class="col-md-3">
{{ form.render('limiteUsuarios') }}
    </div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldIdentificadorEmpresa" >Identificador</label>
</div>
    <div class="col-md-3">
{{ form.render('identificadorEmpresa') }}
    </div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldEstadoregistro" >Estado de Registro</label>
</div>
    <div class="col-md-3">
{{ form.render('estadoRegistro',['class' : 'form-control']) }}
    </div>
</div>

{{ hidden_field("codEmpresa") }}

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