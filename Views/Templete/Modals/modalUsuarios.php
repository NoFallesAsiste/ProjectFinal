<!-- Modal register new usuer-->
<div class="modal fade" id="modalFormUsuario" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
        <div class="modal-header headerRegister">
            <h5 class="modal-title" id="titleModal">Nuevo Usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="formUsuario" name="formUsuario" class="form-horizontal">
                <input type="hidden" id="idUsuario" name="idUsuario" value="">
                <p class="text-primary">Todos los campos son obligatorios.</p>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="strContraseña">Contraseña</label>
                    <input type="text" class="form-control valid" id="strContraseña" name="strContraseña" >
                    </div>
                    <div class="form-group col-md-6">
                    <label for="strNombre">Nombres</label>
                    <input type="text" class="form-control valid validText" id="strNombre" name="strNombre" >
                    </div>
                    <div class="form-group col-md-6">
                    <label for="strApellido">Apellidos</label>
                    <input type="text" class="form-control valid validText" id="strApellido" name="strApellido" >
                    </div>

                    <div class="form-group col-md-6">
                        <label for="strDireccion">Direccion de residencia:</label>
                        <input type="text" class="form-control valid" id="strDireccion" name="strDireccion"  >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="strEmail">Correo mi SENA</label>
                        <input type="text" class="form-control valid validEmail" id="strEmail" name="strEmail"  >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="intCelular">Celular:</label>
                        <input type="text" class="form-control valid validNumber" id="intCelular" name="intCelular"  >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="intNroDocumento">Numero de documento</label>
                        <input type="text" class="form-control valid validNumber" id="intNroDocumento" name="intNroDocumento" >
                    </div>&nbsp;&nbsp;
                    <div class="form-group">
                        <label for="intTipoDocumento"  >Tipo de documento</label>
                        <select class="form-control" name="intTipoDocumento" id="intTipoDocumento">
                            <option value="1">Cedula Ciudadania</option>
                            <option value="2">Tarjeta de identidad</option>
                            <option value="3">Cedula de extrangeria</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="intFichas">Ficha asignada</label>
                        <input type="text" class="form-control valid validNumber" id="intFichas" name="intFichas" >
                    </div>&nbsp;&nbsp;
                    <div class="form-group">
                        <label for="intRol" >Rol</label>
                        <select class="form-control valid validNumber" name="intRol" id="intRol">
                            <option value="1">Administrador</option>
                            <option value="2">Instructor</option>
                            <option value="3">Aprendiz</option>
                            <option value="4">Vocero</option>
                        </select>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="form-group">
                        <label for="intEstadoUsuario">Estado del Usuario</label>
                        <select class="form-control" name="intEstadoUsuario" id="intEstadoUsuario">
                            <option value="1">Activo</option>
                            <option value="2">Contratado</option>
                            <option value="3">Pdte</option>
                        </select>
                    </div>
                    <div class="tile-footer">
                        <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
                    </div>
                </div>

            </form>
            </div>
            </div>
        </div>
        </div>

    </div>
</div>


<!-- Modal view register-->
<div class="modal fade" id="modalViewUser" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
        <div class="modal-header headerRegister">
            <h5 class="modal-title" id="titleModal">El user es:</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                          <div class="modal-body">
                    <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Id del usuario:</td>
                            <td id="userIdUsuario">Jacob</td>
                        </tr>
                        <tr>
                            <td>Nombres:</td>
                            <td id="userNombre">Jacob</td>
                        </tr>
                        <tr>
                            <td>Apellidos:</td>
                            <td id="userApellido">Jacob</td>
                        </tr>
                        <tr>
                            <td>Contraseña:</td>
                            <td id="userContraseña">Jacob</td>
                        </tr>
                        <tr>
                            <td>Tipo de Documento:</td>
                            <td id="userTipoDocumento">Jacob</td>
                        </tr>
                        <tr>
                            <td>Nro de Documento:</td>
                            <td id="userNroDocumento">Jacob</td>
                        </tr>
                        <tr>
                            <td>Correo Mi Sena:</td>
                            <td id="userEmail">Jacob</td>
                        </tr>
                        <tr>
                            <td>Celular:</td>
                            <td id="userCelular">Jacob</td>
                        </tr>
                        <tr>
                            <td>Dirección:</td>
                            <td id="userDireccion">Larry</td>
                        </tr>
                        <tr>
                            <td>Fichas Asociadas</td>
                            <td id="userFichasAsociadas">Larry</td>
                        </tr>
                        <tr>
                            <td>Rol</td>
                            <td id="userRol">Larry</td>
                        </tr>
                        <tr>
                            <td>Estado del Usuario</td>
                            <td id="userEstadoUsuario">Larry</td>
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

