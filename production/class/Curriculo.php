<?php
	
	class Curriculo{
		private $id;
		private $nome;
		private $email;		
		private $sexo;
		private $estado;
		private $cidade;
		private $telefone;
		private $sobrenome;
		private $idade;
		private $filhos;
		private $endereco;
		private $objetivo;
		private $curso;
		private $universidade;
		private $conclusao;
		private $ano;
		private $empresa1;
		private $entrada1;
		private $saida1;
		private $cargo1;
		private $empresa2;
		private $entrada2;
		private $saida2;
		private $cargo2;
		private $qualificacoes;


		function __construct($nome ,$email,  $sobrenome, $sexo, $estado, $cidade, $telefone, $idade, $filhos, $endereco, $objetivo, $curso, $universidade, $conclusao, $ano, $empresa1, $entrada1, $saida1, $cargo1, $empresa2, $entrada2, $saida2, $cargo2, $qualificacoes ) {
			$this->email = $email;
			$this->nome = $nome;
			$this->sobrenome = $sobrenome;
			$this->sexo = $sexo;
			$this->estado = $estado;
			$this->cidade = $cidade;
			$this->telefone = $telefone;
			$this->idade = $idade;
			$this->filhos = $filhos;
			$this->endereco = $endereco;
			$this->objetivo = $objetivo;
			$this->curso = $curso;
			$this->universidade = $universidade;
			$this->conclusao = $conclusao;
			$this->ano = $ano;
			$this->empresa1 = $empresa1;
			$this->entrada1 = $entrada1;
			$this->saida1 = $saida1;
			$this->cargo1 = $cargo1;
			$this->empresa2 = $empresa2;
			$this->entrada2 = $entrada2;
			$this->saida2 = $saida2;
			$this->cargo2 = $cargo2;
			$this->qualificacoes = $qualificacoes;
		}

		public function getId() {
			return $this->id;
		}

		public function setId($id) {
			$this->id = $id;
		}
		public function getEmail() {
			return $this->email;
		}

		public function setEmail($email) {
			$this->email = $email;
		}


		public function getNome() {
			return $this->nome;
		}

		public function setNome($nome) {
			$this->nome = $nome;
		}

		public function getSobrenome() {
			return $this->sobrenome;
		}

		public function setSobrenome($sobrenome) {
			$this->sobrenome = $sobrenome;
		}

		public function getCidade() {
			return $this->cidade;
		}

		public function setCidade($cidade) {
			$this->cidade = $cidade;
		}

		public function getEstado() {
			return $this->estado;
		}

		public function setEstado($estado) {
			$this->estado = $estado;
		}

		public function getTelefone() {
			return $this->telefone;
		}

		public function setTelefone($telefone) {
			$this->telefone = $telefone;
		}

		public function getSexo() {
			return $this->sexo;
		}

		public function setSexo($sexo) {
			$this->sexo = $sexo;
		}

		public function getIdade() {
			return $this->idade;
		}

		public function setIdade($idade) {
			$this->idade = $idade;
		}

		public function getFilhos() {
			return $this->filhos;
		}

		public function setFilhos($filhos) {
			$this->filhos = $filhos;
		}

		public function getEndereco() {
			return $this->endereco;
		}

		public function setEndereco($endereco) {
			$this->endereco = $endereco;
		}

		public function getObjetivo() {
			return $this->objetivo;
		}

		public function setObjetivo($objetivo) {
			$this->objetivo = $objetivo;
		}

		public function getCurso() {
			return $this->curso;
		}

		public function setCurso($curso) {
			$this->curso = $curso;
		}

		public function getUniversidade() {
			return $this->universidade;
		}

		public function setUniversidade($universidade) {
			$this->universidade = $universidade;
		}

		public function getConclusao() {
			return $this->conclusao;
		}

		public function setConclusao($conclusao) {
			$this->conclusao = $conclusao;
		}

		public function getAno() {
			return $this->ano;
		}

		public function setAno($ano) {
			$this->ano = $ano;
		}

		public function getEmpresa1() {
			return $this->empresa1;
		}

		public function setEmpresa1($empresa1) {
			$this->empresa1 = $empresa1;
		}

		public function getEntrada1() {
			return $this->entrada1;
		}

		public function setEntrada1($entrada1) {
			$this->entrada1 = $entrada1;
		}

		public function getSaida1() {
			return $this->saida1;
		}

		public function setSaida1($saida1) {
			$this->saida1 = $saida1;
		}

		public function getCargo1() {
			return $this->cargo1;
		}

		public function setCargo1($cargo1) {
			$this->cargo1 = $cargo1;
		}

		public function getEmpresa2() {
			return $this->empresa2;
		}

		public function setEmpresa2($empresa2) {
			$this->empresa2 = $empresa2;
		}

		public function getEntrada2() {
			return $this->entrada2;
		}

		public function setEntrada2($entrada2) {
			$this->entrada2 = $entrada2;
		}

		public function getSaida2() {
			return $this->saida2;
		}

		public function setSaida2($saida2) {
			$this->saida2 = $saida2;
		}

		public function getCargo2() {
			return $this->cargo2;
		}

		public function setCargo2($cargo2) {
			$this->cargo2 = $cargo2;
		}

		public function getQualificacoes() {
			return $this->qualificacoes;
		}

		public function setQualificacoes($qualificacoes) {
			$this->qualificacoes = $qualificacoes;
		}

		

		

	}

?>