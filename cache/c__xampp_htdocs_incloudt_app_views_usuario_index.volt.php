<div class="page-header">
    <h1>
        Search usuario
    </h1>
    <p>
        <?= $this->tag->linkTo(['usuario/new', 'Create usuario']) ?>
    </p>
</div>

<?= $this->getContent() ?>

<?= $this->tag->form(['usuario/search', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>

<div class="form-group">
    <label for="fieldCodusuario" class="col-sm-2 control-label">CodUsuario</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['codUsuario', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldCodusuario']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldCodempresa" class="col-sm-2 control-label">CodEmpresa</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['codEmpresa', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldCodempresa']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldNombreusuario" class="col-sm-2 control-label">NombreUsuario</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['nombreUsuario', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldNombreusuario']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldPasswordusuario" class="col-sm-2 control-label">PasswordUsuario</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['passwordUsuario', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldPasswordusuario']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldCantidadintentos" class="col-sm-2 control-label">CantidadIntentos</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['cantidadIntentos', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldCantidadintentos']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldIndicadorusuarioadministrador" class="col-sm-2 control-label">IndicadorUsuarioAdministrador</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['indicadorUsuarioAdministrador', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldIndicadorusuarioadministrador']) ?>
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
        <?= $this->tag->submitButton(['Search', 'class' => 'btn btn-default']) ?>
    </div>
</div>

</form>
