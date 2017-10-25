<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("datos_empresa", "Go Back") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Create datos_empresa
    </h1>
</div>

{{ content() }}

{{ form("datos_empresa/create", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="form-group">
    <label for="fieldCodempresa" class="col-sm-2 control-label">CodEmpresa</label>
    <div class="col-sm-10">
        {{ text_field("codEmpresa", "type" : "numeric", "class" : "form-control", "id" : "fieldCodempresa") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldRazonsocial" class="col-sm-2 control-label">RazonSocial</label>
    <div class="col-sm-10">
        {{ text_field("razonSocial", "size" : 30, "class" : "form-control", "id" : "fieldRazonsocial") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldLimiteusuarios" class="col-sm-2 control-label">LimiteUsuarios</label>
    <div class="col-sm-10">
        {{ text_field("limiteUsuarios", "type" : "numeric", "class" : "form-control", "id" : "fieldLimiteusuarios") }}
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Save', 'class': 'btn btn-default') }}
    </div>
</div>

</form>
