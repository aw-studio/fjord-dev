<?php

namespace FjordApp\Extensions;

use App\Models\Employee;
use Fjord\User\Models\FjordUser;
use Fjord\Application\Vue\Extension;

class EmployeeCrudExtension extends Extension
{
    /**
     * Has user permission for this extension.
     * 
     * @var \Fjord\User\Models\FjordUser $user
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
        $component->headerComponent('export-employees');

        $component->index(function ($table) {
            $table->col('name')
                ->value('adsada')
                ->small();

            $table->component('employee-record-actions')
                ->small()
                ->label('');
        });
    }
}
