<?php
// get the HTTP method, path and body of the request
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
// retrieve the table and key from the path
$zipcode = preg_replace('/[^a-z0-9_]+/i','',array_shift($request));
// create curl resource
$ch = curl_init();
// set url
curl_setopt($ch, CURLOPT_URL, "https://api.yelp.com/v3/businesses/search?cc=NJ&location='$zipcode'&categories=restaurants");
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Authorization: Bearer VlUdnvfX9Cyqo5U2Ygf5ms3Gfzd3rhP8r5hERz94wFHBz0P2yCGb-lfUuRLtqCXWIHAeVemxo1wxf8awJYjaCZtkwtrCKJIAMGEraB6QRZ4wanl5AcRA-fTmf7rdW3Yx',
));
// $output contains the output json
$output = curl_exec($ch);
// close curl resource to free up system resources
curl_close($ch);
// json response
echo json_decode($output, true);
?>
