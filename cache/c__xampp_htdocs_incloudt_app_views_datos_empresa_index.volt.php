<div class="page-header">
    <h1>
        Search datos_empresa
    </h1>
    <p>
        <?= $this->tag->linkTo(['datos_empresa/new', 'Create datos_empresa']) ?>
    </p>
</div>

<?= $this->getContent() ?>

<?= $this->tag->form(['datos_empresa/search', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>

<div class="form-group">
    <label for="fieldCodempresa" class="col-sm-2 control-label">CodEmpresa</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['codEmpresa', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldCodempresa']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldRazonsocial" class="col-sm-2 control-label">RazonSocial</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['razonSocial', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldRazonsocial']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldLimiteusuarios" class="col-sm-2 control-label">LimiteUsuarios</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['limiteUsuarios', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldLimiteusuarios']) ?>
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?= $this->tag->submitButton(['Search', 'class' => 'btn btn-default']) ?>
    </div>
</div>

</form>
