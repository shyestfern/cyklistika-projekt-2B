<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Models\Race;
use App\Libraries\Race as RaceL;

class Main extends BaseController
{
    public $data;
    public $race;
    public $raceL;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        $this->raceL = new RaceL();
        $this->race = new Race();
        $dataRace = $this->race->findAll();

        $this->data = [
            "race" => $dataRace
        ];
    }

    public function index()
    {
        $dataZavodu = $this->race
            ->join("race_year", "race.id = race_year.id_race", "inner")
            ->where("race_year.category", "E")
            ->where("race_year.sex", "M")
            ->orderBy("race.id", "asc")
            ->findAll();
        
       
        $dataZavodu = $this->raceL->getRaces($dataZavodu, 'id_race');

        //$pager = $this->race->pager;
        
        $this->data += [
            "zavod" => $dataZavodu,
            //"pager" => $pager
        ];
        
        echo view("index", $this->data);
    } 

    public function soupis_rocniku($id)
    {
        /*
        $dataRocniku = $this->race_year->join("result", "race_year.category = result.rank", "inner")
        ->where("result.rank")
        ->findAll("asc", 20);

        $this->data += [
            "rocnik" => $dataRocniku
        ];
        */

        $dataRocniku = $this->race
            ->join("race_year", "race.id = race_year.id_race", "inner")
            ->where("race_year.category", "E")
            ->where("race_year.sex", "M")
            ->where("race.id", $id)
            ->findAll();

        echo view("soupis_rocniku", $this->data);
    }
}
