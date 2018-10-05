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
            <li><a data-toggle="tab" data-tab="status" href="#status">Estado</a></li> <!-- nombre de la tab -->
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
                      <input type="hidden" name="tf" id="tf" value="">
                    </div>
                    <div class="form-group">
                        <label>Subtipo Formato</label>
                        <select id="subtipo_formato_select" name="subtipo_formato_select" class="form-control" style="width:100%;" required >
                          <option value="">Seleccionar</option>
                        </select>
                      <input type="hidden" name="ts" id="ts" value="">
                    </div>
                    <!-- <div class="form-group">
                        <label>Grafica</label>
                        <br>
                        <label class="checkbox-inline"><input type="radio" name="grafica" id="barra" value="barra" checked>Barras</label>
                        <label class="checkbox-inline"><input type="radio" name="grafica" id="tiempo" value="tiempo">Tiempo</label>
                    </div> -->
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
                      <label>Num Registro:</label>
                      <input type="text" id="numerodedro" name="numerodedro" class="form-control" onkeypress="return onKeyDecimal(event,this);" required>
                      <!-- <select id="numerodedro" name="numerodedro" class="form-control"></select> -->
                    </div>
                    <div class="form-group">
                      <label>Perfil:</label>
                      <select id="tipo_dro" name="tipo_dro" class="form-control" style="width:100%;" required >
                        <option value="">Seleccionar</option>
                      </select>
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
                    <div class="col-sm-2 col-md-2"><button id="clos_info" type="button" class="close_panel btn btn-danger btn-xs"> X </button></div>
                  </div>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-4">Num Reg:</div> 
                    <div class="col-md-4 col-md-offset-4" id="num_dro"> </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8">Fecha Vigencia:</div> 
                    <div class="col-md-4" id="fecha_vigencia">04/07/2018</div>                    
                  </div>
                  <br>

                  <div class="row">
                    <div class="list-group col-md-12 pre-scrollable" id="list_tramites">

                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">Total de Obras</div>
                    <div class="col-xs-6 col-sm-6 col-md-6 text-end" id="total_obra"> </div>                    
                  </div>
                  <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">Total Metros</div>
                    <div class="col-xs-4 col-sm-4 col-md-4 text-left" id="total_metros"> </div>  <!-- text-end -->
                    <div class="col-xs-2 col-sm-2 col-md-2 text-left">m<sup>2</sup></div>
                  </div>
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" > <!-- style="width:4%" -->
                    </div>
                  </div> 

                </div>
              </div>
              <div id="sn_resul" class="panel panel-default" style="display: none;"><!--   -->
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-sm-10 col-md-10"><h4 id="name_dro"> </h4> </div>
                    <div class="col-sm-2 col-md-2"><button id="close_resul" type="button" class="close_panel btn btn-danger btn-xs"> X </button></div>
                  </div>
                </div>
                <div class="panel-body">
                  <div id="txt_sn_resul"></div>
                </div>
              </div>  
            </div>

            <div id="status" class="tab-pane">
              <div class="panel panel-default">
                <div class="panel-body">
                  <span class="col-xs-12">
                    <div class="form-group">
                      <label>Estado Actual:</label>
                      <!-- <select id="estado_mc" name="estado_mc" class="form-control" style="width:100%;" required >
                        <option value="">Seleccionar</option>
                      </select> -->
                      <select id="estado_mc_1" name="estado_mc_1" class="form-control" style="width:100%;" required >
                        <option value="">Seleccionar</option>
                        <option value="0">Todos</option> 
                        <option value="1234">Obra en proceso</option>
                        <option value="5">Obra en ejecucion</option>
                        <option value="6">Obra en prorroga</option>
                        <option value="7">Obra en terminacion</option>
                      </select>
                      <input type="hidden" name="status_rmc" id="status_rmc" value="">
                    </div>
                  </span>
                </div>
              </div>

              <!-- Panel -->
              <!-- Fin Panel -->
            </div>
          </div><!-- Fin tabs -->
        </div>
        <!-- Download kml,csv  -->
        <div id="dvdownload" class="tab-pane" style="display: none">
          <div class="filtering">
            <button type="button" id="" class="pull-right close_filter" style="border-radius: 3px;">×</button>
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
        </div>
          <!-- Grafica -->
          <div id="toolsgraphics" class="col-xs-12 col-sm-4 col-md-4" style="display: none;"> <!--   -->
            <button type="button" id="close_graphic" class="btn btn-danger btn-xs" style="display: none;"> X </button>
              <div id="container"></div>   <!-- style="height: 400px; min-width: 310px" -->
          </div>
        <div id="btn_graf" class="btn btn-primary btn-lg"><span class="fa fa-bar-chart" aria-hidden="true"></span></div>
        <div id="btn_graf_2" class="btn btn-primary btn-lg"><span class="fa fa-line-chart" aria-hidden="true"></span></div>
      </div> <!-- <div class="row"> -->
    </div> <!-- <div id="pnlmaps" -->
  </div> <!-- <div class="row"> -->
