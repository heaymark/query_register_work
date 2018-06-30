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

                    <button type="button" id="dgiFilterSearch" class="pull-right"><i class="fa fa-hand-o-right" aria-hidden="true"></i>Ir a</button>
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
            <div id="dro" class="tab-pane">
              <div class="panel panel-default">
                <div class="panel-body">
                  <span class="col-xs-12">
                    <div class="form-group">
                      <label>DRO:</label>
                      <select id="search_dro" name="search_dro" class="form-control"></select>
                    </div>
                    <button type="button" id="bdro" class="pull-right"><i class="fa fa-hand-o-right" aria-hidden="true"></i>Ir a</button>
                  </span>
                </div>
              </div>
            </div>
          </div><!-- Fin tabs -->
        </div>
        <!--  -->
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
        <!-- -->
        <div id="toolsgraphics" class="col-xs-12 col-sm-4 col-md-4">
          <div id="container"></div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="mdl" class="modal fade" role="dialog">
  <div id="mdlDlg" class="modal-dialog">
    <div class="modal-content">
              <div id="mdlHeader" class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 id="mdlTitle" class="modal-title"  style="background-color:#353535;color:#FFFFFF;">Información de la infraestructura</h4>
              </div>
              <div id="mdlContent" class="modal-body"></div>
              <div id="mdlFooter" class="modal-footer"></div>
          </div>
      </div>
</div>
<div id="googlemap" style="width:300px;heigth:400px;"></div>

<script>
  // graphserieline("","","container","");
</script>

