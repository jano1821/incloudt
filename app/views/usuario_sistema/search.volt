<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("usuario_sistema/index", "Go Back") }}</li>
            <li class="next">{{ link_to("usuario_sistema/new", "Create ") }}</li>
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
                <th>CodUsuario</th>
            <th>CodSistema</th>
            <th>EstadoRegistro</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        {% if page.items is defined %}
        {% for usuario_sistema in page.items %}
            <tr>
                <td>{{ usuario_sistema.codUsuario }}</td>
            <td>{{ usuario_sistema.codSistema }}</td>
            <td>{{ usuario_sistema.estadoRegistro }}</td>

                <td>{{ link_to("usuario_sistema/edit/"~usuario_sistema.codUsuario, "Edit") }}</td>
                <td>{{ link_to("usuario_sistema/delete/"~usuario_sistema.codUsuario, "Delete") }}</td>
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
                <li>{{ link_to("usuario_sistema/search", "First") }}</li>
                <li>{{ link_to("usuario_sistema/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("usuario_sistema/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("usuario_sistema/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
