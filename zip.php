<?php function zipToinfo($zipcode){
      
        
        $url = "http://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($zipcode)."&sensor=true$key=AIzaSyBNPbKlU_F4hyc6SY5A3yljsLX_51SYzaA";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $response_a = json_decode($response, true);
        echo "<pre>";
        print_r( $response_a);
        
        
    }//ENd FUnction
    zipToinfo('indore');
    function geolocationaddress($lat,$long)
    {
       // $geolocation = $lat.','.$long;
        $geocode = "https://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$long&sensor=true&key=AIzaSyBNPbKlU_F4hyc6SY5A3yljsLX_51SYzaA";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $geocode);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response   = curl_exec($ch);
        curl_close($ch);
        $output     = json_decode($response);
          echo "<pre>";
        print_r( $output);
      //  pr($output);
        $dataarray  = get_object_vars($output);
        if ($dataarray['status'] != 'ZERO_RESULTS' && $dataarray['status'] != 'INVALID_REQUEST') {
            if (isset($dataarray['results'][0]->formatted_address)) {

                $address = $dataarray['results'][0]->formatted_address;

            } else {
                $address = 'Not Found';

            }
        } else {
            $address = 'Not Found';
        }
        return $address;
    }//End Function
    function getLnt($zip){
$url = "https://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($zip)."&key=AIzaSyBNPbKlU_F4hyc6SY5A3yljsLX_51SYzaA";
$result_string = file_get_contents($url);
$result = json_decode($result_string, true);
$result1[]=$result['results'][0];
$result2[]=$result1[0]['geometry'];
$result3[]=$result2[0]['location'];
return $result3[0];
}
    geolocationaddress(22.719568,75.857727);
//getLnt(452011);
?>