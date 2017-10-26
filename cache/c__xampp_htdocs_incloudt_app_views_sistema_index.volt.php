<div class="page-header">
    <h1>
        Search sistema
    </h1>
    <p>
        <?= $this->tag->linkTo(['sistema/new', 'Create sistema']) ?>
    </p>
</div>

<?= $this->getContent() ?>

<?= $this->tag->form(['sistema/search', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>

<div class="form-group">
    <label for="fieldCodsistema" class="col-sm-2 control-label">CodSistema</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['codSistema', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldCodsistema']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldEtiquetasistema" class="col-sm-2 control-label">EtiquetaSistema</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['etiquetaSistema', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldEtiquetasistema']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldUrlsistema" class="col-sm-2 control-label">UrlSistema</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['urlSistema', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldUrlsistema']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldUrlicono" class="col-sm-2 control-label">UrlIcono</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['urlIcono', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldUrlicono']) ?>
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
        <?= $this->tag->textField(['usuarioInsercion', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldUsuarioinsercion']) ?>
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
        <?= $this->tag->textField(['usuarioModificacion', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldUsuariomodificacion']) ?>
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?= $this->tag->submitButton(['Search', 'class' => 'btn btn-default']) ?>
    </div>
</div>

</form>
