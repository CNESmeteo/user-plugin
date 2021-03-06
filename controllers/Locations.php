<?php namespace CnesMeteo\User\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Locations Back-end Controller
 */
class Locations extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.RelationController',
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $relationConfig = 'config_relation.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('October.System', 'system', 'settings');
    }

    public function listInjectRowClass($record, $definition = null)
    {
        if (!$record->enabled)
            return 'safe disabled';
    }
}