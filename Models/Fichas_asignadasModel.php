<?php 

	class Fichas_asignadasModel extends Mysql
	{
		private $intidUsuario;
		private $strnombre;
		private $strapellido;
		private $tipo_documento_idtipo_documento;
		private $numero_documento;


		public function __construct()
		{
			parent::__construct();

		}	

		public function insertUsuario( int $intidUsuario, string $strnombre, string $strapellido,int $tipo_documento_idtipo_documento, int $numero_documento){

			
			$this->intidUsuario = $intidUsuario;
			$this->strnombre = $strnombre;
			$this->strapellido = $strapellido;
			$this->tipo_documento_idtipo_documento = $tipo_documento_idtipo_documento;
			$this->numero_documento = $numero_documento;

			$validar= $this->validarId();
		
			$query_insert  = "SELECT nombre, apellido,tipo_documento_idtipo_documento, numero_documento FROM usuario where ficha_idficha='2141041') VALUES(?,?,?,?,?)";
        	$arrData = array(
								$this->$intidUsuario,
								$this->$strnombre,
								$this->$strapellido,
								$this->$tipo_documento_idtipo_documento,
        						$this->$numero_documento);
        	$request_insert = $this->insert($query_insert,$arrData);
        	$return = $request_insert;
	        return $return;
		}
		public function selectFichas_asignadas(int $iduser)
		{
			$sql = "SELECT ficha_usuario.ficha_idficha 
				FROM ficha_usuario
				INNER JOIN usuario ON ficha_usuario.usuario_idusuario = usuario.idusuario
				WHERE ficha_usuario.usuario_idusuario=$iduser";
					$request = $this->select_all($sql);
					return $request;
		}
		public function selectFichasAsignadasUsuarios(int $idficha)
		{
			$sql = "SELECT usuario.idusuario, usuario.nombre, usuario.apellido, tipo_documento.tipo_documento, usuario.numero_documento 
				FROM ficha_usuario
				INNER JOIN usuario ON ficha_usuario.usuario_idusuario = usuario.idusuario
                INNER JOIN tipo_documento ON tipo_documento.idtipo_documento = usuario.tipo_documento_idtipo_documento
				WHERE ficha_idficha=".$idficha." and  rol_idrol != 1 and rol_idrol != 2";
					$request = $this->select_all($sql);
					return $request;
		}
	}
 ?>