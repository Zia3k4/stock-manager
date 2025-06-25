<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RegistroFrequenciaRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class RegistroFrequenciaCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\RegistroFrequencia::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/registro-frequencia');
        CRUD::setEntityNameStrings('registro frequencia', 'registro frequencias');
    }

    protected function setupListOperation()
    {
        CRUD::setFromDb();
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(RegistroFrequenciaRequest::class);
        CRUD::setFromDb();

        CRUD::addField([
            'name' => 'funcionario_id',
            'label' => 'Funcionário',
            'type' => 'select',
            'entity' => 'funcionario',
            'model' => 'App\Models\Funcionario',
            'attribute' => 'nome',
        ]);
        CRUD::addColumn([
            'name' => 'chegou_atrasado',
            'label' => 'Chegou atrasado?',
            'type' => 'select_from_array',
            'options' => [1 => 'Sim', 0 => 'Não'],
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
