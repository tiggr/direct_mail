<?php

use DirectMailTeam\DirectMail\Module\ConfigurationController;

return [
    'directmail_configuration_update' => [
        'path' => '/directmail/configuration',
        'methods' => ['POST'],
        'target' => ConfigurationController::class . '::updateConfigAction',
    ],
];
