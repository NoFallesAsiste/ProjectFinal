<?php 

	class UsuariosModel extends Mysql
	{
		private $intIdpersona;
		private $strContraseña;
		private $strNombre;
		private $strApellido;
		private $intNroDocumento;
		private $strDireccion;
		private $strCorreo;
		private $intCelular;
		private $intTipoDocumento;
		private $intFichas;
		private $intRol;
		private $intEstaUsuario;

		public function __construct()
		{
			parent::__construct();
		}	

		public function insertUsuario(string $strContraseña,string $strNombre, string $strApellido, int $intNroDocumento,string   $strDireccion, $strEmail, int $intCelular, int $intTipoDocumento, $intRol,int $intEstaUsuario){

			$this->strContraseña = $strContraseña;
			$this->strNombre = $strNombre;
			$this->strApellido = $strApellido;
			$this->intNroDocumento = $intNroDocumento;
			$this->strEmail = $strEmail;
			$this->intCelular = $intCelular;
			$this->strDireccion = $strDireccion;
			$this->intTipoDocumento = $intTipoDocumento;
			$this->intRol = $intRol;
			$this->intEstaUsuario = $intEstaUsuario;
			$return = 0;
		
			$query_insert  = "INSERT INTO usuario ( contraseña, nombre, apellido, numero_documento, direccion, correo, celular, tipo_documento_idtipo_documento, rol_idrol, estado_usuario_idestado_usuario)  VALUES(?,?,?,?,?,?,?,?,?,?)";
        	$arrData = array(
								$this->strContraseña,
								$this->strNombre,
								$this->strApellido,
								$this->intNroDocumento,
								$this->strDireccion,
								$this->strEmail,
								$this->intCelular,
								$this->intTipoDocumento,
								$this->intRol,
								$this->intEstaUsuario);
        	$request_insert = $this->insert($query_insert,$arrData);
        	$return = $request_insert;
	        return $return;
		}
		//-------------------------------------------------------

		public function selectUsuarios(string $opcion="")
		{
			if ($opcion=="") {
				$sql = "SELECT usuario.idusuario, usuario.nombre, usuario.apellido, usuario.numero_documento, usuario.tipo_documento_idtipo_documento, usuario.rol_idrol, usuario.estado_usuario_idestado_usuario
				FROM usuario
				WHERE estado_usuario_idestado_usuario!=0";
			}else{
				
				$sql = "SELECT usuario.idusuario, usuario.nombre, usuario.apellido, usuario.numero_documento, usuario.tipo_documento_idtipo_documento, usuario.rol_idrol, usuario.estado_usuario_idestado_usuario
				FROM usuario
				WHERE estado_usuario_idestado_usuario=0";
				}
				
			
			$request = $this->select_all($sql);
			return $request;
		}
		//---------------------------------------------------
		
		public function selectUsuario(int $intIdUsuario){
			$this->intIdpersona = $intIdUsuario;
			$sql = "SELECT usuario.idusuario, usuario.nombre, usuario.apellido, usuario.contraseña, tipo_documento.tipo_documento, usuario.numero_documento, usuario.direccion, usuario.correo, usuario.celular, usuario.tipo_documento_idtipo_documento, usuario.rol_idrol, usuario.estado_usuario_idestado_usuario, rol.nombre_rol, estado_usuario.tipo_estado_usuario
				FROM usuario 
				INNER JOIN tipo_documento ON tipo_documento.idtipo_documento = usuario.tipo_documento_idtipo_documento 
				INNER JOIN rol ON rol.idrol = usuario.rol_idrol INNER JOIN estado_usuario ON estado_usuario.idestado_usuario = usuario.Estado_usuario_idestado_usuario
				WHERE idusuario =  $this->intIdpersona ";
			$request1 = $this->select($sql);
			$sql="SELECT ficha_usuario.ficha_idficha
				FROM usuario 
				INNER JOIN ficha_usuario ON ficha_usuario.usuario_idusuario = usuario.idusuario
				INNER JOIN ficha ON ficha.idficha = ficha_usuario.ficha_idficha
				WHERE idusuario = $this->intIdpersona";
			$request2 = $this->select($sql);
			if ($request2) {
				$request = $request1+$request2;
			}else {
				$request= $request1;
			}
			
			return $request;
		}

		public function updateUsuario(int $intIdUsuario,string $strContraseña,string $strNombre, string $strApellido, int $intNroDocumento,string   $strDireccion, $strEmail, int $intCelular, int $intTipoDocumento, $intRol,int $intEstaUsuario){

			$this->intIdpersona = $intIdUsuario;
			$this->strContraseña = $strContraseña;
			$this->strNombre = $strNombre;
			$this->strApellido = $strApellido;
			$this->intNroDocumento = $intNroDocumento;
			$this->strEmail = $strEmail;
			$this->intCelular = $intCelular;
			$this->strDireccion = $strDireccion;
			$this->intTipoDocumento = $intTipoDocumento;
			$this->intRol = $intRol;
			$this->intEstaUsuario = $intEstaUsuario;
			
			$sql = "UPDATE usuario SET contraseña=?, nombre=?, apellido=?, numero_documento=?, direccion=?, correo=?, celular=?, tipo_documento_idtipo_documento=?, estado_usuario_idestado_usuario=? 
					WHERE id_usuario = $this->intIdpersona";
			$arrData = array($this->strContraseña,
								$this->strNombre,
								$this->strApellido,
								$this->intNroDocumento,
								$this->strDireccion,
								$this->strEmail,
								$this->intCelular,
								$this->intTipoDocumento,
								$this->intRol,
								$this->intEstaUsuario);
			$request = $this->update($sql,$arrData);
			return $request;
		}

		public function deleteUsuario(int $intIdUsuario)
		{
			$this->intIdpersona = $intIdUsuario;
			$sql = "UPDATE usuario SET estado_usuario_idestado_usuario=0 WHERE idusuario= '$this->intIdpersona'";
			$request = $this->delete($sql);
			return $request;
		}

	}
 ?>