<!-- Modal -->
<div class="modal fade" name="modalFormClases" id="modalFormClases" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" >
    <div class="modal-content" >
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nueva Clase</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="tile-body">
              <form id="formClases" name="formClases" method="post">
                <input type="hidden" id="idclase" name="idclase" value="">
                <div class="form-group">
                  <label class="control-label">Fecha y hora</label>
                  <input class="form-control" name="txtfechayhora" id="txtfechayhora" type="datetime-local" >
                </div>

               
  
                <div class="form-group">
                  <label class="control-label">Aula</label>
                  <input class="form-control" name="txtaula" id="txtaula">
                </div>

                <div class="form-group">
                  <label for="exampleSelect1" >Nombre de la clase</label>
                  <input class="form-control" name="txtnombre_clase" id="txtnombre_clase" type="text" >
                  </div>

                <div class="form-group">
                  <label class="control-label">Ficha</label>
                  <select class="form-control" name="intficha" id="intficha">
                     <option value="1">1</option>
                     <option value="2141041">2141041</option>
                  </select>
                </div>



                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button id="btnActionForm" type="submit" class="btn btn-primary"><span id="btnText"> Guardar</span></button>
                </div>
                
              </form>
            </div>
      <!---->
      </div>
    </div>
  </div>
</div>

<!-- Modal view clase-->
<div class="modal fade" id="modalViewClases" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos de la clase</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>fecha y hora:</td>
              <td id="fechayhora"></td>
            </tr>
            <tr>
              <td>Aula:</td>
              <td id="aula"></td>
            </tr>
            <tr>
              <td>Nombre de la clase:</td>
              <td id="nombre_clase">Nom clase</td>
            </tr>
            <tr>
              <td>Nro de ficha</td>
              <td id="ficha"></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>j