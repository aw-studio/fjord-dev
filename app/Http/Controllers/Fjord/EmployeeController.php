<?php

namespace App\Http\Controllers\Fjord;

use AwStudio\Fjord\Form\Controllers\CrudController;
use AwStudio\Fjord\Form\Controllers\Traits\CrudIndexDeleteAll;
use AwStudio\Fjord\Form\Controllers\Traits\CrudShowForm;
use AwStudio\Fjord\Form\Controllers\Traits\CrudShowPreview;

class EmployeeController extends CrudController
{
    use CrudIndexDeleteAll,
        CrudShowForm,
        CrudShowPreview,
        Actions\EmployeeActions;

    // Set this to false if you don't want to use permissions on this crud-model
    public const PERMISSIONS = true;

    protected $modelName = 'Employee';

    public function __construct()
    {
        fjord()->package('aw-studio/fjord')->extension('employees.index')->add('globalActions', 'export-employees');
        fjord()->package('aw-studio/fjord')->extension('employees.index')->add('recordActions', 'employee-record-actions');

        parent::__construct();
    }
}
