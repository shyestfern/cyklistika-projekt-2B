<?= $this->extend("layout/stranka_layout"); ?>

<?= $this->section("content"); ?>

<?php

$table = new \CodeIgniter\View\Table();

$table->setHeading("Závod", "Datum konání", "UCI Tour", "Pořádí");

foreach($rocnik as $row){

$table->addRow("real_name", "start_date - end_date", "uci_tour", "rank");

if("start_date = end_date"){
    echo("start_date");
}

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