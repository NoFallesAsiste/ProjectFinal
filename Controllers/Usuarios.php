<?php 

	class Usuarios extends Controllers{
		
		public function __construct()
		{
			parent::__construct();
			session_start();
		    if(empty($_SESSION['login']))
		    {
		      header('Location: '.base_url().'/login');
		    }else if ($_SESSION['userData']['idrol']!=1) {
		      header('Location: '.base_url().'/dashboard');		
		    }

		}
		

		public function Usuarios()
		{
			$data['page_id'] = 4;
			$data['page_tag'] = "Usuarios";
			$data['page_title'] = "USUARIOS ";
			$data['page_name'] = "usuarios";
			$data['page_functions_js']= "functions_usuarios.js";
			
			$this->views->getView($this,"usuarios",$data);
		}
		

		public function setUsuario(){
			if($_POST){
				
				if( empty($_POST['strContraseña']) || empty($_POST['strNombre']) || empty($_POST['strApellido']) || empty($_POST['intNroDocumento'])|| empty($_POST['intFichas']) || empty($_POST['strDireccion']) || empty($_POST['intTipoDocumento']) || empty($_POST['intRol']) || empty($_POST['intEstadoUsuario']) || empty($_POST['intCelular']) || empty($_POST['strEmail']))
				{
					
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else{ 
					$idUsuario =$_POST['idUsuario'];
					$strContraseña=$_POST['strContraseña'];
					$strNombre=strClean($_POST['strNombre']);
					$strApellido=strClean($_POST['strApellido']);
					$intNroDocumento=intval($_POST['intNroDocumento']);
					$strEmail=$_POST['strEmail'];
					$intCelular=intval($_POST['intCelular']);
					$strDireccion=$_POST['strDireccion'];
					$intTipoDocumento=intval($_POST['intTipoDocumento']);
					$intFichas=intval($_POST['intFichas']);
					$intRol=intval($_POST['intRol']);
					$intEstaUsuario=intval($_POST['intEstadoUsuario']);
					

					if($idUsuario == "")
					{
						$option = 1;
						$request_user = $this->model->insertUsuario(
														$strContraseña,
														$strNombre,
														$strApellido,
														$intNroDocumento,
														$strDireccion,
														$strEmail,
														$intCelular,
														$intTipoDocumento,
														$intRol,
														$intEstaUsuario);
					}else{
						$option = 2;
						$request_user = $this->model->updateUsuario(
														$idUsuario,
														$strContraseña,
														$strNombre,
														$strApellido,
														$intNroDocumento,
														$strDireccion,
														$strEmail,
														$intCelular,
														$intTipoDocumento,
														$intRol,
														$intEstaUsuario);

					}

					if($request_user > 0 )
					{
						if($option == 1){
							$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
						}else{
							$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
						}	
					}else{
						$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
					}
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function getUsuarios(string $inactivos="")
		{	
			if ($inactivos=="") {
				$arrData = $this->model->selectUsuarios();
			}else{
				$arrData = $this->model->selectUsuarios("inactivos");

			}
			for ($i=0; $i < count($arrData); $i++) {

				$arrData[$i]['options'] = 
				'<div class="text-center">
				<button class="btn btn-info btn-sm btnViewUsuario" onClick="fntViewUsuario('.$arrData[$i]['idusuario'].')" title="Ver usuario"><i class="far fa-eye"></i></button>

				<button class="btn btn-primary  btn-sm btnEditUsuario" onClick="fntEditUsuario('.$arrData[$i]['idusuario'].')" title="Editar usuario"><i class="fas fa-pencil-alt"></i></button>

				<button class="btn btn-danger btn-sm btnDelUsuario" onClick="fntDelUsuario('.$arrData[$i]['idusuario'].')" title="Eliminar usuario"><i class="far fa-trash-alt"></i></button>
				</div>';

				switch ($arrData[$i]['tipo_documento_idtipo_documento']) {
					  case 1:
					    $arrData[$i]['tipo_documento_idtipo_documento']='<span class="badge badge-ligth">Cedula de Ciudadania</span>';
					    break;
					  case 2:
					    $arrData[$i]['tipo_documento_idtipo_documento']='<span class="badge badge-ligth">Tarjeta de Identidad</span>';
					    break;
					  case 3:
					    $arrData[$i]['tipo_documento_idtipo_documento']='<span class="badge badge-ligth">Cedula de Extrangeria</span><text-center>';
					    break;
					  default:
					    $arrData[$i]['tipo_documento_idtipo_documento']="default";
				}
				switch ($arrData[$i]['rol_idrol']) {
					  case 1:
					    $arrData[$i]['rol_idrol']='<span class="badge badge-success">Administrador</span>';
					    break;
					  case 2:
					    $arrData[$i]['rol_idrol']='<span class="badge badge-dark">Instructor</span>';
					    break;
					  case 3:
					    $arrData[$i]['rol_idrol']='<span class="badge badge-dark">Aprendiz</span><text-center>';
					    break;
					    case 4:
					    $arrData[$i]['rol_idrol']='<span class="badge badge-dark">Vocero</span><text-center>';
					    break;
					  default:
					    $arrData[$i]['rol_idrol']="default";
				}

				switch ($arrData[$i]['estado_usuario_idestado_usuario']) {
					  case 1:
					    $arrData[$i]['estado_usuario_idestado_usuario']='<span class="badge badge-warning">Activo</span>';
					    break;
					  case 2:
					    $arrData[$i]['estado_usuario_idestado_usuario']='<span class="badge badge-success">Contratado</span>';
					    break;
					  case 3:
					    $arrData[$i]['estado_usuario_idestado_usuario']='<span class="badge badge-danger">Pendiente</span><text-center>';
					    break;
					  default:
					    $arrData[$i]['Estado_usuario_idestado_usuario']="default";
				}
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			die();
		}

		

		public function getUsuario(int $idpersona){
			
			$idusuario = intval($idpersona);
			if($idusuario > 0)
			{
				$arrData = $this->model->selectUsuario($idusuario);
				if(empty($arrData))
				{
					$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
				}else{
					$arrResponse = array('status' => true, 'data' => $arrData);
				}
				echo json_encode($arrResponse,JSON_FORCE_OBJECT);
			}
			die();
		}

		public function delUsuario()
		{
			if($_POST){
				$intIdpersona = intval($_POST['idUsuario']);
				$requestDelete = $this->model->deleteUsuario($intIdpersona);
				if($requestDelete)
				{
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el usuario');
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el usuario.');
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}
		public function FunctionName($imprimir)
		{

			echo ($imprimir);
		}

		

		public function Usuarios_inactivos()
		{
			$data['page_id'] = 9;
			$data['page_tag'] = "Usuarios Inactivos";
			$data['page_title'] = "USUARIOS INACTIVOS";
			$data['page_name'] = "usuarios inactivos";
			$data['page_functions_js']= "functions_usuarios_inactivos.js";
			
			$this->views->getView($this,"Usuarios_inactivos",$data);
		}
   }
?>