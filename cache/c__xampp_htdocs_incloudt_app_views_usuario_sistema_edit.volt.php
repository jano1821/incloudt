<div class="row">
<div class="container">
<div class="panel panel-info">
<div class="panel-heading">
<div class="btn-group pull-right">
        <?= $this->tag->linkTo(['usuario_sistema', '<i class=\'glyphicon glyphicon-chevron-left\'></i> Volver', 'class' => 'btn btn-info']) ?>
            </div>
<h4><i class='glyphicon glyphicon-edit'></i> Editar Empresa</h4>
</div>
<div class="page-header">
</div>

<?= $this->getContent() ?>

<?= $this->tag->form(['usuario_sistema/save', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>

<div class="table">

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldCodusuario">Usuario</label>
</div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-5">
                <?= $form->render('nombreUsuario') ?>
                <?= $form->render('codUsuario') ?>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" id="listaUsuarios">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-md-3">
    </div>
    <div class="col-md-2">
        <label for="fieldCodsistema">Sistema</label>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-5">
                <?= $form->render('nombreSistema') ?>
                <?= $form->render('codSistema') ?>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalSistema" id="listaSistemas">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-md-3">
    </div>
    <div class="col-md-2">
        <label for="fieldEstadoregistro">Estado Registro</label>
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
        <?= $form->render('save') ?>
<?= $form->render('csrf', ['value' => $this->security->getToken()]) ?>
    </div>
</div>
</div>
</form>
</div>
</div>