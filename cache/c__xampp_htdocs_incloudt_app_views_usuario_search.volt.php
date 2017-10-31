<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"><?= $this->tag->linkTo(['usuario/index', 'Go Back']) ?></li>
            <li class="next"><?= $this->tag->linkTo(['usuario/new', 'Create ']) ?></li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>Search result</h1>
</div>

<?= $this->getContent() ?>

<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>CodUsuario</th>
            <th>CodEmpresa</th>
            <th>NombreUsuario</th>
            <th>PasswordUsuario</th>
            <th>CantidadIntentos</th>
            <th>IndicadorUsuarioAdministrador</th>
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
        <?php if (isset($page->items)) { ?>
        <?php foreach ($page->items as $usuario) { ?>
            <tr>
                <td><?= $usuario->codUsuario ?></td>
            <td><?= $usuario->codEmpresa ?></td>
            <td><?= $usuario->nombreUsuario ?></td>
            <td><?= $usuario->passwordUsuario ?></td>
            <td><?= $usuario->cantidadIntentos ?></td>
            <td><?= $usuario->indicadorUsuarioAdministrador ?></td>
            <td><?= $usuario->estadoRegistro ?></td>
            <td><?= $usuario->fechaInsercion ?></td>
            <td><?= $usuario->usuarioInsercion ?></td>
            <td><?= $usuario->fechaModificacion ?></td>
            <td><?= $usuario->usuarioModificacion ?></td>

                <td><?= $this->tag->linkTo(['usuario/edit/' . $usuario->codUsuario, 'Edit']) ?></td>
                <td><?= $this->tag->linkTo(['usuario/delete/' . $usuario->codUsuario, 'Delete']) ?></td>
            </tr>
        <?php } ?>
        <?php } ?>
        </tbody>
    </table>
</div>

<div class="row">
    <div class="col-sm-1">
        <p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
            <?= $page->current . '/' . $page->total_pages ?>
        </p>
    </div>
    <div class="col-sm-11">
        <nav>
            <ul class="pagination">
                <li><?= $this->tag->linkTo(['usuario/search', 'First']) ?></li>
                <li><?= $this->tag->linkTo(['usuario/search?page=' . $page->before, 'Previous']) ?></li>
                <li><?= $this->tag->linkTo(['usuario/search?page=' . $page->next, 'Next']) ?></li>
                <li><?= $this->tag->linkTo(['usuario/search?page=' . $page->last, 'Last']) ?></li>
            </ul>
        </nav>
    </div>
</div>
