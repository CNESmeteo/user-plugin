<?php namespace CnesMeteo\User\Classes;

use October\Rain\Auth\Manager as RainAuthManager;
use CnesMeteo\User\Models\Settings as UserSettings;

class AuthManager extends RainAuthManager
{
    protected static $instance;

    protected $sessionKey = 'user_auth';

    protected $userModel = 'CnesMeteo\User\Models\User';

    // protected $groupModel = 'CnesMeteo\User\Models\Group';

    protected $throttleModel = 'CnesMeteo\User\Models\Throttle';

    public function init()
    {
        $this->useThrottle = UserSettings::get('use_throttle', $this->useThrottle);
        $this->requireActivation = UserSettings::get('require_activation', $this->requireActivation);
        parent::init();
    }
}