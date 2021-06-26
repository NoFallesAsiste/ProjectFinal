<?php 

	class AsistenciaModel extends Mysql
	{
		private $Idpersona=1;
		private $intidtipo_asistencia_tipo_asistencia;
		private $inttipo_asistencia_tipo_asistencia;
		private $intestado_novedad_idestado_asistencia;
		private $intjustificacion_idjustificacion;
		private $strnombre_clase;
		private $straula;
		private $datetimefechayhora;
		
		public function __construct()
		{
			parent::__construct();
		}	

		
		//-------------------------------------------------------

		public function selectAsistencias(int $Idpersona)
		{
			$this->Idpersona=$Idpersona;

			$sql = "SELECT  tipo_asistencia_usuario.tipo_asistencia_tipo_asistencia,tipo_asistencia_usuario.idtipo_asistencia_usuario, tipo_asistencia_usuario.estado_novedad_idestado_asistencia, tipo_asistencia_usuario.justificacion_idjustificacion, clase.nombre_clase, clase.aula, clase.fechayhora, ficha.idficha
				FROM usuario
				inner JOIN tipo_asistencia_usuario ON tipo_asistencia_usuario.usuario_idusuario = usuario.idusuario
				INNER JOIN clase ON tipo_asistencia_usuario.clase_idclase = clase.idclase
				INNER JOIN ficha ON usuario.ficha_idficha = ficha.idficha
					WHERE usuario.idusuario='$Idpersona'"; 
					$request = $this->select_all($sql);
					return $request;
		}

		public function selectAsistencia(int $idAsistencia,int $Idpersona)
		{
			$this->intidtipo_asistencia_tipo_asistencia= $idAsistencia;
			$this->Idpersona=$Idpersona;

			$sql = "SELECT tipo_asistencia_usuario.idtipo_asistencia_usuario, tipo_asistencia.asistencia, tipo_asistencia_usuario.estado_novedad_idestado_asistencia, justificacion.justificacion, clase.nombre_clase, clase.aula, clase.fechayhora, clase.ficha_idficha FROM usuario INNER JOIN tipo_asistencia_usuario ON tipo_asistencia_usuario.usuario_idusuario =usuario.idusuario INNER JOIN justificacion ON justificacion.idjustificacion = tipo_asistencia_usuario.justificacion_idjustificacion INNER JOIN clase ON clase.idclase = tipo_asistencia_usuario.clase_idclase INNER JOIN tipo_asistencia ON tipo_asistencia.idtipo_asistencia = tipo_asistencia_usuario.tipo_asistencia_tipo_asistencia
					WHERE usuario.idusuario='$this->Idpersona' AND tipo_asistencia_usuario.idtipo_asistencia_usuario='$this->intidtipo_asistencia_tipo_asistencia'" ; 
					$request = $this->select($sql);
					return $request;
		}

	}
		//---------------------------------------------------
		
		
?>