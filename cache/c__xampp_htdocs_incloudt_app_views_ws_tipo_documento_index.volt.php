<div class="row">
    <div class="container">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="btn-group pull-right">
<?= $this->tag->linkTo(['menu', '<i class=\'glyphicon glyphicon-chevron-left\'></i> Volver al Menu', 'class' => 'btn btn-info']) ?>
    <?= $this->tag->linkTo(['ws_tipo_documento/new', '<i class=\'glyphicon glyphicon-plus\'></i> Nuevo Tipo Documento', 'class' => 'btn btn-info']) ?>
                </div>
                <h4><i class='glyphicon glyphicon-search'></i> Búsqueda de Tipos de Documento</h4>
            </div>
            <div class="page-header">
        </div>

<?= $this->getContent() ?>

<?= $this->tag->form(['ws_tipo_documento/search', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>

<div class="table">

<div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
    <label for="fieldNombreempresa" >Descripcion</label>
</div>
                    <div class="col-md-3">
<?= $form->render('descripcion') ?>
    </div>
</div>

<div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
    <label for="fieldEstadoregistro" >Estado de Registro</label>
</div>
                    <div class="col-md-3">
<?= $form->render('estadoRegistro', ['class' => 'form-control']) ?>
    </div>
</div>

<div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        <?= $this->tag->linkTo(['ws_tipo_documento/reset', 'Limpiar', 'class' => 'btn btn-default']) ?>   
                        <?= $form->render('buscar') ?>
                        <?= $form->render('csrf', ['value' => $this->security->getToken()]) ?>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>