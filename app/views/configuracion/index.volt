<div class="row">
    <div class="container">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="btn-group pull-right">
                    {{ link_to("menu", "<i class='glyphicon glyphicon-chevron-left'></i> Volver al Menu","class":"btn btn-info") }}
                </div>
                <h4><i class='glyphicon glyphicon-search'></i> Menu de Configuración</h4>
            </div>
            <div class="page-header">
        </div>

        {{ content() }}

        {{ form("method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

            <div class="table">
                <div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-4">
                        <label for="fieldTipoDocumento" >Tipo de Documento</label>
                    </div>
                    <div class="col-md-3">
                        {{ link_to("ws_tipo_documento/index", "Ir","class":"btn btn-default") }} 
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-4">
                        <label for="fieldOperadores" >Operadores Telefónicos</label>
                    </div>
                    <div class="col-md-3">
                        {{ link_to("ws_operador/reset", "Ir","class":"btn btn-default") }} 
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>