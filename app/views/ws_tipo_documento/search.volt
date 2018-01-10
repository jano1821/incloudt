<div class="row">
<div class="container">
<div class="panel panel-info">
<div class="panel-heading">
<div class="btn-group pull-right">
{{ link_to("ws_tipo_documento", "<i class='glyphicon glyphicon-chevron-left'></i> Volver","class":"btn btn-info") }}
{{ link_to("ws_tipo_documento/new", "<i class='glyphicon glyphicon-chevron-left'></i> Nuevo Tipo de Documento","class":"btn btn-info") }}
       </div>
<h4><i class='glyphicon glyphicon-search'></i> Busqueda de Tipo de Documento</h4>
</div>

<div class="page-header">
</div>

{{ content() }}

{{ form("ws_tipo_documento/search", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}
<div class="table-responsive">
<table class="table">
<tr  class="info">
            <th>Descripcion</th>
            <th>Estado de Registro</th>

                <th class='text-center'></th>
            <th class='text-center'></th>
            </tr>
        <tbody>
        {% if listTipoDoc is defined %}
        {% for tipoDoc in listTipoDoc %}
            <tr>
            <td>{{ tipoDoc.descripcionTipoDocumento }}</td>
            <td>{{ tipoDoc.estadoRegistro }}</td>

                <td>{{ link_to("ws_tipo_documento/edit/"~tipoDoc.codTipoDocumento, "Editar") }}</td>
                <td>{{ link_to("ws_tipo_documento/delete/"~tipoDoc.codTipoDocumento, "Borrar") }}</td>
            </tr>
        {% endfor %}
        {% endif %}
        </tbody>
    </table>
</div>

{{ hidden_field("pagina") }}
{{ hidden_field("avance") }}

<div class="row">
<div class="col-sm-2">
<p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
{{ "Página "~pag~" Cant. Reg. "~cantReg }}
</p>
</div>
<div class="col-sm-10">
<nav>
<ul class="pagination">
{{ submit_button('Primero', 'class': 'btn btn-info','onclick':'paginacion(0);') }}
{{ submit_button('Anterior', 'class': 'btn btn-info','onclick':'paginacion(-1);') }}
{{ submit_button('Siguiente', 'class': 'btn btn-info','onclick':'paginacion(1);') }}
{{ submit_button('Ultimo', 'class': 'btn btn-info','onclick':'paginacion(2);') }}
</ul>
</nav>
</div>
</div>
</form>
</div>
</div>
</div>
<script type="text/javascript">
    function paginacion(valor){
        document.getElementById('avance').value = valor;
    }
</script>