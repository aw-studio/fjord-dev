<?php

namespace FjordApp\Config;

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
    public function topbar(Navigation $nav)
    {
        $nav->section([
            $nav->preset('profile'),
        ]);

        $nav->section([
            $nav->title(__f('fj.user_administration')),

            $nav->preset('user.user_index', [
                'icon' => fa('users')
            ]),
            $nav->preset('permissions')
        ]);

        $nav->section([
            $nav->preset('form.collections.settings', [
                'title' => __f('fj.settings'),
                'icon' => fa('cog')
            ])
        ]);
    }

    /**
     * Main navigation entries.
     *
     * @param \Fjord\Application\Navigation\Navigation $nav
     * @return void
     */
    public function main(Navigation $nav)
    {
        $nav->section([
            $nav->title('Pages'),
            $nav->group([
                'title' => 'Pages',
                'icon' => '<i class="fas fa-file"></i>',
            ], [
                $nav->preset('form.pages.home', [
                    'icon' => '<i class="fas fa-home">'
                ]),
                $nav->preset('form.pages.test', [
                    'icon' => fa('file-alt')
                ]),
                $nav->preset('form.pages.faq', [
                    'icon' => '<i class="fas fa-home">'
                ]),
            ])
        ]);

        $nav->section([
            $nav->title('Models'),
            $nav->preset('crud.department', [
                'title' => ucfirst(__f("models.departments")),
                'icon' => '<i class="fas fa-building">',
            ]),
            $nav->preset('crud.employee', [
                'title' => ucfirst(__f("models.employees")),
                'icon' => fa('users')
            ]),
            $nav->preset('crud.project', [
                'title' => ucfirst(__f("models.projects")),
                'icon' => '<i class="fas fa-project-diagram">',
            ]),
            $nav->preset('crud.comment', [
                'title' => 'Comments',
                'icon' => fa('comment'),
            ]),

        ]);
    }
}
