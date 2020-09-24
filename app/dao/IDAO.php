<?php

interface IDAO
{
    public function create($sql);
    public function select($sql);
    public function update($sql);
    public function delete($sql);

}
?>