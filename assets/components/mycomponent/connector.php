<?php
if (file_exists(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php')) {
    /** @noinspection PhpIncludeInspection */
    require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
}
else {
    require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.core.php';
}
/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CONNECTORS_PATH . 'index.php';
/** @var myComponent $myComponent */
$myComponent = $modx->getService('mycomponent', 'myComponent', $modx->getOption('mycomponent_core_path', null,
        $modx->getOption('core_path') . 'components/mycomponent/') . 'model/mycomponent/'
);
$modx->lexicon->load('mycomponent:default');

// handle request
$corePath = $modx->getOption('mycomponent_core_path', null, $modx->getOption('core_path') . 'components/mycomponent/');
$path = $modx->getOption('processorsPath', $myComponent->config, $corePath . 'processors/');
$modx->getRequest();

/** @var modConnectorRequest $request */
$request = $modx->request;
$request->handleRequest(array(
    'processors_path' => $path,
    'location' => '',
));