<?php 

	class Dashboard extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
			// session_regenerate_id(true);
			if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
				die();
			}
			getPermisos(1);
		}

		public function dashboard()
		{
			$data['page_id'] = 2;
			$data['page_tag'] = "Dashboard";
			$data['page_title'] = " Dashboard - Veterinaria el Mister";
			$data['page_name'] = "dashboard";
			$data['page_functions_js'] = "functions_dashboard.js";
			$data['menor'] = $this->model->select_Menor_stock();
			$data['especie'] = $this->model->select_Numero_especies();
			$data['cabeza'] = $this->model->select_Cabeza();
			// dep($data);
			// exit();
			$this->views->getView($this,"dashboard",$data);
		}

	}
 ?>