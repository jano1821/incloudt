<div class="row">
    <div class="container">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="btn-group pull-right">
<?= $this->tag->linkTo(['menu', '<i class=\'glyphicon glyphicon-chevron-left\'></i> Volver al Menu', 'class' => 'btn btn-info']) ?>
    <?= $this->tag->linkTo(['datos_empresa/new', '<i class=\'glyphicon glyphicon-plus\'></i> Datos de Empresa', 'class' => 'btn btn-info']) ?>
                </div>
                <h4><i class='glyphicon glyphicon-search'></i> Datos de Empresa</h4>
            </div>
            <div class="page-header">
        </div>

<?= $this->getContent() ?>

<?= $this->tag->form(['datos_empresa/search', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>

<div class="table">

<div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
    <label for="fieldRazonsocial">Razón Social</label>
</div>
                    <div class="col-md-3">
<?= $form->render('razonSocial') ?>
    </div>
</div>

<div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
    <label for="fieldLimiteusuarios" >Límite de Usuarios</label>
</div>
                    <div class="col-md-3">
<?= $form->render('limiteUsuarios') ?>
    </div>
</div>

<div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        <?= $this->tag->linkTo(['datos_empresa/reset', 'Limpiar', 'class' => 'btn btn-default']) ?>   
                        <?= $form->render('buscar') ?>
                        <?= $form->render('csrf', ['value' => $this->security->getToken()]) ?>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>