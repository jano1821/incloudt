<div class="row">
<div class="container">
<div class="panel panel-info">
<div class="panel-heading">
<div class="btn-group pull-right">
        <?= $this->tag->linkTo(['datos_empresa', '<i class=\'glyphicon glyphicon-chevron-left\'></i> Volver', 'class' => 'btn btn-info']) ?>
            </div>
<h4><i class='glyphicon glyphicon-edit'></i> Editar Datos de Empresa</h4>
</div>
<div class="page-header">
</div>

<?= $this->getContent() ?>

<?= $this->tag->form(['datos_empresa/save', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>

<div class="table">

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldCodempresa">Empresa</label>
</div>
    <div class="col-md-3">
            <?php if (isset($empresa)) { ?>
                <?= $this->tag->select(['codEmpresa', $empresa, 'useEmpty' => true, 'emptyText' => 'Seleccione Empresa...', 'emptyValue' => '', 'using' => ['codEmpresa', 'nombreEmpresa'], 'class' => 'form-control']) ?>
            <?php } ?>
        </div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldRazonsocial" >Razon Social</label>
</div>
    <div class="col-md-3">
        <?= $this->tag->textField(['razonSocial', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldRazonsocial']) ?>
    </div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldLimiteusuarios" >Limite de Usuarios</label>
</div>
    <div class="col-md-3">
        <?= $this->tag->textField(['limiteUsuarios', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldLimiteusuarios']) ?>
    </div>
</div>


<?= $this->tag->hiddenField(['codEmpresa']) ?>

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