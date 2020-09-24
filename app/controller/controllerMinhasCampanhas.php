<?php
require_once '../dao/CampanhaDAO.php';


class controllerMinhasCampanhas
{
    function exibirMinhasCampanhas($login){
      $dao = new CampanhaDAO();
         return $dao->selectAll($login);

    }
}