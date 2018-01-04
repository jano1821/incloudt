<div class="modal fade bs-example-modal-lg" id="myModalSistema" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
            <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Buscar Sistema</h4>
            </div>
            <div class="modal-body">
		  <div class="form-group">
			<div class="col-sm-6">
			  <input type="text" class="form-control" id="labelBusquedaSistema" placeholder="Buscar Sistema">
			</div>
			<div id="buscar">
                        <button class="btn btn-default" id="listaSistemas">
                            <span class='glyphicon glyphicon-search'></span> Buscar
                        </button>
                        </div>
		  </div>
		<div id="loader" style="position: absolute;text-align:center;top:55px;width:100%;display:none;">
                </div><!-- Carga gif animado -->
                <div class="table-responsive">
                    <div id="contentSistema">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
	</div>
  </div>
</div>
<script type="text/javascript">
    function agregarSistema(idSistema,nombreSistema){
        document.getElementById("codSistema").value = idSistema;
        document.getElementById("nombreSistema").value = nombreSistema;        
    }
</script>