</div> <!-- <div class="container-fluid"> -->

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

<div id="options" style="display: none">
  <div class="filtering">
    <button type="button" id="" class="pull-right close_filter" style="border-radius: 3px;">×</button>
    <br />
    <div class="form-group">
      <br />
      <label for="buscador">Busquerda por:</label>
      <select id="buscador" class="form-control" style="width: 100%">
        <option value="">Seleccione una opcion</option>
        <option value="1">Dirección</option>
        <option value="2">Cuenta Predial</option>
        <!-- <option value="3">Expediente</option> -->
        <!-- <option value="4">DRO</option> -->
      </select>
    </div>

    <div class="form-group" id="div_google" style="display: none">
        <label for="txtDireccion">Dirección:</label>
        <input id="txtDireccion" name="txtDireccion" placeholder="calle, numero, colonia" class="form-control text-uppercase input-sm" autocomplete="off" type="text">
    </div>

    <div class="row" id="div_predio" style="display: none">
      <br />
      <div class="col-md-4 col-sm-4 col-xs-4">
        <div class="form-group">
          <label class="sr-only" for="region">Región:</label>
          <input type="text" class="form-control text-uppercase" maxlength="3" id="region_search" placeholder="Region"/>
        </div>
      </div>

      <div class="col-md-4 col-sm-4 col-xs-4">
        <div class="form-group">
          <label class="sr-only" for="fecha_fin">Manzana:</label>
          <input type="text" class="form-control text-uppercase" maxlength="3" id="manzana_search" placeholder="Manzana"/>
        </div>
      </div>

      <div class="col-md-4 col-sm-4 col-xs-4">
        <div class="form-group">
          <label class="sr-only" for="fecha_fin">Lote:</label>
          <input type="text" class="form-control text-uppercase" maxlength="2" id="lote_search" placeholder="Lote"/>
        </div>
      </div>
    </div>

    <!-- <div class="row" id="div_expediente" style="display: none">
      <div class="col-md-12 form-group">
        <label for="expediente">Expediente:</label>
        <input type="expediente" class="form-control text-uppercase" placeholder="Expediente"/>
      </div>
    </div> -->

    <div class="row" id="div_expediente" style="display: none">
      <div class="col-md-12 form-group">
        <label for="expediente2">Expediente:</label>
        <select id="expediente2" class="form-control" style="width: 100%"></select>
      </div>
    </div>

    <div id="div_btn" style="display:none">
      <center>
        <a id="boton_filtro" class="btn btn-xs btn-primary ">Ir&nbsp;<i class="fa fa-hand-o-right"></i></a>
      </center>
    </div>
        <center><br /><p id="message" style="color:red; display: none"></p></center>
  </div>
</div>


<button id="btn_legend" class="btn btn-default btn-sm" style="display: none;">
  <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
</button>
<div class='cartodb-legend category' style="left:42px; right:initial;">
  <div class="legend-title" style="color:#284a59">Manifestación Const. </div>
    <li class="fa"><img id="status_eject" alt="Smiley face" height="20" width="20"></li>&nbsp;Tipo B <!-- En ejecución -->
    <br>
    <li class="fa"><img id="status_trami" alt="Smiley face" height="20" width="20"></li>&nbsp;Tipo C <!-- En tramite -->
</div>

<div id="googlemap" style="width:300px;heigth:400px;"></div>

