<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"><?= $this->tag->linkTo(['persona_usuario', 'Go Back']) ?></li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Create persona_usuario
    </h1>
</div>

<?= $this->getContent() ?>

<?= $this->tag->form(['persona_usuario/create', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>

<div class="form-group">
    <label for="fieldNombrespersona" class="col-sm-2 control-label">NombresPersona</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['nombresPersona', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldNombrespersona']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldApellidospersona" class="col-sm-2 control-label">ApellidosPersona</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['ApellidosPersona', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldApellidospersona']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldNumerodocumento" class="col-sm-2 control-label">NumeroDocumento</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['numeroDocumento', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldNumerodocumento']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldNumerocelular" class="col-sm-2 control-label">NumeroCelular</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['numeroCelular', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldNumerocelular']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldNumeroanexo" class="col-sm-2 control-label">NumeroAnexo</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['numeroAnexo', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldNumeroanexo']) ?>
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
