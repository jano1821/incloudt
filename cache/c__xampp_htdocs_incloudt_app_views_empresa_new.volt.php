<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"><?= $this->tag->linkTo(['empresa', 'Go Back']) ?></li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Create empresa
    </h1>
</div>

<?= $this->getContent() ?>

<?= $this->tag->form(['empresa/create', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>

<div class="form-group">
    <label for="fieldNombreempresa" class="col-sm-2 control-label">NombreEmpresa</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['nombreEmpresa', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldNombreempresa']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldIdentificadorEmpresa" class="col-sm-2 control-label">Identificador de Empresa</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['identificadorEmpresa', 'size' => 30, 'class' => 'form-control', 'id' => 'identificadorEmpresa']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldEstadoregistro" class="col-sm-2 control-label">EstadoRegistro</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['estadoRegistro', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldEstadoregistro']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldFechainsercion" class="col-sm-2 control-label">FechaInsercion</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['fechaInsercion', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldFechainsercion']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldUsuarioinsercion" class="col-sm-2 control-label">UsuarioInsercion</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['usuarioInsercion', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldUsuarioinsercion']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldFechamodificacion" class="col-sm-2 control-label">FechaModificacion</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['fechaModificacion', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldFechamodificacion']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldUsuariomodificacion" class="col-sm-2 control-label">UsuarioModificacion</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['usuarioModificacion', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldUsuariomodificacion']) ?>
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?= $this->tag->submitButton(['Save', 'class' => 'btn btn-default']) ?>
    </div>
</div>

</form>
