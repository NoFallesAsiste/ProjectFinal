<?php 

class Fichas extends Controllers{
	
	private $intFicha;

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

	public function Fichas()
	{
		$data['page_id'] = 5;
		$data['page_tag'] = "fichas";
		$data['page_title'] = "FICHAS SENA";
		$data['page_name'] = "fichas Sena";
		$data['page_functions_js']= "functions_fichas.js";

			
		$this->views->getView($this,"fichas",$data);
	}

	public function setFicha(){
		if($_POST){
				
			if(  empty($_POST['dateInicioFormacion']) || empty($_POST['intPrograma']) || empty($_POST['intHorario'])  )
			{
					
				$arrResponse = array("status" => false, "msg" => 'Lleno todos los campos.');
			}else{ 
				$idFicha =$_POST['intFicha'];
				$dateInicioFormacion=$_POST['dateInicioFormacion'];
				$intPrograma=intval($_POST['intPrograma']);
				$intHorario=intval($_POST['intHorario']);
				$validate = $this->model->validateFicha($idFicha);

				if(empty($validate)){

					$request_user = $this->model->insertFicha(
													$idFicha,
													$intHorario,
													$intPrograma,
													$dateInicioFormacion);
				}else{
					$request_user = $this->model->updateFicha(
													$idFicha,
													$intHorario,
													$intPrograma,
													$dateInicioFormacion);

				}
				if($request_user > 0)
				{
					
					$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
							
				}else{
					$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
				}
					
			}	
			
		echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}	
		die();
	}
	public function getAddUsuarios(int $ficha)
		{	
			$this->intFicha=intval($ficha);
			$arrData = $this->model->selectAddUsuarios();
			
			for ($i=0; $i < count($arrData); $i++) {

				$arrData[$i]['opciones'] = 
				'<div class="text-center">
				
				<button class="btn btn-primary  btn-sm" onClick="fntAddUsuario('.$arrData[$i]['idusuario'].')" title="Agregar Usuario"><i class="fa fa-plus" aria-hidden="true"></i></button>

				<button class="btn btn-danger btn-sm btnQuitUsuario" onClick="fntQuitUsuario('.$arrData[$i]['idusuario'].')" title="Quitar Usuario"><i class="far fa-trash-alt"></i></button>
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
	
		
	public function setAddUsuario(string $idUsuarioFicha)
	{

		$arrData=explode(",", $idUsuarioFicha);
			$intFicha = intval($arrData[1]);
			$intUsuario = intval($arrData[0]);



		$requestAdd = $this->model->insertUsuarioFicha($intUsuario,$intFicha);
		if($requestAdd)
		{
		$arrResponse = array('status' => true, 'msg' => 'se ha agregado el usuario a la ficha correctamente.');
		}else{
			$arrResponse = array('status' => false, 'msg' => 'Error al agregar el usuario a la ficha.');#revisar concatenación realizada
		}
		echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		die();
		
		
	}
	public function getFichas()
	{
		$arrData = $this->model->selectFichas();
		for ($i=0; $i < count($arrData); $i++) {

			$arrData[$i]['options'] = 
				'<div class="text-center">
				<button class="btn btn-info btn-sm btnAddAprd" onClick="fntAddAprd('.$arrData[$i]['idficha'].')" title="Ver Ficha"><i class="fa fa-address-book" aria-hidden="true"></i></button>
				<button class="btn btn-primary  btn-sm btnEditFicha" onClick="fntEditFicha('.$arrData[$i]['idficha'].')" title="Editar Ficha"><i class="fas fa-pencil-alt"></i></button>
				<button class="btn btn-danger btn-sm btnDelFicha" onClick="fntDelFicha('.$arrData[$i]['idficha'].')" title="Eliminar Ficha"><i class="far fa-trash-alt"></i></button>
				</div>';

			switch ($arrData[$i]['horario_idhorario']) {
				case 1:
				    $arrData[$i]['horario_idhorario']='<span class="badge badge-warning">Diurna</span>';
				    break;
					   
				default:
				    $arrData[$i]['horario_idhorario']="default";
				}
			switch ($arrData[$i]['programa_idprograma']) {
				case 1:
					$arrData[$i]['programa_idprograma']='<span class="badge badge-warning">ADSI</span>';
				break;
					   
				default:
				    $arrData[$i]['programa_idprograma']="default";
			}
		}
		echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		die();
	}
		//--------------------------------------------------------

	public function getFicha(int $idficha){
			
		$idficha = intval($idficha);
		if($idficha > 0)
		{
			$arrData = $this->model->selectFicha($idficha);
			if(empty($arrData))
			{
				$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
			}else{
				$arrResponse = array('status' => true, 'data' => $arrData);
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function delFicha()
	{
		if($_POST){
			$intIdFicha = intval($_POST['idFicha']);
			$requestDelete = $this->model->deleteFicha($intIdFicha);
			if($requestDelete)
			{
				$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado de ficha.');
			}else{
				$arrResponse = array('status' => false, 'msg' => 'Error al eliminar de ficha.');#revisar concatenación realizada
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}


}
	
?>