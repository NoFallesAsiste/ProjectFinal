<?php 

	class ClasesModel extends Mysql
	{
		private $intidclase;
		private $strfechayhora;
		private $straula;
		private $strnombre_clase;
		private $ficha_idficha;
		
		public function __construct()
		{
			parent::__construct();
		}	

		public function insertClase( string $strfecha, string $straula,string $strnombre_clase, int $ficha_idficha){

			$this->strfechayhora = $strfecha;
			$this->straula = $straula;			
			$this->strnombre_clase = $strnombre_clase;
			$this->ficha_idficha = $ficha_idficha;

			
			$query_insert  = "INSERT INTO clase( fechayhora, aula, nombre_clase, ficha_idficha) VALUES(?,?,?,?)";
	        $arrData = array(
								$this->strfechayhora,
								$this->straula,
								$this->strnombre_clase,
								$this->ficha_idficha);
	        $request_insert = $this->insert($query_insert,$arrData);
	        $return = $request_insert;
	        
	        return $return;
		}
		public function updateClase(int $intidclase, string $strfecha, string $straula,string $strnombre_clase, int $ficha_idficha){

			$this->intidclase=$intidclase;
			$this->strfechayhora = $strfecha;
			$this->straula = $straula;			
			$this->strnombre_clase = $strnombre_clase;
			$this->ficha_idficha = $ficha_idficha;

			
			
			$sql = "UPDATE clase SET  fechayhora=?, aula=?, nombre_clase=?, ficha_idficha=? WHERE idclase = $this->intidclase";
			$arrData = array(
								$this->strfechayhora,
								$this->straula,
								$this->strnombre_clase,
								$this->ficha_idficha);
			$request = $this->update($sql,$arrData);
			return $request;
		}
		public function validarclase(int $intidclase)
		{
			$this->intidclase = $intidclase;

			$sql = "SELECT idclase FROM clase WHERE idclase= '$this->intidclase' ";

			$request = $this->select_all($sql);
			return $request;
		}
		
		public function selectClase(int $intidclase)
		{
			$this->intidclase = $intidclase;
			$sql = "SELECT * FROM clase 
					WHERE idclase = $this->intidclase";

					$request = $this->select_all($sql);
					return $request;
		}
		public function selectClases()
		{

			$sql = "SELECT * FROM clase";

					$request = $this->select_all($sql);
					return $request;
		}
	

		public function deleteClase(int $intidclase)
		{
			$this->intidclase = $intidclase;

			$sql = "DELETE FROM clase WHERE idclase = $this->intidclase";

			$request = $this->delete($sql);
			return $request;
		}
		
		
	}	
?>