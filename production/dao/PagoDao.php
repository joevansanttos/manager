<?php
	require_once "../factory/PagoFactory.php";

	class PagoDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function listaPago() {
			$pagos = array();			
			$resultado = mysqli_query($this->conexao->conecta(), "select u.* from pago as u");
			while($pago_array = mysqli_fetch_assoc($resultado)) {
				$factory = new PagoFactory();
				$pago_id = $pago_array['id'];				
				$pago = $factory->criaPago($pago_array);
				$pago->setId($pago_id);
				array_push($pagos, $pago);
			}
			return $pagos;
		}

		function buscaPago($id) {
			$query = "select * from pago where id = {$id}";
			$resultado = mysqli_query($this->conexao->conecta(), $query);
			$pago_buscado = mysqli_fetch_assoc($resultado);
			$pago_id = $pago_buscado['id'];
			$factory = new PagoFactory();
			$pago = $factory->criaPago($pago_buscado);
			$pago->setId($pago_id);
			return $pago;
		}		
	}

?>