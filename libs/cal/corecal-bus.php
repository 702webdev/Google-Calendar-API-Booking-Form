<?php

/* 
* YOU WILL NEED YOUR GOOGLE API KEY FOR THIS TO WORK
*
* You will also notice many areas that are commented out which can be used for debugging by uncommenting them.
*
*/

function sendPostRequest($postargs,$token, $cal){
        $APIKEY = 'YOUR API KEY HERE';
        $request = 'https://www.googleapis.com/calendar/v3/calendars/' . $cal . '/events?pp=1&key=' . $APIKEY;
 
        //$auth = json_decode($_SESSION['oauth_access_token'],true);
 
        //var_dump($auth);
 
        $session = curl_init($request);
 
        // Tell curl to use HTTP POST
        curl_setopt ($session, CURLOPT_POST, true);
        // Tell curl that this is the body of the POST
        curl_setopt ($session, CURLOPT_POSTFIELDS, $postargs);
        // Tell curl not to return headers, but do return the response
        curl_setopt($session, CURLOPT_HEADER, true);
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($session, CURLOPT_VERBOSE, true);
        curl_setopt($session, CURLINFO_HEADER_OUT, true);
        curl_setopt($session, CURLOPT_HTTPHEADER, array('Content-Type:  application/json','Authorization:  Bearer ' . $token,'X-JavaScript-User-Agent:  Mount Pearl Tennis Club Bookings'));
     
        $response = curl_exec($session);
    
        //echo '<pre>';
        //var_dump(curl_getinfo($session, CURLINFO_HEADER_OUT)); 
        //echo '</pre>';
         
        curl_close($session);
        return $response;
}
 
function sendGetRequest($token,$request){
        $APIKEY = 'YOUR API KEY HERE';
        //$request = 'https://www.googleapis.com/calendar/v3/calendars/' . $CAL . '/events?pp=1&key=' . $APIKEY;
 
        //$auth = json_decode($_SESSION['oauth_access_token'],true);
 
        //var_dump($auth);
 
        $session = curl_init($request);
 
        // Tell curl to use HTTP POST
        curl_setopt ($session, CURLOPT_HTTPGET, true);
        // Tell curl not to return headers, but do return the response
        curl_setopt($session, CURLOPT_HEADER, false);
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($session, CURLINFO_HEADER_OUT, false);
        curl_setopt($session, CURLOPT_HTTPHEADER, array('Authorization:  Bearer ' . $token,'X-JavaScript-User-Agent:  Mount Pearl Tennis Club Bookings'));
 
        $response = curl_exec($session);
 
        //echo '<pre>';
        //var_dump(curl_getinfo($session, CURLINFO_HEADER_OUT)); 
        //echo '</pre>';
 
        curl_close($session);
        return $response;
}
 
function createPostArgsJSON($date,$starttime,$endtime,$title,$where,$request){
        $arg_list = func_get_args();
        foreach($arg_list as $key => $arg){
                $arg_list[$key] = urlencode($arg);
        }
        $postargs = <<<JSON
{
 "start": {
  "dateTime": "{$date}T{$starttime}:00.000-08:00"
 },
 "end": {
  "dateTime": "{$date}T{$endtime}:00.000-08:00"
 },
 "summary": "$title",
 "description": "$request",
 "location": "$where"
}
JSON;
        return $postargs;
}
 
/*
*  ----- INSTRUCTIONS FOR THIS SECTION -----
*
* Go to http://enarion.net/programming/php/google-client-api/google-client-api-php/<br>
* Follow the tutorial step by step and then come back and fill in the information below. 
*
*/ 
function getAccessToken(){
        $tokenURL = 'https://accounts.google.com/o/oauth2/token';
        $postData = array(
			'client_secret'=>'CLIENT SECRET',
			'grant_type'=>'refresh_token',
			'refresh_token'=>'REFRESH TOKEN',
			'client_id'=>'YOUR CLIENT ID'
		);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $tokenURL);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
        $tokenReturn = curl_exec($ch);
        $token = json_decode($tokenReturn);
        //var_dump($tokenReturn);
        $accessToken = $token->access_token;
        return $accessToken;
}
 
