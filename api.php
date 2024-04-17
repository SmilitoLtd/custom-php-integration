<?php

/**
 * This file represents an API running on your server.
 * This is overly simple but serves as an example of what each endpoint should be doing.
 */
require_once 'init.php';

$resp = null;
switch ($_GET['action']) {
    case 'login':
        // This endpoint hits a Smilito API with your integration credentials and returns a JWT.
        // The sole purpose of this endpoint is to hide your credentials from the frontend.
        // Simply POST to the Smilito login endpoint with your credentials and return the response to the caller as JSON.
        $ch = curl_init( "https://api.smilito.io/serve/v1/login" );
        $payload = json_encode([
            'email' => SMILITO_INTEGRATION_EMAIL,
            'password' => SMILITO_INTEGRATION_PASSWORD,
        ]);
        curl_setopt( $ch, CURLOPT_POST, true );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $result = curl_exec($ch);
        curl_close($ch);

        http_response_code(200);
        header('Content-Type', 'application/json');
        echo $result;
    case 'basket-value':
        // This endpoint should return the value of the users current basket, in pence.
        // If they have
        //   - 1x T shirt valued £10
        //   - 2x socks values £2 each
        // Total value = £14
        // Basket value = 1400
        $resp = [
            'basketValue' => 1400,
        ];
        http_response_code(200);
        header('Content-Type', 'application/json');
        echo json_encode($resp);
        break;
    case 'basket-id':
        // This endpoint should return the users current basket id.
        // A basket id represents a single basket and should change whenever a user checks out.
        // This is somewhat equivalent to an order id, except before purchase.
        $resp = [
            'basketId' => 1234,
        ];
        http_response_code(200);
        header('Content-Type', 'application/json');
        echo json_encode($resp);
        break;
    default:
        http_response_code(404);
        echo 'Not found';
        die;
}
