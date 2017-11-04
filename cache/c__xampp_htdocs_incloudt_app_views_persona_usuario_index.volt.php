<div class="row">
<div class="container">
<div class="panel panel-info">
<div class="panel-heading">
<div class="btn-group pull-right">
<?= $this->tag->linkTo(['menu', '<i class=\'glyphicon glyphicon-chevron-left\'></i> Volver al Menu', 'class' => 'btn btn-info']) ?>
<?= $this->tag->linkTo(['usuario/index', '<i class=\'glyphicon glyphicon glyphicon-user\'></i> Ir a Usuarios', 'class' => 'btn btn-info']) ?>
<?= $this->tag->linkTo(['persona_usuario/new', '<i class=\'glyphicon glyphicon-plus\'></i> Nueva Persona Usuaria', 'class' => 'btn btn-info']) ?>
</div>
<h4><i class='glyphicon glyphicon-search'></i> Búsqueda de Personas Usuarias</h4>
</div>

<div class="page-header">
</div>
<?= $this->getContent() ?>

<?= $this->tag->form(['persona_usuario/search', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>

<div class="table">

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">    
<label for="fieldNombrespersona">NombresPersona</label>
</div>
<div class="col-md-4">
<?= $this->tag->textField(['nombresPersona', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldNombrespersona']) ?>
</div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
<label for="fieldApellidospersona">ApellidosPersona</label>
</div>
<div class="col-md-4">
<?= $this->tag->textField(['apellidosPersona', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldApellidospersona']) ?>
</div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
<label for="fieldNumerodocumento">NumeroDocumento</label>
</div>
<div class="col-md-2">
<?= $this->tag->textField(['numeroDocumento', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldNumerodocumento']) ?>
</div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
<label for="fieldNumerocelular">NumeroCelular</label>
</div>
<div class="col-md-2">
<?= $this->tag->textField(['numeroCelular', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldNumerocelular']) ?>
</div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
<label for="fieldNumeroanexo">NumeroAnexo</label>
</div>
<div class="col-md-2">
<?= $this->tag->textField(['numeroAnexo', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldNumeroanexo']) ?>
</div>
</div>

<div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
                        <label for="fieldEstadoregistro">Estado de Registro</label>
                    </div>
                    <div class="col-md-3">
                        <?= $this->tag->selectStatic(['estadoRegistro', ['' => 'Seleccione Estado...', 'S' => 'Vigente', 'N' => 'No Vigente'], 'class' => 'form-control']) ?>
                    </div>
                </div>




<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
</div>
<div class="col-md-2">
<?= $this->tag->linkTo(['persona_usuario/reset', 'Limpiar', 'class' => 'btn btn-default']) ?>   
<?= $form->render('buscar') ?>
<?= $form->render('csrf', ['value' => $this->security->getToken()]) ?>
</div>
</div>
</div>
    </form>
</div>
</div>
