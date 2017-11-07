<div class="row">
<div class="container">
<div class="panel panel-info">
<div class="panel-heading">
<div class="btn-group pull-right">
{{ link_to("usuario", "<i class='glyphicon glyphicon-chevron-left'></i> Volver a Búsqueda","class":"btn btn-info") }}
        </div>
<h4><i class='glyphicon glyphicon-record'></i>Nueva Empresa</h4>
</div>

<div class="page-header">
</div>

{{ content() }}

{{ form("empresa/create", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="table">

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldNombreempresa">Nombre de Empresa</label>
</div>
    <div class="col-md-3">
{{ form.render('nombreEmpresa') }}
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
