<?php
class Asistencia extends Controllers{

		public function __construct()
		{
			parent::__construct();

			session_start();
		    if(empty($_SESSION['login']))
		    {
		      header('Location: '.base_url().'/login');
		    }else if ($_SESSION['userData']['idrol'] ==3 and $_SESSION['userData']['idrol'] ==4) {
		      header('Location: '.base_url().'/dashboard');		
		    }
		}

		public function Asistencia() 
		{
			
			$data['page_id'] = 7;
			$data['page_tag'] = "Asistencia";
			$data['page_title'] = "Asistencias CEET ";
			$data['page_name'] = "asistencias";
			$data['page_functions_js']= "functions_Asistencia.js";
			
			$this->views->getView($this,"asistencia",$data);
		}

public function getAsistencias()
		{
			$arrData = $this->model->selectAsistencias($_SESSION['idUser']);
			for ($i=0; $i < count($arrData); $i++) {

				$arrData[$i]['options'] = '<div class="text-center">
				<button class="btn btn-info btn-sm btnViewAsistencia" onClick="fntViewAsistencia('.$arrData[$i]['idtipo_asistencia_usuario'].')" title="Ver asistencias"><i class="far fa-eye"></i></button>
				<button class="btn btn-info btn-sm btnViewAsistencia" onClick="fntViewAsistencia('.$arrData[$i]['idtipo_asistencia_usuario'].')" title="adjuntar justificación"><i class="fas fa-pencil-alt"></i></button>
				
				
				</div>';
				switch ($arrData[$i]['tipo_asistencia_tipo_asistencia']) {
					case 1:
					  $arrData[$i]['tipo_asistencia_tipo_asistencia']='<span class="badge badge-warning">Asistió</span>';
					  break;
					 
					
					case 2:
					   $arrData[$i]['tipo_asistencia_tipo_asistencia']='<span class="badge badge-warning">Retardo</span>';
					   break;
					   
				    
					case 3:
						$arrData[$i]['tipo_asistencia_tipo_asistencia']='<span class="badge badge-warning">Inasistencia</span>';
						break;		   
					
		        }
		        switch ($arrData[$i]['estado_novedad_idestado_asistencia']) {
					case 1:
			  			$arrData[$i]['estado_novedad_idestado_asistencia']='<span class="badge badge-warning">Sin novedad</span>';
			  			break;
			 
					default:
			  			$arrData[$i]['estado_novedad_idestado_asistencia']="default";

  		        }
  		        switch ($arrData[$i]['justificacion_idjustificacion']) {
					case 1:
				  $arrData[$i]['justificacion_idjustificacion']='<span class="badge badge-warning">N/A</span>';
					 break;
				 
					default:
					  $arrData[$i]['justificacion_idjustificacion']="default";
	
				}

			    
		  	  
		  	    
				
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			die();
		}

	public function getAsistencia(int $idasistencia){ 
			$idAsistencia = intval($idasistencia);
			if($idAsistencia > 0)
			{
				$arrData = $this->model->selectAsistencia($idAsistencia,$_SESSION['idUser']);
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
	}

  ?>