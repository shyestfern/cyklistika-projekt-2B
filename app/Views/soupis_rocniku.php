<?= $this->extend("layout/stranka_layout"); ?>

<?= $this->section("content"); ?>

<?php /**@var object $raceInfo */ ?>

<h1 class="text-center m-4"><?= $raceInfo->default_name ?></h1>


<div class="table-responsive">

<?php
    $table = new \CodeIgniter\View\Table();
    $table->setHeading("Logo", "Název", "Datum konání", "UCI Tour", "", "");

    /**@var array $rocnik */

    foreach($rocnik as $row){

        $logo = img([
            'src' => base_url('logos/' . $row->logo),
            'alt' => 'Logo ' . $row->real_name,
            'class' => 'img-fluid',
            'style' => 'max-height: 50px; width: auto;'
        ]);

        $nazev = $row->real_name;

        $odkaz = anchor('soupis_poradi/'.$row->id, $nazev);

        if($row->start_date == $row->end_date){
            $datum = $row->start_date;
        }
        else{
            $datum = $row->start_date . " - " . $row->end_date;
        }

        $uci_tour = $row->name;

        $upravitBtn = anchor('polozka/upravit/'.$row->id, 'Upravit', ['class' => 'btn btn-warning']);
        $smazatBtn = anchor('', 'Smazat', [
            'type' => 'button',
            'class' => 'btn btn-danger ms-2',
            'data-bs-toggle' => 'modal',
            'data-bs-target' => '#myModal' . $row->id // unikátní ID řádku
        ]);

        $upravitDiv = '<div class="text-center">' . $upravitBtn . '</div>';
        $smazatDiv = '<div class="text-center">' . $smazatBtn . '</div>';

        echo form_modal_delete(
            'myModal' . $row->id, 
            $row->id, 
            'Potvrzení smazání', 
            'Opravdu chcete smazat tuto položku?', 
            'polozka/smazat'
        );

        $table->addRow($logo, $odkaz, $datum, $uci_tour, $upravitDiv, $smazatDiv);
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

</div>

<div class="text-center">
    <?= anchor('polozka/pridat', 'Přidat', ['class' => 'btn btn-primary mb-3']) ?>
</div>

<?= $this->endSection(); ?>