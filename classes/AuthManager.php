<?php namespace CNESmeteo\User\Classes;

use October\Rain\Auth\Manager as RainAuthManager;
use CNESmeteo\User\Models\Settings as UserSettings;

class AuthManager extends RainAuthManager
{
    protected static $instance;

    protected $sessionKey = 'user_auth';

    protected $userModel = 'CNESmeteo\User\Models\User';

    // protected $groupModel = 'CNESmeteo\User\Models\Group';

    protected $throttleModel = 'CNESmeteo\User\Models\Throttle';

    public function init()
    {
        $this->useThrottle = UserSettings::get('use_throttle', $this->useThrottle);
        $this->requireActivation = UserSettings::get('require_activation', $this->requireActivation);
        parent::init();
    }
}