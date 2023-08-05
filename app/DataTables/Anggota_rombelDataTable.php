<?php

namespace App\DataTables;

use App\Models\Anggota_rombel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
// use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class Anggota_rombelDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($query){
                // return $query;
                return ''; 
                
                
            })
            
            ->addColumn('No', function($query){
                // $hitung = count($query);
                $hitung = count(Anggota_rombel::all());
                for ($i=1; $i <= $hitung ; $i++) { 
                    $angka[] = $i;

                }
                $a = 1;
                while ($a <=$hitung ) {
                    $b[] = $a++;

                }

                // foreach ($hitung as $key => $value) {
                //     $b = $key++;
                // }
                return $angka;

            })

             ->addColumn('No Induk', function($query){
                $siswa = $query->peserta_didik->no_induk;
                    return  $siswa;  
            })

            ->addColumn('NISN', function($query){
                $siswa = $query->peserta_didik->nisn;
                    return  $siswa;  
            })
            ->addColumn('Peserta Didik', function($query){
                $siswa = $query->peserta_didik->nama;
                    return  $siswa;  
            })
            ->addColumn('Jurusan', function($query){
                $kelas = $query->rombongan_belajar->kelas->nama;
                $jurusan = $query->rombongan_belajar->jurusan->kode;
                $group = $query->rombongan_belajar->group->nama;
                    return $kelas.' '.$jurusan.''.$group ;  
            })
            ->setRowId('anggota_rombel_id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Anggota_rombel $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Anggota_rombel $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('anggota_rombel-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        // Button::make('excel'),
                        // Button::make('csv'),
                        // Button::make('pdf'),
                        // Button::make('print'),
                        // Button::make('reset'),
                        // Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            
            Column::make('No'),
            Column::make('Peserta Didik'),
            Column::make('No Induk'),
            Column::make('NISN'),
            Column::make('Jurusan'),
           
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Anggota_rombel_' . date('YmdHis');
    }
}
