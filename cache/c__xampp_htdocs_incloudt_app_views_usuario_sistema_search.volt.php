<div class="row">
<div class="container">
<div class="panel panel-info">
<div class="panel-heading">
<div class="btn-group pull-right">
<?= $this->tag->linkTo(['usuario_sistema', '<i class=\'glyphicon glyphicon-chevron-left\'></i> Volver', 'class' => 'btn btn-info']) ?>
<?= $this->tag->linkTo(['usuario_sistema/new', '<i class=\'glyphicon glyphicon-plus\'></i> Nueva Relacion Usuario Sistema', 'class' => 'btn btn-info']) ?>
       </div>
<h4><i class='glyphicon glyphicon-search'></i> Resultado de Busqueda</h4>
</div>

<div class="page-header">
</div>

<?= $this->getContent() ?>
<?= $this->tag->form(['usuario_sistema/search', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>
<div class="table-responsive">
<table class="table">
<tr  class="info">
                <th>Usuario</th>
            <th>Sistema</th>
            <th>Estado</th>

                <th></th>
                <th></th>
            </tr>
        <tbody>
        <?php if (isset($page->items)) { ?>
        <?php foreach ($page->items as $usuario_sistema) { ?>
            <tr>
                <td><?= $usuario_sistema->nombreUsuario ?></td>
            <td><?= $usuario_sistema->etiquetaSistema ?></td>
            <td><?= $usuario_sistema->estado ?></td>

                <td><?= $this->tag->linkTo(['usuario_sistema/edit/' . $usuario_sistema->codUsuario . '/' . $usuario_sistema->codSistema, 'Editar']) ?></td>
                <td><?= $this->tag->linkTo(['usuario_sistema/delete/' . $usuario_sistema->codUsuario . '/' . $usuario_sistema->codSistema, 'Borrar']) ?></td>
            </tr>
        <?php } ?>
        <?php } ?>
        </tbody>
    </table>
</div>

<?= $this->tag->hiddenField(['pagina']) ?>
<?= $this->tag->hiddenField(['avance']) ?>

<div class="row">
<div class="col-sm-2">
<p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
<?= 'Página ' . $page->current . ' de ' . $page->total_pages ?>
</p>
</div>
<div class="col-sm-10">
<nav>
<ul class="pagination">
<?= $this->tag->submitButton(['Primero', 'class' => 'btn btn-info', 'onclick' => 'paginacion(0);']) ?>
<?= $this->tag->submitButton(['Anterior', 'class' => 'btn btn-info', 'onclick' => 'paginacion(-1);']) ?>
<?= $this->tag->submitButton(['Siguiente', 'class' => 'btn btn-info', 'onclick' => 'paginacion(1);']) ?>
<?= $this->tag->submitButton(['Ultimo', 'class' => 'btn btn-info', 'onclick' => 'paginacion(2);']) ?>
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