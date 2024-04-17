<?php

const SMILITO_INTEGRATION_EMAIL = 'provided-by-smilito';
const SMILITO_INTEGRATION_PASSWORD = 'provided-by-smilito';

function backendUrl($action) {
    return '/api.php?action=' . $action;
}

function preCheckoutRewards() {
    return integrationScript(false);
}

function postCheckoutRewards() {
    return integrationScript(true);
}

function integrationScript($claim) {
    ob_start();
    $res = ob_get_clean();
    require 'smilito_integration.phtml';
    return $res;
}
