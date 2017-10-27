<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("persona_usuario/index", "Go Back") }}</li>
            <li class="next">{{ link_to("persona_usuario/new", "Create ") }}</li>
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
                <th>CodPersonaUsuario</th>
            <th>NombresPersona</th>
            <th>ApellidosPersona</th>
            <th>NumeroDocumento</th>
            <th>NumeroCelular</th>
            <th>NumeroAnexo</th>
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
        {% for persona_usuario in page.items %}
            <tr>
                <td>{{ persona_usuario.codPersonaUsuario }}</td>
            <td>{{ persona_usuario.nombresPersona }}</td>
            <td>{{ persona_usuario.ApellidosPersona }}</td>
            <td>{{ persona_usuario.numeroDocumento }}</td>
            <td>{{ persona_usuario.numeroCelular }}</td>
            <td>{{ persona_usuario.numeroAnexo }}</td>
            <td>{{ persona_usuario.estadoRegistro }}</td>
            <td>{{ persona_usuario.fechaInsercion }}</td>
            <td>{{ persona_usuario.usuarioInsercion }}</td>
            <td>{{ persona_usuario.fechaModificacion }}</td>
            <td>{{ persona_usuario.usuarioModificacion }}</td>

                <td>{{ link_to("persona_usuario/edit/"~persona_usuario.codPersonaUsuario, "Edit") }}</td>
                <td>{{ link_to("persona_usuario/delete/"~persona_usuario.codPersonaUsuario, "Delete") }}</td>
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
                <li>{{ link_to("persona_usuario/search", "First") }}</li>
                <li>{{ link_to("persona_usuario/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("persona_usuario/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("persona_usuario/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
