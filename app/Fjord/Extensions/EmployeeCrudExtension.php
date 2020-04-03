<?php

namespace App\Fjord\Extensions;

use AwStudio\Fjord\Application\Vue\Extension;
use App\Models\Employee;

class EmployeeCrudExtension extends Extension
{
    /**
     * Modify props for Vue application in handle method.
     * 
     * @var array $props
     * @return array $props
     */
    public function handle($component)
    {
        if (!$component->is(Employee::class)) {
            return;
        }

        $component->addGlobalAction('export-employees');
        $component->addRecordAction('employee-record-actions');
    }
}
