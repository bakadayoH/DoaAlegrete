<?php
require_once("../dao/CampanhaDAO.php");
require_once("../model/Campanha.php");
require_once("../model/PontoDeDoacao.php");
require_once("../model/CategoriaCampanha.php");

class CampanhaUtilities{
		
	public function getPontosAsJson(){
		$arrayDeCampanhas = array();
		$pontosDao = new CampanhaDAO();
		$campanhas = $pontosDao->selectAll();
		
		foreach($campanhas as $campanha){
			$descricao = "Descrição: " . $campanha->getDescricao() . "<br>Rua: " . $campanha->getRua() . ", " . $campanha->getNumero() . "<br>Bairro: " . $campanha->getBairro();

			array_push($arrayDeCampanhas, array("descricao"=>$descricao, "titulo"=>$campanha->getTitulo(), "latitude"=>$campanha->getLat(), "longitude"=>$campanha->getLgn(), "icone"=>$campanha->getCategoria()->getCaminhoIcone()));
			
		}
		
		return json_encode($arrayDeCampanhas);
	}
}
?>