function isTimeBooked($date,$starttime,$endtime,$cal){
        $APIKEY = 'YOUR API KEY HERE';
        $start = $date . 'T' . '09:00:00.000-08:00';
        $end = $date . 'T' . '20:00:00.000-08:00';
        $token = getAccessToken();
        $result = sendGetRequest($token, 'https://www.googleapis.com/calendar/v3/calendars/' . $cal . '/events?timeMax=' . $end . '&timeMin=' . $start . '&fields=items(end%2Cstart)&key=' . $APIKEY);
		//var_dump($result);
		
		$json_obj = json_decode( $result );
		//var_dump($json_obj);
		foreach($json_obj as $obj)
			{	
			  //echo '<br>';
			  //print_r($obj);
			  //echo '<br>';
			  //echo '<br>';
			  
			  $count = count($obj); 
			}
		//echo $count;	
        if($count >= 1){
                return $obj; 
        }
        else{
                return false;
        }
}


function getEndLocation($date,$starttime,$endtime,$cal){
        $APIKEY = 'YOUR API KEY HERE';
        $start = $date . 'T' . $starttime . ':00.000-08:00';
        $end = $date . 'T' . $endtime . ':00.000-08:00';
        $token = getAccessToken();
        $result = sendGetRequest($token, 'https://www.googleapis.com/calendar/v3/calendars/' . $cal . '/events?timeMax=' . $end . '&timeMin=' . $start . '&fields=items%2Flocation&key=' . $APIKEY);
		//var_dump($result);
		
		$json_obj = json_decode( $result );
		
	
		foreach($json_obj as $obj )
			{	
			  echo '<br>';
			  //print_r($obj);
			  echo '<br>';
			  //var_dump($obj);
			  //echo '<br>';
			  //echo $obj[0]->location;
			  $endLocation = $obj[0]->location;
			  //echo '<br>';
			  //echo '<br>';
			  $count = count($obj); 
			}
		//echo $count;	
        if($count >= 1){
				return $endLocation;
        }
        else{
                return false;
        }
}


   
function checkCourtRegistrations($startdate,$starttime,$enddate,$endtime,$cal){
       $APIKEY = 'YOUR API KEY HERE';
        $start = $startdate . 'T' . $starttime . ':00-08:00';
        $end = $enddate . 'T' . $endtime . ':00-08:00';
        $token = getAccessToken();
        $result = sendGetRequest($token, 'https://www.googleapis.com/calendar/v3/calendars/' . $cal . '/events?timeMax=' . $end . '&timeMin=' . $start . '&fields=items(end%2Cstart%2Csummary)%2Csummary&pp=1&key=' . $APIKEY);
        if(strlen($result) > 5){
            $result = json_decode($result,true);
            //return array($result['summary'] => $result['items']);
            return array('items' => $result['items'], 'court' => $result['summary']);
        }
        else{
            return '';
        }
}


// Haversine formula
function Haversine($start, $finish) {
	
	$theta = $start[1] - $finish[1]; 
	$distance = (sin(deg2rad($start[0])) * sin(deg2rad($finish[0]))) + (cos(deg2rad($start[0])) * cos(deg2rad($finish[0])) * cos(deg2rad($theta))); 
	$distance = acos($distance); 
	$distance = rad2deg($distance); 
	$distance = $distance * 60 * 1.1515; 
	
	return round($distance, 2);

}

// Get lat/long co-ords
function getLatLong($address) {
		
	$address = str_replace(' ', '+', $address);
	$url = 'http://maps.googleapis.com/maps/api/geocode/json?address='.$address.'&sensor=false';

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$geoloc = curl_exec($ch);
	
	$json = json_decode($geoloc);
	return array($json->results[0]->geometry->location->lat, $json->results[0]->geometry->location->lng);
	
}
/* 
 * End Core Calendar Functions (contents of the corecal.php file above)
 */