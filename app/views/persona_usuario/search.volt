<div class="row">
<div class="container">
<div class="panel panel-info">
<div class="panel-heading">
<div class="btn-group pull-right">

{{ link_to("persona_usuario/index", "<i class='glyphicon glyphicon-chevron-left'></i> Volver","class":"btn btn-info") }}
{{ link_to("persona_usuario/new", "<i class='glyphicon glyphicon-plus'></i> Nueva Persona Usuaria","class":"btn btn-info") }}

</div>
<h4><i class='glyphicon glyphicon-search'></i> Resultado de Busqueda</h4>
</div>


<div class="page-header">
</div>

{{ content() }}

{{ form("persona_usuario/search", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}
<div class="table-responsive">
<table class="table">
<tr  class="info">
            <th>NombresPersona</th>
            <th>ApellidosPersona</th>
            <th>NumeroDocumento</th>
            <th>NumeroCelular</th>
            <th>NumeroAnexo</th>
            <th>EstadoRegistro</th>
            <th class='text-center'></th>
            <th class='text-center'></th>
            </tr>
        <tbody>
        {% if page.items is defined %}
        {% for persona_usuario in page.items %}
            <tr>
            <td>{{ persona_usuario.nombresPersona }}</td>
            <td>{{ persona_usuario.apellidosPersona }}</td>
            <td>{{ persona_usuario.numeroDocumento }}</td>
            <td>{{ persona_usuario.numeroCelular }}</td>
            <td>{{ persona_usuario.numeroAnexo }}</td>
            <td>{{ persona_usuario.estadoRegistro }}</td>

                <td>{{ link_to("persona_usuario/edit/"~persona_usuario.codPersonaUsuario, "Editar") }}</td>
                <td>{{ link_to("persona_usuario/delete/"~persona_usuario.codPersonaUsuario, "Borrar") }}</td>
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
{{ "Página "~page.current~" de "~page.total_pages }}
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