<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Models\Race;
use App\Models\RaceYear;

class Main extends BaseController
{
    public $data;
    public $race;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        $this->race = new Race();
        $dataRace = $this->race->findAll();

        $this->data = [
            "race" => $dataRace
        ];
    }

    public function index()
    {
        $dataZavodu = $this->race->join("race_year", "race.default_name = race_year.real_name", "inner")
            ->where("race_year.category", "E")
            ->where("race_year.sex", "M")
            ->findAll();
        
        $this->data += [
            "zavod" => $dataZavodu
        ];
        
        echo view("index", $this->data);
    }
}
