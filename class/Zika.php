<?php

class Zika
{

    private $url = 'https://info.dengue.mat.br/api/alertcity?geocode=3523909&disease=dengue&format=json&ew_start=1&ew_end=53&ey_start=2024&ey_end=2024';

    public function listar()
    {
        return json_decode(file_get_contents($this->url));
    }
}
