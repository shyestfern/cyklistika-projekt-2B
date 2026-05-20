<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Models\Race;
use Config\Pagination;

class Main extends BaseController
{
    private array $data;
    private object $race;
    private object $pagination;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        $this->pagination = new Pagination();
        $this->race = new Race();
        $dataRace = $this->race->findAll();

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
        /*
        $dataRocniku = $this->race_year->join("result", "race_year.category = result.rank", "inner")
        ->where("result.rank")
        ->findAll("asc", 20);

        $this->data += [
            "rocnik" => $dataRocniku
        ];
        */
    }
}
