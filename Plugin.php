<?php namespace CNESmeteo\User;

use App;
use Backend;
use System\Classes\PluginBase;
use Illuminate\Foundation\AliasLoader;

class Plugin extends PluginBase
{

    public function pluginDetails()
    {
        return [
            'name'        => 'User',
            'description' => 'Front-end user management.',
            'author'      => 'Alexey Bobkov, Samuel Georges',
            'icon'        => 'icon-user'
        ];
    }

    public function register()
    {
        $alias = AliasLoader::getInstance();
        $alias->alias('Auth', 'CNESmeteo\User\Facades\Auth');

        App::singleton('user.auth', function() {
            return \CNESmeteo\User\Classes\AuthManager::instance();
        });
    }

    public function registerComponents()
    {
        return [
            'CNESmeteo\User\Components\Session'       => 'session',
            'CNESmeteo\User\Components\Account'       => 'account',
            'CNESmeteo\User\Components\ResetPassword' => 'resetPassword',
        ];
    }

    public function registerNavigation()
    {
        return [
            'user' => [
                'label'       => 'Users',
                'url'         => Backend::url('cnesmeteo/user/users'),
                'icon'        => 'icon-user',
                'permissions' => ['user:*'],
                'order'       => 500,

                'sideMenu' => [
                    'users' => [
                        'label'       => 'All Users',
                        'icon'        => 'icon-user',
                        'url'         => Backend::url('cnesmeteo/user/users'),
                        'permissions' => ['user:access_users'],
                    ],
                ]

            ]
        ];
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'User Settings',
                'description' => 'Manage user based settings.',
                'category'    => 'Users',
                'icon'        => 'icon-cog',
                'class'       => 'CNESmeteo\User\Models\Settings',
                'sort'        => 100
            ],
            'location' => [
                'label'       => 'Locations',
                'description' => 'Manage available user countries and states.',
                'category'    => 'Users',
                'icon'        => 'icon-globe',
                'url'         => Backend::url('cnesmeteo/user/locations'),
                'sort'        => 100
            ]
        ];
    }

}