<?php
require '../vendor/autoload.php';
// required headers
header("Access-Control-Allow-Origin: http://localhost/rest-api-authentication-example/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;



function validate()
{
    $key = "-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAy8WLgGyzYl11OZ1eU5TW
+of1Rhk2s0UC0uZZRalL4QIkRnwUpGJT3w0T9QkqacJC0TprU6ASZDZP1rSnLCk+
64sqYHsCr6Lhlb46vu9w5gD6WSxd3DIxsbzrhZ11RWFE6OfZBTyeBjDCnKuoIIzj
7ZJIcrT8NhXjWR3q2vTtP7L2V+WH8hLhBTSv/73H0i1KXbHDSVA0T01HJegKmfvu
PpjCooE7Z6eLmzWRPHlnKVfFQiqSt/WrDl5pihHg1bXr5VTTitkoK4GMNUYeL84U
9ukmEjcoBJPs7evF+WjzPhu8EvyfoCo9OujaaL9kNZShRo6P4e3B1h5u3sYhEEjr
QQIDAQAB
-----END PUBLIC KEY-----
";
    $return_value = 401;
    // get posted data
    $data = json_decode(file_get_contents("php://input"));
    // get jwt
    $jwt = isset($data->jwt) ? $data->jwt : "";
    // if jwt is not empty
    if ($jwt) {
        // if decode succeed, show user details
        try {
            // decode jwt
            // $decoded = JWT::decode($jwt, $key, ['RS256']);
            $decoded = JWT::decode($jwt, new Key($key, 'RS256'));
            // set response code
            http_response_code(200);
            // show user details
            echo json_encode(array(
                "message" => "Access granted.",
                "data" => $decoded->data
            ));
            $return_value = 200;
        } // if decode fails, it means jwt is invalid
        catch (Exception $e) {
            // set response code
            http_response_code(401);
            // tell the user access denied  & show error message
            echo json_encode(array(
                "message" => "Access denied.",
                "error" => $e->getMessage()
            ));
        }
    } // show error message if jwt is empty
    else {
        // set response code
        http_response_code(401);
        // tell the user access denied
        echo json_encode(array("message" => "Access denied."));
    }
    return $return_value;
}
