<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Buscar Usuarios</h4>
	  </div>
	  <div class="modal-body">
		<form class="form-horizontal">
		  <div class="form-group">
			<div class="col-sm-6">
			  <input type="text" class="form-control" id="labelBusquedaUsuario" placeholder="Buscar Usuarios">
			</div>
			<div id="buscar">
                        <button class="btn btn-default" id="listaUsuarios">
                            <span class='glyphicon glyphicon-search'></span> Buscar
                        </button>
                        </div>
		  </div>
		</form>
		<div id="loader" style="position: absolute;text-align:center;top:55px;width:100%;display:none;">
                </div><!-- Carga gif animado -->
		<div class="outer_div" >
                    <div class="table-responsive">
			<table class="table">
				<tr  class="warning">
                                    <th>Código</th>
                                    <th>Producto</th>
                                    <th><span class="pull-right">Cant.</span></th>
                                    <th><span class="pull-right">Precio</span></th>
                                    <th class='text-center' style="width: 36px;">Agregar</th>
				</tr>
                                <div id="content">
                                    <tr>
                                        <td>1</td>
                                        <td>xxx</td>
                                        <td class='col-xs-1'>
                                            <div class="pull-right">
                                                <input type="text" class="form-control" style="text-align:right" id=""  value="" >
                                            </div>
                                        </td>
                                        <td class='col-xs-2'>
                                            <div class="pull-right">
                                                <input type="text" class="form-control" style="text-align:right" id=""  value="" >
                                            </div>
                                        </td>
                                        <td class='text-center'>
                                            <a class='btn btn-info'href="#" onclick="">
                                                <i class="glyphicon glyphicon-plus">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                </div>
				<tr>
                                <td colspan=5><span class="pull-right">
                                </span></td>
				</tr>
			</table>
                    </div>
                </div><!-- Datos ajax Final -->
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		
	  </div>
	</div>
  </div>
</div>