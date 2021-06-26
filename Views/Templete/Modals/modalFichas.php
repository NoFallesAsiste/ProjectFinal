<!-- Modal register new Ficha-->
<div class="modal fade" id="modalFormFicha" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
        <div class="modal-header headerRegister">
            <h5 class="modal-title" id="titleModal">Nuevo Ficha</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="formFicha" name="formFicha" class="form-horizontal">

                <p class="text-primary">Todos los campos son obligatorios.</p>

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="intFicha">Nro Ficha</label>
                        <input type="text" class="form-control valid validNumber" id="intFicha" name="intFicha" >
                    </div>

                    <div class="form-group col-md-6">
                        <label for="dataInicioFormacion">Fecha de Inicio de Formación</label>
                        <input  type="date" class="form-control" id="dateInicioFormacion" name="dateInicioFormacion" >
                    </div>

                    <div class="form-group">
                        <label for="intPrograma" >Programa</label>
                        <select class="form-control" name="intPrograma" id="intPrograma">
                            <option value="1">ADSI</option>
                            <option value="2">Tec Teleinformática</option>
                            <option value="3">Tec Electricidad</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="intHorario">Horario</label>
                        <select class="form-control" name="intHorario" id="intHorario">
                            <option value="1">Diruno</option>
                            <option value="2">Nocturno</option>
                            <option value="3">Madrugada</option>
                            <option value="3">Fines de semana</option>

                        </select>
                    </div>
                </div>
                <div class="tile-footer">
                    <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
                </div>

            </form>
            </div>
            </div>
        </div>
        </div>

    </div>
</div>


<!-- Modal view register fichas-->
<div class="modal fade" id="modalViewFicha" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
        <div class="modal-header headerRegister">
            <h5 class="modal-title" id="titleModal">Datos de la ficha:</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                          <div class="modal-body">
                    <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>ID FICHA:</td>
                            <td id="IdFicha">Jacob</td>
                        </tr>
                        <tr>
                            <td>HORARIO:</td>
                            <td id="viewHorario">Jacob</td>
                        </tr>
                        <tr>
                            <td>PROGRAMA:</td>
                            <td id="viewPrograma">Jacob</td>
                        </tr>
                        <tr>
                            <td>FECHA INICIO DE FORMACIÓN:</td>
                            <td id="dateInicioFormacion">Jacobb</td>
                        </tr>
                        
                    </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
            </div>
        </div>
        </div>

    </div>
</div>

<!-- Modal add aprendices a fichas-->
<div class="modal fade" id="modalAddAprendices" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
        <div class="modal-header headerRegister">
            <h5 class="modal-title" id="titleModalIdFicha">Ficha no seleccionada:</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                  <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="tableUsuarios">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>NOMBRES</th>
                              <th>APELLIDOS</th>
                              <th>TIPO DOCUMENTO</th>
                              <th>NRO DOCUMENTO</th>
                              <th>ROL</th>
                              <th>ESTADO USUARIO</th>
                              <th>OPCIONES</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
        </div>

    </div>
</div>