<div class="row">
<div class="container">
<div class="panel panel-info">
<div class="panel-heading">
<div class="btn-group pull-right">
        <?= $this->tag->linkTo(['sistema', '<i class=\'glyphicon glyphicon-chevron-left\'></i> Volver', 'class' => 'btn btn-info']) ?>
            </div>
<h4><i class='glyphicon glyphicon-edit'></i> Editar Empresa</h4>
</div>
<div class="page-header">
</div>
<?= $this->getContent() ?>

<?= $this->tag->form(['sistema/save', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>

<div class="table">

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldEtiquetasistema">Etiqueta del Sistema</label>
</div>
    <div class="col-md-3">
<?= $form->render('etiquetaSistema') ?>
    </div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldUrlsistema">Url Sistema</label>
</div>
    <div class="col-md-3">
<?= $form->render('urlSistema') ?>
    </div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldUrlicono">Url Icono</label>
</div>
    <div class="col-md-3">
<?= $form->render('urlIcono') ?>
    </div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldEstadoregistro">EstadoRegistro</label>
</div>
    <div class="col-md-3">
<?= $form->render('estadoRegistro', ['class' => 'form-control']) ?>
    </div>
</div>

<?= $this->tag->hiddenField(['codSistema']) ?>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
</div>
<div class="col-md-2">
        <?= $form->render('save') ?>
<?= $form->render('csrf', ['value' => $this->security->getToken()]) ?>
    </div>
</div>
</div>
</form>
</div>
</div>