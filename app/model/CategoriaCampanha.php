<?php

/**
 * Created by PhpStorm.
 * User: Brunyan
 * Date: 11/11/2016
 * Time: 19:21
 */
class CategoriaCampanha
{
    private $nomeCategoria;
    private $caminhoIcone;

    function __construct($nomeCategoria, $caminhoIcone)
    {
        $this->nomeCategoria = $nomeCategoria;
        $this->caminhoIcone = $caminhoIcone;
    }

    public function getNomeCategoria()
    {
        return $this->nomeCategoria;
    }


    public function setNomeCategoria($nomeCategoria)
    {
        $this->nomeCategoria = $nomeCategoria;
    }


    public function getCaminhoIcone()
    {
        return $this->caminhoIcone;
    }


    public function setCaminhoIcone($caminhoIcone)
    {
        $this->caminhoIcone = $caminhoIcone;
    }


}