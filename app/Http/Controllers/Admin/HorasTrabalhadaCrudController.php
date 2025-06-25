<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\HorasTrabalhadaRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class HorasTrabalhadaCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\HorasTrabalhada::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/horas-trabalhada');
        CRUD::setEntityNameStrings('horas trabalhada', 'horas trabalhadas');
    }

    protected function setupListOperation()
    {
        CRUD::setFromDb();
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(HorasTrabalhadaRequest::class);
        CRUD::setFromDb();

        CRUD::addField([
            'name' => 'funcionario_id',
            'label' => 'Funcionário',
            'type' => 'select',
            'entity' => 'funcionario',
            'model' => 'App\Models\Funcionarios',
            'attribute' => 'nome',
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
