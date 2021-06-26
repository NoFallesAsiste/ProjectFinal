<?php

    class loginModel extends Mysql
    {   private $intIdUsuario;
        private $strUsuario;
        private $strPassword;
        private $strToken;
        
        public function __construct()
        {
            parent::__construct(); // Ejecuta constructor padre (mysql)
        }
        public function loginUser(string $usuario, string $password)
        {
            $this->strUsuario = $usuario;
            $this->strPassword = $password; 
            $sql = "SELECT idusuario,rol_idrol,estado_usuario_idestado_usuario FROM usuario WHERE
              correo = '$this->strUsuario' and
              contraseña = '$this->strPassword' ";
            $request = $this->select($sql); 
            return $request;
        }

        public function sessionLogin(int $iduser){
			$this->intIdUsuario = $iduser;
			//Buscar ROL
			$sql = "SELECT usuario.*, 
                            tipo_documento.tipo_documento,
                            rol.idrol, 
                            rol.nombre_rol 
            FROM usuario 
            INNER JOIN tipo_documento ON usuario.tipo_documento_idtipo_documento = tipo_documento.idtipo_documento 
            INNER JOIN rol ON usuario.rol_idrol = rol.idrol 
            WHERE idusuario= $this->intIdUsuario";

			$request = $this->select($sql);
			return $request;
		}
    }
?>