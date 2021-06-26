<?php 

	class FichasModel extends Mysql
	{
		
		private $intFicha;
		private $dateInicioFormacion;
		private $intPrograma;
		private $intHorario;
		private $intUsuario;


		public function __construct()
		{
			parent::__construct();
		}

		public function validateFicha(int $intFicha)
		{
			$this->intFicha = $intFicha;
			$sql="SELECT * FROM ficha WHERE idficha='$this->intFicha'";
			$validate = $this->select($sql);

			return $validate;
			
		}
		

		public function insertFicha( int $intFicha, int $intHorario, int $intPrograma,string $dateInicioFormacion){

			
			$this->$intFicha = $intFicha;
			$this->$intHorario = $intHorario;
			$this->$intPrograma = $intPrograma;
			$this->$dateInicioFormacion = $dateInicioFormacion;

			$return = 0;
		
			$query_insert  = "INSERT INTO  ficha(idficha, horario_idhorario, programa_idprograma, fechaInicioFormacion) VALUES(?,?,?,?)";
        	$arrData = array(
								$this->$intFicha,
								$this->$intHorario,
								$this->$intPrograma,
								$this->$dateInicioFormacion);
        	$request_insert = $this->insert($query_insert,$arrData);
        	$return = $request_insert;
	        return $return;
		}
		//-------------------------------------------------------

		public function selectFichas()
		{
			$sql = "SELECT * FROM ficha ";
			$request = $this->select_all($sql);
			return $request;
		}
		
		public function selectAddUsuarios(){
			
			$sql = "SELECT usuario.idusuario, usuario.nombre, usuario.apellido, usuario.numero_documento, usuario.tipo_documento_idtipo_documento, usuario.rol_idrol, usuario.estado_usuario_idestado_usuario
				FROM usuario
				WHERE rol_idrol!=1";
			
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectUsuarios()
		{
			$sql = "SELECT usuario.idusuario, usuario.nombre, usuario.apellido, usuario.numero_documento, usuario.tipo_documento_idtipo_documento, usuario.rol_idrol, usuario.estado_usuario_idestado_usuario
				FROM usuario
				WHERE rol_idrol!=1";

			$request = $this->select_all($sql);
					return $request;
		}
					
		

		public function updateFicha(int $intFicha, int $intHorario, int $intPrograma,string $dateInicioFormacion){

			$this->$intFicha = $intFicha;
			$this->$intHorario = $intHorario;
			$this->$intPrograma = $intPrograma;
			$this->$dateInicioFormacion = $dateInicioFormacion;
			
			$sql = "UPDATE ficha SET idficha=?, horario_idhorario=?, programa_idprograma=?, fechaInicioFormacion=? WHERE idficha = '$this->intFicha'";
			$arrData = array(	$this->$intFicha,
								$this->$intHorario,
								$this->$intPrograma,
								$this->$dateInicioFormacion);
			$request = $this->update($sql,$arrData);
			return $request;
		}

		public function deleteFicha(int $intFicha)
		{
			$this->intFicha = $intFicha;

			$sql = "DELETE FROM ficha WHERE idficha = $this->intFicha";

			$request = $this->delete($sql);
			return $request;
		}

		public function insertUsuarioFicha(int $idUsuario,int $idFicha)
		{
			$this->intUsuario = $idUsuario;
			$this->intFicha = $idFicha;
			

			$return = 0;
		
			$query_insert  = "INSERT INTO ficha_usuario (ficha_idficha, usuario_idusuario) VALUES (?,?);";
        	$arrData = array(
								$this->intFicha,
								$this->intUsuario
							);
        	$request_insert = $this->insert($query_insert,$arrData);
        	$return = $request_insert;
	        return $return;
		}
		

	}
 ?>