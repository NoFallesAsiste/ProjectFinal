<?php 
	class Mysql extends Conexion
	{
		private $strquery;
		private $conexion;
		private $arrValues;
		
		function __construct()
		{
			$this->conexion = new Conexion();
			$this->conexion = $this->conexion->conect();
		}

		//Insertar un registro
		public function insert(string $query, array $arrValues)
		{
			$this->strquery = $query;
			$this->arrValues = $arrValues;
			$insert = $this->conexion->prepare($this->strquery);
			$resInsert = $insert->execute($this->arrValues);

			return $resInsert;

		}
		//Actualiza registros
		public function update(string $query, array $arrValues)
		{
			$this->strquery = $query;
			$this->arrValues = $arrValues;
			$result = $this->conexion->prepare($this->strquery);
			$data = $result->execute($this->arrValues);
			 
			return $data;
		}


		//Busca un registro
		public function select(string $query)
		{
			$this->strquery = $query;
			$result = $this->conexion->prepare($this->strquery);
			$result->execute();
			$data = $result->fetch(PDO::FETCH_ASSOC);
			return $data;
		}

		//Devuelve todo los registros
		public function select_all(string $query)
		{
			//$this->conect  = new PDO('mysql:host=localhost;dbname=db_tiendavirtual','root','');

			$this->strquery = $query;
			$result = $this->conexion->prepare($this->strquery);
			$result->execute();
			$data = $result->fetchAll(PDO::FETCH_ASSOC);
			return $data;

		}

		

		//Eliminar registros
		public function delete(string $sql)
		{
			$this->strquery = $sql;
			$result = $this->conexion->prepare($this->strquery);
			$del = $result->execute();
			return $del;
		}

	}

	
 ?>