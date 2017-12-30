<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("usuario_sistema", "Go Back") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Edit usuario_sistema
    </h1>
</div>

{{ content() }}

{{ form("usuario_sistema/save", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="form-group">
    <label for="fieldCodusuario" class="col-sm-2 control-label">CodUsuario</label>
    <div class="col-sm-10">
        {{ text_field("codUsuario", "type" : "numeric", "class" : "form-control", "id" : "fieldCodusuario") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCodsistema" class="col-sm-2 control-label">CodSistema</label>
    <div class="col-sm-10">
        {{ text_field("codSistema", "type" : "numeric", "class" : "form-control", "id" : "fieldCodsistema") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEstadoregistro" class="col-sm-2 control-label">EstadoRegistro</label>
    <div class="col-sm-10">
        {{ text_field("estadoRegistro", "size" : 30, "class" : "form-control", "id" : "fieldEstadoregistro") }}
    </div>
</div>


{{ hidden_field("id") }}

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Send', 'class': 'btn btn-default') }}
    </div>
</div>

</form>
