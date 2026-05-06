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
            ->orderBy("start_date", "asc")
            ->paginate(25);

        $pager = $this->race->pager;
        
        $this->data += [
            "zavod" => $dataZavodu,
            "pager" => $pager
        ];
        
        echo view("index", $this->data);
    } 

    public function soupis_rocniku()
    {

        $dataRocniku = $this->race_year->join("result", "race_year.category = result.rank", "inner")->where("result.rank")->findAll();

        $this->data += [
            "rocnik" => $dataRocniku
        ];

    }
}
