<?php
require_once '../dao/CampanhaDAO.php';
require_once '../dao/MinhasCampanhasDAO.php';

class Campanha {

    private $titulo;
    private $descricao;
    private $rua;
    private $numero;
    private $bairro;
    private $categoria;
    private $pontoDeDoacao;
    private $lgn;
    private $lat;
    private $dataIn;

    function __construct($titulo, $descricao, $rua, $bairro, $numero, $cidade, $cep, $categoria, $dataIn, $lgn, $lat) {
        $this->titulo = $titulo;
        $this->descricao = $descricao;
        $this->rua = $rua;
        $this->bairro = $bairro;
        $this->numero = $numero;
        $this->cidade = $cidade;
        $this->cep = $cep;
        $this->categoria = $categoria;
        $this->dataIn = $dataIn;
        $this->lgn = $lgn;
        $this->lat = $lat;
    }

    public function persistirCamapanha($objeto) {
        $campanhaDAO = new CampanhaDAO();
        $campanhaDAO->create($objeto);
    }

    public function editarCampanha($objeto) {
        $campanhaDAO = new CampanhaDAO();
        $campanhaDAO->update($objeto);
    }

    public function recuperarCampanhas() {
        $classeDao = new CampanhaDAO();
        $ss = $classeDao->selectAll();
        return $ss;
    }

    public function revomerCampanhas($id) {
        $classeDao = new CampanhaDAO();
        $ss = $classeDao->delete($id);
        return $ss;
    }

    function exibirMinhasCampanhas($id_user) {
        $dao = new MinhasCampanhasDAO();
        $reultado = $dao->selectAll($id_user);
        return $reultado;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getRua() {
        return $this->rua;
    }

    public function setRua($rua) {
        $this->rua = $rua;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function getBairro() {
        return $this->bairro;
    }

    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function getCep() {
        return $this->cep;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function getPontoDeDoacao() {
        return $this->pontoDeDoacao;
    }

    public function setPontoDeDoacao($pontoDeDoacao) {
        $this->pontoDeDoacao = $pontoDeDoacao;
    }

    public function getLgn() {
        return $this->lgn;
    }

    public function getLat() {
        return $this->lat;
    }

    public function getDataIn() {
        return $this->dataIn;
    }

}
