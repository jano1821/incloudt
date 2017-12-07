<div class="row">
<div class="container">
<div class="panel panel-info">
<div class="panel-heading">
<div class="btn-group pull-right">
        <?= $this->tag->linkTo(['parametros_generales', '<i class=\'glyphicon glyphicon-chevron-left\'></i> Volver', 'class' => 'btn btn-info']) ?>
            </div>
<h4><i class='glyphicon glyphicon-edit'></i> Editar Parámetro</h4>
</div>
<div class="page-header">
</div>

<?= $this->getContent() ?>

<?= $this->tag->form(['parametros_generales/save', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>

<div class="table">

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldCodempresa" >Empresa</label>
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
    <label for="fieldIdentificadorparametro" >ID de Parametro</label>
</div>
    <div class="col-md-3">
<?= $form->render('identificadorParametro', ['class' => 'form-control']) ?>
    </div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldDescipcionparametro" >Desc de Parametro</label>
</div>
    <div class="col-md-3">
<?= $form->render('descipcionParametro', ['class' => 'form-control']) ?>
    </div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldValorparametro" >Valor de Parametro</label>
</div>
    <div class="col-md-3">
<?= $form->render('valorParametro', ['class' => 'form-control']) ?>
    </div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldIndicadorFijo" >Indicador Fijo</label>
</div>
    <div class="col-md-3">
        <?= $form->render('indicadorFijo', ['class' => 'form-control']) ?>
    </div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldEstadoregistro" >Estado</label>
</div>
    <div class="col-md-3">
        <?= $form->render('estadoRegistro', ['class' => 'form-control']) ?>
    </div>
</div>

<?= $this->tag->hiddenField(['codParametro']) ?>

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
