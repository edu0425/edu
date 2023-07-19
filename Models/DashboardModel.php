<?php 

	class DashboardModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}	

		// PARA PRODUCTOS
		private $intIdProducto;
		private $strNombre;
		private $strDescripcion;
		private $intCodigo;
		private $intCategoriaId;
		private $intPrecio;
		private $intStock;
		private $intStatus;
		private $strImagen;

		// SELECT COUNT(*) AS cantidad_productos FROM producto WHERE status = 1;
		public function select_Cantidad_productos(){
			$sql = "SELECT COUNT(*) AS cantidad_productos FROM producto WHERE status = 1;";
					$request = $this->select($sql);
			return $request;
		}

		public function select_Menor_stock(){
			$sql = "SELECT nombre, stock FROM producto ORDER BY stock ASC LIMIT 5;";
					$request = $this->select_all($sql);
			return $request;
		}	
		public function select_Numero_especies(){
			$sql = "SELECT especie, COUNT(*) AS cantidad_mascotas
					FROM mascotas
					GROUP BY especie;";
					$request = $this->select_all($sql);
			return $request;
		}	
		public function select_Cabeza(){
			$request = array();

			$sql1 = "SELECT COUNT(*) AS cantidad FROM cliente WHERE status = 1;";
			$request_clientes = $this->select($sql1);

			$sql2 = "SELECT COUNT(*) AS cantidad FROM mascotas WHERE status = 1;";
			$request_macotas = $this->select($sql2);

			$sql3 = "SELECT COUNT(*) AS cantidad FROM persona WHERE status = 1;";
			$request_usuarios = $this->select($sql3);

			$sql4 = "SELECT COUNT(*) AS cantidad FROM producto WHERE status = 1;";
			$request_productos = $this->select($sql4);


			$request = array('clientes' => $request_clientes,
							'mascotas' => $request_macotas,
							'usuarios' => $request_usuarios,
							'productos' => $request_productos
							);
			return $request;
		}	

	}
?>