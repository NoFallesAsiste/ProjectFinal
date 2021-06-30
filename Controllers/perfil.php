<?php 

	class Perfil extends Controllers{
		

		public function __construct()
		{
			parent::__construct();
			session_start();
		    if(empty($_SESSION['login']))
		    {
		      header('Location: '.base_url().'/login');
		    }

		}
		

		public function perfil()
		{
			$data['page_tag'] = "Perfil";
			$data['page_title'] = "Perfil de usuario ";
			$data['page_name'] = "perfil";
			$data['page_functions_js']= "functions_usuarios.js";
			
			$this->views->getView($this,"perfil",$data);
		}


   }


 ?>