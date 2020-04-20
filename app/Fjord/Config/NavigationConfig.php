<?php

namespace App\Fjord\Config;

use Fjord\Application\Navigation\Config;
use Fjord\Application\Navigation\Navigation;

class NavigationConfig extends Config
{
    /**
     * Topbar navigation entries.
     *
     * @param \Fjord\Application\Navigation\Navigation $nav
     * @return void
     */
    protected function topbar(Navigation $nav)
    {
        $nav->section([
            $nav->title(__f('fj.user_administration')),

            $nav->preset('users'),
            $nav->preset('permissions')
        ]);

        $nav->section([
            $nav->preset('collections.settings', [
                'title' => __f('fj.settings')
            ])
        ]);
    }

    /**
     * Main navigation entries.
     *
     * @param \Fjord\Application\Navigation\Navigation $nav
     * @return void
     */
    protected function main(Navigation $nav)
    {
        $nav->section([
            $nav->group([
                'title' => 'Pages',
                'icon' => '<i class="fas fa-file"></i>',
            ], [
                $nav->preset('pages.home', [
                    'icon' => '<i class="fas fa-home">'
                ]),
                $nav->preset('pages.faq', [
                    'icon' => '<i class="fas fa-home">'
                ]),
            ])
        ]);

        $nav->section([
            $nav->title(__f('fj.user_administration')),
            $nav->preset('crud.departments', [
                'title' => ucfirst(__f("models.departments")),
                'icon' => '<i class="fas fa-building">',
            ]),
            $nav->preset('crud.employees', [
                'title' => ucfirst(__f("models.employees")),
                'icon' => '<i class="fas fa-users">'
            ]),
            $nav->preset('crud.projects', [
                'title' => ucfirst(__f("models.projects")),
                'icon' => '<i class="fas fa-project-diagram">',

            ]),
            /*
            $nav->preset('crud.articles', [
                'title' => 'Artikel',
                'icon' => '<i class="fas fa-project-diagram">'
            ]),
            */
        ]);
    }
}
