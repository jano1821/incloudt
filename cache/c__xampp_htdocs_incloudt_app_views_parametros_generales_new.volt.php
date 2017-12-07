<div class="row">
<div class="container">
<div class="panel panel-info">
<div class="panel-heading">
<div class="btn-group pull-right">
<?= $this->tag->linkTo(['parametros_generales', '<i class=\'glyphicon glyphicon-chevron-left\'></i> Volver a Búsqueda', 'class' => 'btn btn-info']) ?>
        </div>
<h4><i class='glyphicon glyphicon-record'></i>Nuevo Parametro</h4>
</div>

<div class="page-header">
</div>

<?= $this->getContent() ?>

<?= $this->tag->form(['parametros_generales/create', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>

<div class="table">

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldIdentificadorparametro">ID de Parametro</label>
</div>
                    <div class="col-md-3">
        <?= $this->tag->textField(['identificadorParametro', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldIdentificadorparametro']) ?>
    </div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldDescipcionparametro">Desc de Parametro</label>
</div>
                    <div class="col-md-3">
        <?= $this->tag->textField(['descipcionParametro', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldDescipcionparametro']) ?>
    </div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldValorparametro">Valor de Parametro</label>
</div>
                    <div class="col-md-3">
        <?= $this->tag->textField(['valorParametro', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldValorparametro']) ?>
    </div>
</div>

<div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
    <label for="fieldIndicadorFijo">Indicador Fijo</label>
</div>
                    <div class="col-md-3">
        <?= $form->render('indicadorFijo', ['class' => 'form-control']) ?>
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