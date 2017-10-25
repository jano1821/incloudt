<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("datos_empresa/index", "Go Back") }}</li>
            <li class="next">{{ link_to("datos_empresa/new", "Create ") }}</li>
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
                <th>CodEmpresa</th>
            <th>RazonSocial</th>
            <th>LimiteUsuarios</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        {% if page.items is defined %}
        {% for datos_empresa in page.items %}
            <tr>
                <td>{{ datos_empresa.codEmpresa }}</td>
            <td>{{ datos_empresa.razonSocial }}</td>
            <td>{{ datos_empresa.limiteUsuarios }}</td>

                <td>{{ link_to("datos_empresa/edit/"~datos_empresa.codEmpresa, "Edit") }}</td>
                <td>{{ link_to("datos_empresa/delete/"~datos_empresa.codEmpresa, "Delete") }}</td>
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
                <li>{{ link_to("datos_empresa/search", "First") }}</li>
                <li>{{ link_to("datos_empresa/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("datos_empresa/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("datos_empresa/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
