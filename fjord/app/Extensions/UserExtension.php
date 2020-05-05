<?php

namespace FjordApp\Extensions;

use Fjord\Application\Vue\Extension;
use Fjord\User\Models\FjordUser;

class UserExtension extends Extension
{
    /**
     * Has user permission for this extension.
     * 
     * @var \Fjord\Fjord\Models\FjordUser $user
     * @return boolean
     */
    public function authenticate(FjordUser $user)
    {
        return true;
    }

    /**
     * Modify Vue component in handle method.
     * 
     * @var array $component
     * @return void
     */
    public function handle($component)
    {
        $component->index(function ($table) {
            //$table->col('Test')->value('TEst');
        });
    }
}
