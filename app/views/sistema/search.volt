<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("sistema/index", "Go Back") }}</li>
            <li class="next">{{ link_to("sistema/new", "Create ") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>Search result</h1>
</div>

{{ content() }}

<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>CodSistema</th>
            <th>EtiquetaSistema</th>
            <th>UrlSistema</th>
            <th>UrlIcono</th>
            <th>EstadoRegistro</th>
            <th>FechaInsercion</th>
            <th>UsuarioInsercion</th>
            <th>FechaModificacion</th>
            <th>UsuarioModificacion</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        {% if page.items is defined %}
        {% for sistema in page.items %}
            <tr>
                <td>{{ sistema.codSistema }}</td>
            <td>{{ sistema.etiquetaSistema }}</td>
            <td>{{ sistema.urlSistema }}</td>
            <td>{{ sistema.urlIcono }}</td>
            <td>{{ sistema.estadoRegistro }}</td>
            <td>{{ sistema.fechaInsercion }}</td>
            <td>{{ sistema.usuarioInsercion }}</td>
            <td>{{ sistema.fechaModificacion }}</td>
            <td>{{ sistema.usuarioModificacion }}</td>

                <td>{{ link_to("sistema/edit/"~sistema.codSistema, "Edit") }}</td>
                <td>{{ link_to("sistema/delete/"~sistema.codSistema, "Delete") }}</td>
            </tr>
        {% endfor %}
        {% endif %}
        </tbody>
    </table>
</div>

<div class="row">
    <div class="col-sm-1">
        <p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
            {{ page.current~"/"~page.total_pages }}
        </p>
    </div>
    <div class="col-sm-11">
        <nav>
            <ul class="pagination">
                <li>{{ link_to("sistema/search", "First") }}</li>
                <li>{{ link_to("sistema/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("sistema/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("sistema/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
