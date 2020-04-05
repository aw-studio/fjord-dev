<?php

namespace App\Fjord\Extensions;

use App\Models\Employee;
use Fjord\Fjord\Models\FjordUser;
use Fjord\Application\Vue\Extension;

class EmployeeCrudExtension extends Extension
{
    /**
     * Has user permission for this extension.
     * 
     * @var \Fjord\Fjord\Models\FjordUser $user
     * @return boolean
     */
    public function authenticate(FjordUser $user)
    {
        return $user->can('read employees');
    }

    /**
     * Modify props for Vue application in handle method.
     * 
     * @var array $props
     * @return array $props
     */
    public function handle($component)
    {
        $component->addGlobalAction('export-employees');
        $component->addRecordAction('employee-record-actions');
    }
}
