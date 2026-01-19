<?php

namespace Clases;

use \Firebase\JWT\JWT;


class Login extends Conexion
{

    var $key = "-----BEGIN RSA PRIVATE KEY-----
MIIEogIBAAKCAQEAy8WLgGyzYl11OZ1eU5TW+of1Rhk2s0UC0uZZRalL4QIkRnwU
pGJT3w0T9QkqacJC0TprU6ASZDZP1rSnLCk+64sqYHsCr6Lhlb46vu9w5gD6WSxd
3DIxsbzrhZ11RWFE6OfZBTyeBjDCnKuoIIzj7ZJIcrT8NhXjWR3q2vTtP7L2V+WH
8hLhBTSv/73H0i1KXbHDSVA0T01HJegKmfvuPpjCooE7Z6eLmzWRPHlnKVfFQiqS
t/WrDl5pihHg1bXr5VTTitkoK4GMNUYeL84U9ukmEjcoBJPs7evF+WjzPhu8Evyf
oCo9OujaaL9kNZShRo6P4e3B1h5u3sYhEEjrQQIDAQABAoIBAFeZryUgleV9o/2G
x5xK6jh95lWiVT+wNUyRNmOaKkKq9wlOIlmg48mKB8BZlmAs4SitYqJquD1Yk+4L
b6queJwuEaO0fi0fardDNmIK8ZAPb5CSYC9fbLmqK94fGOEgtc0ijsuPiafDooZT
zU1hBEOHlZmqcJqXwkr3b5V9odi1xBTbAOZcYGdOKobfHnH1ygDr5QHx2yNx5JYN
ktRvDhnOP50s0MyOYcfI7Q4/ckaxmR3RZmcVKsmEdBxA9T7jadJV7XS5F47xb2Ow
ntfXcqUBkQk9nlNdKmUww1/G9dMglO+BW4BtmS4+q6iAAsSlU+syAnz7VZti+8eh
1UnvKTkCgYEA9L4Aayxix6xQfdRaA47TVBX/+5fmJ9YpmesY9E3t3sjl4da1wq3s
OuR/8RuW6N4M7mlkt47W/CdrKjSOv+ctetnBA8Gf04kVdGEh8BA3q7WDN13HAd9i
IE+YTRZp6sqreDfIOqrDhs+E1h9Ft7bLyZcB58j5/uO8PjlUQWh5Pm8CgYEA1SUW
sKG7A4+avjxibZZYKcse9niidyK36WshAIICznv3FfmRcjUKnkYMyu7QbMGP3Her
xrGVTFOmBDYnitgaDbu11UAIWjaTbyOAdOucWWeYbykxOHkDFEnnKERvhrJLZFSK
q2qbDcJimaNzpagEiPTccCJr/L91Qsbw1ql/SU8CgYBAPzB08e3sZLusjHYkwPWQ
+UV9kl6Ezp+VHDYsy9hJx4sxQd/s/yMoQpuje46eCsxyOZCK7yBYiTCEn89paRJz
UX5tsgJ20WGkb2stTdSPatLLUf7P6wgjW0Gr2tprHFDu+hXB8NnrJcbFPuhaVc4h
WVbStduKodXkr8ACe554WQKBgHUGDfUgdts3pxA3exsL5o/bs75C8YBTkYIYjWAI
AZ54tWpdQZvgv1mywCdTAyATDfdPxQIsUfo8GvRI/2Dd0UAlBWp146AUQtJMPaT0
Dz2PAURW621EE4q6IK4dFNZxYa9OM2x19XeSeCw+b6pOG19OgREX9Q4p2Cm3rFdP
bFFFAoGAQ+Ba4K+u4/ivsuc7gDKsh7QZm/m/6NDXKRnW4BmSHIF6b7Q1k8XCy9rI
uY9BEjm0oJ5pnCF2tviHg5mxS8N6hj4Srnptwccc4grBIyzRvXSCZA3tNNDxlbuD
fQUV+x+I/nZz2XHI++1YBXG1+PW1kZbzeDZwEcPZC/gYI1Fm8qI=
-----END RSA PRIVATE KEY-----
";
    var $issued_at;
    var $expiration_time;
    var $issuer = "http://localhost/CodeOfaNinja/RestApiAuthLevel1/";

    var $requestMethod;
    var $id;
    var $firstname;
    var $lastname;
    var $email;
    var $password;

    public function __construct($requestMethod)
    {
        parent::__construct();
        $this->requestMethod = $requestMethod;
        $this->issued_at = time();
        $this->expiration_time = $this->issued_at + (60 * 60); // valid for 1 hour
    }

    private function notFoundResponse()
    {
        $response['status_code_header'] = 'HTTP/1.1 404 Not Found';
        $response['body'] = null;
        return $response;
    }

    public function processRequest()
    {
        switch ($this->requestMethod) {
            case 'GET':
                break;
            case 'POST':
                $response = $this->login();
                break;

            case 'OPTIONS':
                $response['status_code_header'] = 'HTTP/1.1 200 OK';
            default:
                $response = $this->notFoundResponse();
                break;
        }
    }

    public function emailExists($email)
    {
        // query to check if email exists
        $query = "SELECT id, firstname, lastname,email, password FROM person " .
            " WHERE email = ? LIMIT 0,1";
        // prepare the query
        $stmt = $this->conexion->prepare($query);
        // sanitize
        $email = htmlspecialchars(strip_tags($email));
        // bind given email value
        $stmt->bindParam(1, $email);
        // execute the query
        $stmt->execute();
        // get number of rows
        $num = $stmt->rowCount();
        // if email exists, assign values to object properties for easy access and use for php sessions
        if ($num > 0) {
            // get record details / values
            $row = $stmt->fetch(\PDO::FETCH_ASSOC);
            // assign values to object properties
            $this->id = $row['id'];
            $this->firstname = $row['firstname'];
            $this->lastname = $row['lastname'];
            $this->email = $row['email'];
            $this->password = $row['password'];
            // return true because email exists in the database
            return true;
        }
        // return false if email does not exist in the database
        return false;
    }

    function login()
    {
        // get posted data
        $data = json_decode(file_get_contents("php://input"));
        $arraydata = get_object_vars($data);
        // set product property values
        // $email = $data['email'];
        $email = $arraydata['email'];

        $email_exists = $this->emailExists($email);


        // check if email exists and if password is correct
        if ($email_exists && password_verify($arraydata['password'], $this->password)) {
            $token = array(
                "iat" => $this->issued_at,
                "exp" => $this->expiration_time,
                "iss" => $this->issuer,
                "data" => array(
                    "id" => $this->id,
                    "firstname" => $this->firstname,
                    "lastname" => $this->lastname,
                    "email" => $this->email
                )
            );
            // set response code
            http_response_code(200);
            // generate jwt
            $jwt = JWT::encode($token, $this->key, "RS256");
            echo json_encode(
                array(
                    "message" => "Successful login.",
                    "jwt" => $jwt
                )
            );
        } // login failed
        else {
            // set response code
            http_response_code(401);
            // tell the user login failed
            echo json_encode(array("message" => "Login failed."));
        }
    }
}
