<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Models\Race;
use App\Models\RaceYear;
use App\Models\Result;
use Config\Pagination;

class Main extends BaseController
{
    private array $data;
    private object $race;
    private object $raceYear;
    private object $result;
    private object $pagination;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        $this->pagination = new Pagination();
        $this->race = new Race();
        $dataRace = $this->race->findAll();

        $this->raceYear = new RaceYear();

        $this->result = new Result();

        $this->data = [
            "race" => $dataRace
        ];
    }

    public function index()
    {   
        $dataZavodu = $this->race

            // výběr pouze potřebných sloupců,
            // aby nevznikla duplicita názvu sloupce "id"
            ->select("race.id, race.default_name, race.country")

            ->join("race_year", "race.id = race_year.id_race", "inner")
            ->where("race_year.category", "E")
            ->where("race_year.sex", "M")

            // odstranění duplicitních závodů,
            // protože jeden závod může mít více ročníků
            ->distinct()

            ->orderBy("race.id", "asc")
            ->paginate($this->pagination->perPage);
        
        $this->data += [
            "zavod" => $dataZavodu,
            "pager" => $this->race->pager
        ];
        
        echo view("index", $this->data);
    } 

    public function soupis_rocniku($id)
    {
        $dataRocniku = $this->raceYear
            ->select("race_year.id, race_year.real_name, race_year.start_date, race_year.end_date, race_year.uci_tour")
            ->where("race_year.id_race", $id)
            ->where("race_year.category", "E")
            ->where("race_year.sex", "M")
            ->orderBy("race_year.year", "desc")
            ->findAll();

        $raceInfo = $this->race->find($id); // využiju k nadpisu na stránce

        $this->data += [
            "rocnik" => $dataRocniku,
            "raceInfo" => $raceInfo
        ];

        echo view("soupis_rocniku", $this->data);
    }

    function soupis_poradi($id)
    {
        $dataPoradi = $this->result;
    }

    function pridat(){
        echo view('formular');
    }

    function vytvorit(){
        $real_name = $this->request->getPost('real_name');

        $data = array(
            'real_name' => $real_name
        );

        $this->raceYear->save($data);

        return redirect()->route('/');
    }
}
