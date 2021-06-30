<?php
class Clases extends Controllers{

	public function __construct()
	{
		parent::__construct();
		session_start();
		if(empty($_SESSION['login']))
		{
		    header('Location: '.base_url().'/login');
		}else if ($_SESSION['userData']['idrol']!=2) {
		    header('Location: '.base_url().'/dashboard');	
		}
	}

	public function Clases()
	{
		$data['page_id'] = 8;
		$data['page_tag'] = "Clases";
		$data['page_title'] = "Clases CEET ";
		$data['page_name'] = "clases";
		$data['page_functions_js']= "functions_clases.js";

		$this->views->getView($this,"clases",$data);
	}

	public function getClases()
	{
		$arrData = $this->model->selectClases();
		for ($i=0; $i < count($arrData); $i++) {

			$arrData[$i]['options'] = '<div class="text-center">
			<button class="btn btn-info btn-sm btnViewClase" onClick="fntViewClase('.$arrData[$i]['idclase'].')" title="Ver Clase"><i class="far fa-eye"></i></button>
			<button class="btn btn-primary  btn-sm btnEditClase" onClick="fntEditClase('.$arrData[$i]['idclase'].')" title="Editar Clase"><i class="fas fa-pencil-alt"></i></button>
			<button class="btn btn-danger btn-sm btnDelClase" onClick="fntDelClase('.$arrData[$i]['idclase'].')" title="Eliminar Clase"><i class="far fa-trash-alt"></i></button>
				</div>';
		}
	echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
	die();
	}
	public function setClases()
	{
		$intIdClase =$_POST['idclase'];
    	$strfechayhora= $_POST['txtfechayhora'];
    	$intaula = $_POST['txtaula'];
    	$strnombre_clase = strClean($_POST['txtnombre_clase']);
    	$intficha_idficha = intval($_POST['intficha']);



	 	if($intIdClase > 0){
      		//crear
      		$request_Clase = $this->model->insertClase( $strfechayhora, $intaula, $strnombre_clase, $intficha_idficha);
      		$Option = 1;
    	}else{
      		//Actualizar
      		$request_Clase = $this->model->updateClase($intIdClase,$strfechayhora, $intaula, $strnombre_clase, $intficha_idficha);
      		$Option = 2;

    	}
    	if ($request_Clase){ 

	    	if ($Option == 1){

	       		$arrResponse= array('status'=>true, 'msg' =>'Clase guardada correactamente.');

	    	}else{

	       	$arrResponse= array('status'=>true, 'msg' =>'Clase Actualizada correactamente.');
	    	}

    	}
    	else if ($request_Clase == 'exist'){
    
      		$arrResponse = array('status'=>false, 'msg'=>'Atencion la clase ya existe.');

    	}else{
      		$arrResponse=array('status'=> false, "msg" => 'No es posible almacenar los datos.');
    	}
   	echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    die();

    }
    public function getClase(int $idclase){
				
		$idclase = intval($idclase);
		if($idclase > 0)
		{
			$arrData = $this->model->selectClase($idclase);
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

    public function delClase (){

        if ($_POST) {
	   	    $intidClase =intval($_POST['idClase']);
	   		$requestDelete= $this->model->deleteClase($intidClase);
       		if ($requestDelete == 'ok') {
    	       $arrResponse = array('status' => true, 'msg' => 'se ha eliminado la clase');
       		}else if($requestDelete == 'exist') {
       			$arrResponse = array('status' => false, 'msg' => 'No es posible eliminar la clase.');
    	 	}else{
        		$arrResponse = array('status' => false, 'msg' => 'Error al eliminar la clase.');
        	}
        	echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
      	}
    	die();
    }
   	 
  }
  ?>