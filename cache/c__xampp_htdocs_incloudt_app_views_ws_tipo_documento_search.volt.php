<div class="row">
<div class="container">
<div class="panel panel-info">
<div class="panel-heading">
<div class="btn-group pull-right">
<?= $this->tag->linkTo(['ws_tipo_documento', '<i class=\'glyphicon glyphicon-chevron-left\'></i> Volver', 'class' => 'btn btn-info']) ?>
<?= $this->tag->linkTo(['ws_tipo_documento/new', '<i class=\'glyphicon glyphicon-chevron-left\'></i> Nuevo Tipo de Documento', 'class' => 'btn btn-info']) ?>
       </div>
<h4><i class='glyphicon glyphicon-search'></i> Busqueda de Tipo de Documento</h4>
</div>

<div class="page-header">
</div>

<?= $this->getContent() ?>

<?= $this->tag->form(['ws_tipo_documento/search', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>
<div class="table-responsive">
<table class="table">
<tr  class="info">
            <th>Descripcion</th>
            <th>Estado de Registro</th>

                <th class='text-center'></th>
            <th class='text-center'></th>
            </tr>
        <tbody>
        <?php if (isset($listTipoDoc)) { ?>
        <?php foreach ($listTipoDoc as $tipoDoc) { ?>
            <tr>
            <td><?= $tipoDoc->descripcionTipoDocumento ?></td>
            <td><?= $tipoDoc->estadoRegistro ?></td>

                <td><?= $this->tag->linkTo(['ws_tipo_documento/edit/' . $tipoDoc->codTipoDocumento, 'Editar']) ?></td>
                <td><?= $this->tag->linkTo(['ws_tipo_documento/delete/' . $tipoDoc->codTipoDocumento, 'Borrar']) ?></td>
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
<?= 'Página ' . $pag . ' Cant. Reg. ' . $cantReg ?>
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