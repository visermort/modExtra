<?php
/** @var modX $modx */
/** @var array $sources */

$settings = array();

$tmp = array(
    'api_url' => array(
        'xtype' => 'textfield',
        'value' => 'https://online.moysklad.ru/api/remap/1.1/',
        'area' => 'mycomponent_main',
    ),
    'api_login' =>array(
        'xtype' => 'textfield',
        'value' => 'login',
        'area' => 'mycomponent_main',
    ),
    'api_password' =>array(
        'xtype' => 'textfield',
        'value' => 'password',
        'area' => 'mycomponent_main',
    ),
    
);

foreach ($tmp as $k => $v) {
    /** @var modSystemSetting $setting */
    $setting = $modx->newObject('modSystemSetting');
    $setting->fromArray(array_merge(
        array(
            'key' => 'mycomponent_' . $k,
            'namespace' => PKG_NAME_LOWER,
        ), $v
    ), '', true, true);

    $settings[] = $setting;
}
unset($tmp);

return $settings;
