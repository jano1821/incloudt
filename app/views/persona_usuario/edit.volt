<div class="row">
<div class="container">
<div class="panel panel-info">
<div class="panel-heading">
<div class="btn-group pull-right">
        {{ link_to("persona_usuario", "<i class='glyphicon glyphicon-chevron-left'></i> Volver","class":"btn btn-info") }}
</div>
<h4><i class='glyphicon glyphicon-edit'></i> Editar Persona Usuaria</h4>
</div>
<div class="page-header">
</div>


{{ content() }}

{{ form("persona_usuario/save", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="table">
<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldNombrespersona">NombresPersona</label>
</div>
<div class="col-md-3">
        {{ form.render('nombresPersona') }}  
    </div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldApellidospersona">ApellidosPersona</label>
</div>
<div class="col-md-3">
{{ form.render('apellidosPersona') }} 
    </div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldNumerodocumento">NumeroDocumento</label>
</div>
<div class="col-md-3">
{{ form.render('numeroDocumento') }} 
    </div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldNumerocelular">NumeroCelular</label>
</div>
<div class="col-md-3">
{{ form.render('numeroCelular') }} 
    </div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldNumeroanexo">NumeroAnexo</label>
</div>
<div class="col-md-3">
{{ form.render('numeroAnexo') }}
    </div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldEstadoregistro">EstadoRegistro</label>
</div>
<div class="col-md-3">
{{ form.render('estadoRegistro', ['class' : 'form-control']) }}
    </div>
</div>

{{ hidden_field("codPersonaUsuario") }}

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