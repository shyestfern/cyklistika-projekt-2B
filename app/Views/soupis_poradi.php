<?= $this->extend("layout/stranka_layout"); ?>

<?= $this->section("content"); ?>

<?php /**@var object $yearInfo */ ?>

<h1 class="text-center m-4"><?= $yearInfo->real_name ?></h1>

<?php
    $table = new \CodeIgniter\View\Table();
    $table->setHeading("Umístění", "Jméno", "Stát", "Čas");

    /**@var array $poradi */

    $validni = [];
    $nevalidni = [];

    foreach($poradi as $row){

        if($row->rank > 0){
            $validni[] = $row;
        }
        else{
            $nevalidni[] = $row; // ti, co se neumístili
        }
    }

    $top20 = array_slice($validni, 0, 20); // prvních 20 jezdců, kteří se umístili

    if(count($top20) < 20){ // pokud není 20 validních jezdců

        $zbyvajici = 20 - count($top20); // kolik nevalidních jezdců můžeme přidat

        $top20 = array_merge($top20, array_slice($nevalidni, 0, $zbyvajici)); // sloučení validních a nevalidních jezdců
    }

    foreach($top20 as $row){

        $umisteni = ($row->rank == 0) ? $row->note : $row->rank; // zobrazí, proč se nevalidní jezdci neumístili

        $jmeno = $row->first_name . " " . $row->last_name;

        $stat = $row->country;

        $cas = $row->time;

        $table->addRow($umisteni, $jmeno, $stat, $cas);
    }

    $template = array(
        'table_open'=> '<table class="table table-bordered table-hover">',
        'thead_open'=> '<thead class="table-dark">',
        'thead_close'=> '</thead>',
        'heading_row_start'=> '<tr>',
        'heading_row_end'=>' </tr>',
        'heading_cell_start'=> '<th>',
        'heading_cell_end' => '</th>',
        'tbody_open' => '<tbody>',
        'tbody_close' => '</tbody>',
        'row_start' => '<tr>',
        'row_end'  => '</tr>',
        'cell_start' => '<td>',
        'cell_end' => '</td>',
        'row_alt_start' => '<tr>',
        'row_alt_end' => '</tr>',
        'cell_alt_start' => '<td>',
        'cell_alt_end' => '</td>',
        'table_close' => '</table>',
        );

    $table->setTemplate($template);
    echo $table->generate();
?>

<?= $this->endSection(); ?>