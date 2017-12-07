<div class="row">
    <div class="container">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="btn-group pull-right">
<?= $this->tag->linkTo(['menu', '<i class=\'glyphicon glyphicon-chevron-left\'></i> Volver al Menu', 'class' => 'btn btn-info']) ?>
    <?= $this->tag->linkTo(['parametros_generales/new', '<i class=\'glyphicon glyphicon-plus\'></i> Nuevo Parametro', 'class' => 'btn btn-info']) ?>
                </div>
                <h4><i class='glyphicon glyphicon-search'></i> Búsqueda de Parámetros</h4>
            </div>
            <div class="page-header">
        </div>

<?= $this->getContent() ?>

<?= $this->tag->form(['parametros_generales/search', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>

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
    <label for="fieldIdentificadorparametro">Id Parametro</label>
</div>
                    <div class="col-md-3">
        <?= $this->tag->textField(['identificadorParametro', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldIdentificadorparametro']) ?>
    </div>
</div>

<div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
    <label for="fieldDescipcionparametro">Descipción Parametro</label>
</div>
                    <div class="col-md-3">
        <?= $this->tag->textField(['descipcionParametro', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldDescipcionparametro']) ?>
    </div>
</div>

<div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
    <label for="fieldValorparametro">Valor Parametro</label>
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
    <label for="fieldEstadoregistro">Estado de Registro</label>
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
                        <?= $this->tag->linkTo(['parametros_generales/reset', 'Limpiar', 'class' => 'btn btn-default']) ?>   
                        <?= $form->render('buscar') ?>
                        <?= $form->render('csrf', ['value' => $this->security->getToken()]) ?>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
