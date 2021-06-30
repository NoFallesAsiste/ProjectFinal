<?php
class Fichas_asignadas extends Controllers{
	

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

	public function Fichas_asignadas()
	{
		$data['page_id'] = 4;
		$data['page_tag'] = "Fichas Asignadas";
		$data['page_title'] = "Fichas asignada CEET ";
		$data['page_name'] = "Fichas_asignada";
		$data['page_functions_js']= "functions_fichas_asignadas.js";
		$data['page_funtion'] = "functions_fichas_asignadas.js";


		$this->views->getView($this,"fichas_asignadas",$data);

	}
	public function getFichas_asignadas()
	{

		$arrData = $this->model->selectFichasAsignadasUsuarios(2141041);
		
		
		echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		die();
	}
	
	public function getFichas_asignada(int $iduser)
	{

		$arrData = $this->model->selectFichas_asignadas($iduser);
		for ($i=0; $i < count($arrData); $i++) {
		}
		
		echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		die();
	}
	public function getFichas_asignadass(int $iduser)
	{

		$arrData = $this->model->selectFichas_asignadas($iduser);
		return $arrData;
	}
	
}
?>