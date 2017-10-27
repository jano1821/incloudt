<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"><?= $this->tag->linkTo(['empresa/index', 'Go Back']) ?></li>
            <li class="next"><?= $this->tag->linkTo(['empresa/new', 'Create ']) ?></li>
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
                <th>CodEmpresa</th>
            <th>NombreEmpresa</th>
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
        <?php foreach ($page->items as $empresa) { ?>
            <tr>
                <td><?= $empresa->codEmpresa ?></td>
            <td><?= $empresa->nombreEmpresa ?></td>
            <td><?= $empresa->estadoRegistro ?></td>
            <td><?= $empresa->fechaInsercion ?></td>
            <td><?= $empresa->usuarioInsercion ?></td>
            <td><?= $empresa->fechaModificacion ?></td>
            <td><?= $empresa->usuarioModificacion ?></td>

                <td><?= $this->tag->linkTo(['empresa/edit/' . $empresa->codEmpresa, 'Edit']) ?></td>
                <td><?= $this->tag->linkTo(['empresa/delete/' . $empresa->codEmpresa, 'Delete']) ?></td>
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
                <li><?= $this->tag->linkTo(['empresa/search', 'First']) ?></li>
                <li><?= $this->tag->linkTo(['empresa/search?page=' . $page->before, 'Previous']) ?></li>
                <li><?= $this->tag->linkTo(['empresa/search?page=' . $page->next, 'Next']) ?></li>
                <li><?= $this->tag->linkTo(['empresa/search?page=' . $page->last, 'Last']) ?></li>
            </ul>
        </nav>
    </div>
</div>
