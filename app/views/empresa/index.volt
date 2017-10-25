<div class="page-header">
    <h1>
        Search empresa
    </h1>
    <p>
        {{ link_to("empresa/new", "Create empresa") }}
    </p>
</div>

{{ content() }}

{{ form("empresa/search", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="form-group">
    <label for="fieldCodempresa" class="col-sm-2 control-label">CodEmpresa</label>
    <div class="col-sm-10">
        {{ text_field("codEmpresa", "type" : "numeric", "class" : "form-control", "id" : "fieldCodempresa") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldNombreempresa" class="col-sm-2 control-label">NombreEmpresa</label>
    <div class="col-sm-10">
        {{ text_field("nombreEmpresa", "size" : 30, "class" : "form-control", "id" : "fieldNombreempresa") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEstadoregistro" class="col-sm-2 control-label">EstadoRegistro</label>
    <div class="col-sm-10">
        {{ text_field("estadoRegistro", "size" : 30, "class" : "form-control", "id" : "fieldEstadoregistro") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldFechainsercion" class="col-sm-2 control-label">FechaInsercion</label>
    <div class="col-sm-10">
        {{ text_field("fechaInsercion", "size" : 30, "class" : "form-control", "id" : "fieldFechainsercion") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldUsuarioinsercion" class="col-sm-2 control-label">UsuarioInsercion</label>
    <div class="col-sm-10">
        {{ text_field("usuarioInsercion", "type" : "numeric", "class" : "form-control", "id" : "fieldUsuarioinsercion") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldFechamodificacion" class="col-sm-2 control-label">FechaModificacion</label>
    <div class="col-sm-10">
        {{ text_field("fechaModificacion", "size" : 30, "class" : "form-control", "id" : "fieldFechamodificacion") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldUsuariomodificacion" class="col-sm-2 control-label">UsuarioModificacion</label>
    <div class="col-sm-10">
        {{ text_field("usuarioModificacion", "type" : "numeric", "class" : "form-control", "id" : "fieldUsuariomodificacion") }}
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Search', 'class': 'btn btn-default') }}
    </div>
</div>

</form>
