<?php headerAdmin($data); ?>
<main class="app-content">
      <div class="row user">

        <div class="col-md-12">
          <div class="profile">
            <div class="info"><img class="user-img" src=<?= media()."/images/avatar.jpg";?>>
              <h4><?= $_SESSION['userData']['nombre']." ".$_SESSION['userData']['apellido'] ?></h4>
              <p><?= $_SESSION['userData']['nombre_rol']; ?></p>
            </div>
            <div class="cover-image"></div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="tile p-0">
            <ul class="nav flex-column nav-tabs user-tabs">
              <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab">Datos Personales</a></li>
              <li class="nav-item"><a class="nav-link" href="#user-settings" data-toggle="tab">Datos de contacto</a></li>
            </ul>
          </div>
        </div>

        <div class="col-md-9">
          <div class="tab-content">
            <div class="tab-pane active" id="user-timeline">
              <div class="timeline-post">

                <div class="post-media">
                  <div class="content">
                    <button class="btn btn-info" type="button" onclick="openModalPerfil()"> <i class="fas fa-pencil-alt" aria-hidden="true"></i>  Datos Personales</button>
                  </div>
                </div>

                <div class="post-content">
                   <table class="table table-bordered">
                       <tbody>
                         <tr>
                           <td style="width:150px;">Identificacion:</td>
                           <td><?= $_SESSION['userData']['numero_documento'];?></td>
                         </tr>
                         <tr>
                         <td>Nombres:</td>
                         <td><?= $_SESSION['userData']['nombre'];?></td>
                      </tr>
                      <tr>
                         <td>Apellidos:</td>
                         <td><?= $_SESSION['userData']['apellido'];?></td>
                      </tr>
                      <tr>
                         <td>Correo:</td>
                         <td><?= $_SESSION['userData']['direccion'];?></td>
                      </tr>
                    </tbody>
                       </table>
                </div>
              </div>

            </div>
            <div class="tab-pane fade" id="user-settings">
              <div class="tile user-settings">
                <h4 class="line-head">Datos de Contacto</h4>

                <form id="formDataUsuario" name="formDataUsuario">

                  <div class="row mb-6">
                    <div class="col-md-6">
                      <label>First Name</label>
                      <input class="form-control" type="text">
                    </div>

                    <div class="col-md-6">
                      <label>Last Name</label>
                      <input class="form-control" type="text">
                    </div>    
                  </div>

                  <div class="row">

                    <div class="col-md-12 mb-4">
                      <label>Email</label>
                      <input class="form-control" type="text">
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-md-12 mb-4">
                      <label>Mobile No</label>
                      <input class="form-control" type="text">
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-md-12 mb-4">
                      <label>Office Phone</label>
                      <input class="form-control" type="text">
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-md-12 mb-4">
                      <label>Home Phone</label>
                      <input class="form-control" type="text">
                    </div>

                  </div>

                  <div class="row mb-10">
                    <div class="col-md-12">
                      <button class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>
                    </div>
                  </div>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
<?php footerAdmin($data); ?>