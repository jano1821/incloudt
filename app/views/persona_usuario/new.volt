<div class="row">
<div class="container">
<div class="panel panel-info">
<div class="panel-heading">
<div class="btn-group pull-right">
{{ link_to("usuario/index", "<i class='glyphicon glyphicon glyphicon-user'></i> Ir a Usuarios","class":"btn btn-info") }}
{{ link_to("persona_usuario", "<i class='glyphicon glyphicon-chevron-left'></i> Volver a Búsqueda","class":"btn btn-info") }}
</div>
<h4><i class='glyphicon glyphicon-record'></i>Nueva Persona Usuaria</h4>
</div>

<div class="page-header">
</div>

{{ content() }}

{{ form("persona_usuario/create", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="table">
<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
<label for="fieldNombrespersona">Nombres</label>
</div>
<div class="col-md-3">
{{ form.render('nombresPersona') }}        
</div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
<label for="fieldApellidospersona">Apellidos</label>
</div>
<div class="col-md-3">
{{ form.render('apellidosPersona') }} 
</div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
<label for="fieldNumerodocumento">N° Documento</label>
</div>
<div class="col-md-3">
{{ form.render('numeroDocumento') }} 
</div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
<label for="fieldNumerocelular">Numero Celular</label>
</div>
<div class="col-md-3">
{{ form.render('numeroCelular') }} 
</div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
<label for="fieldNumeroanexo">Numero Anexo</label>
</div>
<div class="col-md-3">
{{ form.render('numeroAnexo') }} 
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