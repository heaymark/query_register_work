<div class="container-fluid">
  <div class="row">
    <div id="pnlmaps" class="col-xs-12 col-sm-12 col-md-12">
      <div class="row">
        <div id="divMapMain"></div><!-- mapa -->
        <div id="dv_options">
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" data-tab="ubicacion" href="#ubica">Ubicación</a></li>
            <li><a data-toggle="tab" data-tab="tramite" href="#tramite">Tramite</a></li> <!-- nombre de la tab -->
            <li><a data-toggle="tab" data-tab="dro" href="#dro">DRO</a></li> <!-- nombre de la tab -->
          </ul>
          <div class="tab-content">
            <!-- informacion del direccion -->
            <div id="ubica" class="tab-pane fade in active">
              <div class="panel panel-default">
                <div class="panel-body">
                  <span class="col-xs-12">
                    <div class="form-group">
                      <label>Delegacion</label>
                      <select id="dgiCmbDel" name="dgiCmDel" class="form-control"></select>
                    </div>
                    <div class="form-group">
                        <label>Colonia</label>
                        <select id="dgiCmbCol" name="dgiCmCol" class="form-control">
                          <option value=""></option>
                        </select>
                    </div>
                    <button type="button" id="dgiFilterSearch" class="pull-right btn btn-primary"> Ir a <i class="fa fa-hand-o-right" aria-hidden="true"></i></button>
                  </span>
                </div>
              </div>
            </div>
            <!-- informacion del tramite -->
            <div id="tramite" class="tab-pane">
              <div class="panel panel-default">
                <div class="panel-body">
                  <span class="col-xs-12">
                    <div class="form-group">
                      <label>Tipo Formato:</label>
                      <select id="tipo_formato" name="tipo_formato" class="form-control" style="width:100%;" required >
                        <option value="">Seleccionar</option>
                      </select>
                    </div>
                    <div class="form-group">
                        <label>Subtipo Formato</label>
                        <select id="subtipo_formato_select" name="subtipo_formato_select" class="form-control" style="width:100%;" required >
                          <option value="">Seleccionar</option>
                        </select>
                    </div>
                    <!--<button type="button" id="btramite" class="pull-right"><i class="fa fa-hand-o-right" aria-hidden="true"></i>Ir a</button>-->
                  </span>
                </div>
              </div>
            </div>
            <!-- informacion del dro -->
            <div id="dro" class="tab-pane" >
              <div class="panel panel-default">
                <div class="panel-body">
                  <span class="col-xs-12">
                    <div class="form-group">
                      <label>DRO:</label>
                      <input type="text" id="numerodedro" name="numerodedro" class="form-control" required>
                      <!-- <select id="numerodedro" name="numerodedro" class="form-control"></select> -->
                    </div>
                    <div class="form-group">
                    </div>
                    <button type="button" id="bdro" class="pull-right btn btn-primary"> Ir a  </button>
                  </span>
                </div>
              </div>
              <!-- Panel de informacion -->
              <div id="info_dro" class="panel panel-default" style="display: none;"><!--   -->
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-sm-10 col-md-10"><h4 id="name_dro"> </h4> </div>
                    <div class="col-sm-2 col-md-2"><button id="close_panel" type="button" class="btn btn-danger btn-xs"> X </button></div>
                  </div>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-4">Num:</div> 
                    <div class="col-md-4 col-md-offset-4" id="num_dro"> </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8">Fecha Vigencia:</div> 
                    <div class="col-md-4" id="fecha_vigencia">04/07/2018</div>                    
                  </div>
                  <br>

                  <div class="row">
                    <div class="col-md-12 pre-scrollable" id="list_tramites">
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">Total de Obras</div>
                    <div class="col-xs-6 col-sm-6 col-md-6 text-end" id="total_obra"> </div>                    
                  </div>
                  <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">Total Metros</div>
                    <div class="col-xs-4 col-sm-4 col-md-4 text-end" id="total_metros"> </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 text-left">m<sup>2</sup></div>
                  </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" style="width: 45%; height:60%;">
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div><!-- Fin tabs -->
        </div>
        <!-- Download kml,csv  -->
        <div id="dvdownload" class="tab-pane">
          <div id="download" class="panel panel-default">
          <div id="toolsdownload"  class="panel-body">
            <h5>Seleccione un tipo de archivo a exportar:</h5>
              <button class="button download" data-table='"develop".dro_tramites' data-format="csv" onclick="getfile(this);">csv</button>
              <button class="button download" data-table='"develop".dro_tramites' data-format="shp" onclick="getfile(this);">shp</button>
              <button class="button download" data-table='"develop".dro_tramites' data-format="kml" onclick="getfile(this);">kml</button>
              <button class="button download" data-table='"develop".dro_tramites' data-format="svg" onclick="getfile(this);">svg</button>
              <button class="button download" data-table='"develop".dro_tramites' data-format="geojson" onclick="getfile(this);">geojson</button>
          </div>
          </div>
        </div>
        <!-- Grafica -->
        <div id="toolsgraphics" class="col-xs-12 col-sm-4 col-md-4" style="display: none;">
          <button type="button" id="close_graphic" class="btn btn-danger btn-xs" style="display: none;"> X </button>
          <div id="container"></div>
        </div>
        <div id="btn_graf" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-stats"></span></div>
      </div>
    </div>
  </div>
</div>

<div id="mdl" class="modal fade" role="dialog">
  <div id="mdlDlg" class="modal-dialog">
    <div class="modal-content">
              <div id="mdlHeader" class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 id="mdlTitle" class="modal-title" >Información </h4><!-- style="background-color:#353535;color:#FFFFFF;" -->
              </div>
              <div id="mdlContent" class="modal-body"></div>
              <div id="mdlFooter" class="modal-footer">
                <div class="show_pdf"></div>
              </div>
          </div>
      </div>
</div>
<div id="googlemap" style="width:300px;heigth:400px;"></div>

