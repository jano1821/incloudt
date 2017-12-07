<div class="row">
    <div class="container">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="btn-group pull-right">
{{ link_to("menu", "<i class='glyphicon glyphicon-chevron-left'></i> Volver al Menu","class":"btn btn-info") }}
    {{ link_to("parametros_generales/new", "<i class='glyphicon glyphicon-plus'></i> Nuevo Parametro","class":"btn btn-info") }}
                </div>
                <h4><i class='glyphicon glyphicon-search'></i> Búsqueda de Parámetros</h4>
            </div>
            <div class="page-header">
        </div>

{{ content() }}

{{ form("parametros_generales/search", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="table">

    <div class="form-group">
        <div class="col-md-3">
        </div>
        <div class="col-md-2">
            <label for="fieldCodempresa">Empresa</label>
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
    <label for="fieldIdentificadorparametro">Id Parametro</label>
</div>
                    <div class="col-md-3">
        {{ text_field("identificadorParametro", "size" : 30, "class" : "form-control", "id" : "fieldIdentificadorparametro") }}
    </div>
</div>

<div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
    <label for="fieldDescipcionparametro">Descipción Parametro</label>
</div>
                    <div class="col-md-3">
        {{ text_field("descipcionParametro", "size" : 30, "class" : "form-control", "id" : "fieldDescipcionparametro") }}
    </div>
</div>

<div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
    <label for="fieldValorparametro">Valor Parametro</label>
</div>
                    <div class="col-md-3">
        {{ text_field("valorParametro", "size" : 30, "class" : "form-control", "id" : "fieldValorparametro") }}
    </div>
</div>

<div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
    <label for="fieldIndicadorFijo">Indicador Fijo</label>
</div>
                    <div class="col-md-3">
        {{ form.render('indicadorFijo',['class' : 'form-control']) }}
    </div>
</div>

<div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
    <label for="fieldEstadoregistro">Estado de Registro</label>
</div>
                    <div class="col-md-3">
        {{ form.render('estadoRegistro',['class' : 'form-control']) }}
    </div>
</div>

<div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        {{ link_to("parametros_generales/reset", "Limpiar","class":"btn btn-default") }}   
                        {{ form.render('buscar') }}
                        {{ form.render('csrf', ['value': security.getToken()]) }}
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
