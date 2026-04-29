<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Models\RaceYear;

class Main extends BaseController
{
    public $data;
    public $raceyear;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        $this->raceyear = new RaceYear();
        $dataRaceYear = $this->raceyear->findAll();

        $this->data = [
            "raceyear" => $dataRaceYear
        ];
    }

    public function index()
    {
        echo view("index", $this->data);
    }
}
