<div class="row">
<div class="container">
<div class="panel panel-info">
<div class="panel-heading">
<div class="btn-group pull-right">
{{ link_to("ws_tipo_documento", "<i class='glyphicon glyphicon-chevron-left'></i> Volver a Búsqueda","class":"btn btn-info") }}
        </div>
<h4><i class='glyphicon glyphicon-record'></i>Nuevo Tipo de Documento</h4>
</div>

<div class="page-header">
</div>

{{ content() }}

{{ form("ws_tipo_documento/create", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="table">

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldDescripcion">Descripción</label>
</div>
    <div class="col-md-3">
{{ form.render('descripcion') }}
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