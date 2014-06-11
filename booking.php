<script>
function startOver(){
	window.location="ADDRESS TOP WHERE EVER YOU PUT THIS FILE ON THE SERVER/busbooking.php";
}
</script>


<?php


require_once('libs/cal/corecal.php');

$thecal = 'court1';



/*
 * Advance is the amount of time in the future someone can book something.
 * days
 * weeks
 * months
 * If it is 0, it will allow unlimited future booking
 */
 
/* 
 * ------ Instructions ------
 * Fill in where is says put calendar id with the id of your calendar which can be found by doing the following. 
 * 
 * 1. Access your Google Calendar at https://www.calendar.google.com.
 * 2. Click on the drop down arrow next to the affected calendar and select 'Calendar settings'
 * 3. Copy the string beside 'Calendar ID' and paste it in.
 *
 * You will also need the API Key for Google Calendar as well.
 */ 
 
 $calendarId = "CALENDER ID GOES HERE";
 
$courts = array(
        'court1' => array('cid' => 'court1', 'name' => 'court1', 'id' => 'CALENDER ID GOES HERE', 'starttime' => '10:00:00', 'endtime' => '20:00:00', 'advance' => '52 weeks'),
        
);
 
$APIKEY = 'PUT API KEY HERE';
 
$message = "";
 
if(isset($_POST['submit']) && $_POST['submit'] == 'Book Court'){
        
	  /* This section is to set the date in the correct format 
	   * and to set the ending time to 15 minutes past the time
	   * that they selected and set time to 15 minuts prior
	   * to the time they selected which is used to determine
	   * information about the location of each booking and if
	   * the driver can get to the two places within one trip. 
	   */
	  
				$date = $_POST['startdate'];
				$startdate = date("Y-m-d", strtotime($date));
				$From = $_POST['starttime'];
				$Minutes = 15;
				$endtime1 = date("H:i", strtotime($From)+($Minutes*60));
				$locationStartTime = date("H:i", strtotime($From)-($Minutes*60));
				$endtime;
				
		/* This section gets the location that the user wants to be picked up
		 * and gets the location of any booking that is 15 minutes before or 
		 * 15 minutes after the time that they selected. It then will get the
		 * distance between the two points in miles. 
		 */	
				//$startlocation = $_POST['location'];
        		//$endlocation = getEndLocation($startdate,$locationStartTime,$endtime1,$courts[$_POST['calendar']]['id']);
				//$startLoc = $startlocation;
				//$endLoc = $endlocation;
				//if ($endlocation != ""){
					//$start = getLatLong($startLoc);
					//$finish = getLatLong($endLoc);
					//$distance = Haversine($start, $finish);
				//}else{
					//$distance = 0;
				//}
				
				
		if ($_POST['passengers'] == '1'){
			$titleDetails = $_POST['title'] .';'. $_POST['passengers'] .'per';
		}else{
			$titleDetails = $_POST['title'] .';'. $_POST['passengers'] .'ppl';
		}
				
		/*
         * Check to see if everything was filled out properly.
         */
      
		
        if(date('Ymd') > date('Ymd',strtotime($_POST['startdate']))){
                $message = 'You cannot make a booking in the past.  Please check your date.';
        }
        elseif($_POST['starttime'] == ''){
                $message = 'You must enter a start time.';
							?> 
                <script type="text/javascript"> 
<!--
window.document.write('<link type="text/css" rel="stylesheet" href="https://www.therange702.com/parallax/busbooking.css"><h2><span style="color: #ff0000;">Unfortunately, that time is already booked. &nbsp;<br></span></h2><p><em><strong>Please give us a call at (702) 485-3232 and we\'ll get you on the schedule...</strong></em> &nbsp;</p><p>&nbsp;</p><p>Thank you!</p><div style="width:100%; text-align: center;"><a href="https://www.therange702.com/parallax/busbooking.php" >Click Here to Start Over</a></div>');
//-->
</script> 
<?php
        
				
        }
		elseif ($_POST['title'] == '') {
				$message = 'You must enter your name';
					?> 
                <script type="text/javascript"> 
<!--
window.document.write('<link type="text/css" rel="stylesheet" href="https://www.therange702.com/parallax/busbooking.css"><h2><span style="color: #ff0000;">There was an error in your submission please be sure to fill out all the required fields. <br>-Thank You</span></h2>');
//-->
</script> 
<?php
		}
		elseif ($_POST['passengers'] == '') {
				$message = 'You must enter your name';
					?> 
                <script type="text/javascript"> 
<!--
window.document.write('<link type="text/css" rel="stylesheet" href="https://www.therange702.com/parallax/busbooking.css"><h2><span style="color: #ff0000;">There was an error in your submission please be sure to fill out all the required fields. <br>-Thank You</span></h2>');
//-->
</script> 
<?php
		}
     	elseif ($_POST['email'] == '') {
				$message = 'You must enter your email address';
					?> 
                <script type="text/javascript"> 
<!--
window.document.write('<link type="text/css" rel="stylesheet" href="https://www.therange702.com/parallax/busbooking.css"><h2><span style="color: #ff0000;">There was an error in your submission please be sure to fill out all the required fields. <br>-Thank You</span></h2>');
//-->
</script> 
<?php
		}
		elseif ($_POST['phone'] == '') {
				$message = 'You must enter your phone number';
					?> 
                <script type="text/javascript"> 
<!--
window.document.write('<link type="text/css" rel="stylesheet" href="https://www.therange702.com/parallax/busbooking.css"><h2><span style="color: #ff0000;">There was an error in your submission please be sure to fill out all the required fields. <br>-Thank You</span></h2>');
//-->
</script> 
<?php
		}
        /*
         * Check to see if booking is available for this time.
         */
        elseif(date('Hms', strtotime($_POST['starttime'] . ':00')) < date('Hms', strtotime($courts[$_POST['calendar']]['starttime'])) || date('Hms', strtotime($endtime1 . ':00')) > date('Hms', strtotime($courts[$_POST['calendar']]['endtime']))){
                $message = 'Booking not available during this time.  Please select another time.';
				?> 
                <script type="text/javascript"> 
<!--
window.document.write('<link type="text/css" rel="stylesheet" href="https://www.therange702.com/parallax/busbooking.css"><h2><span style="color: #ff0000;">Unfortunately, that time is already booked. &nbsp;<br></span></h2><p><em><strong>Please give us a call at (702) 485-3232 and we\'ll get you on the schedule...</strong></em> &nbsp;</p><p>&nbsp;</p><p>Thank you!</p>');
//-->
</script> 
<?php
        }
        /*
         * Check to see if we are alowed to book this far in advance.
         */
 
        elseif(date('Ymd',strtotime($_POST['startdate'])) > date('Ymd',strtotime('+' . $courts[$_POST['calendar']]['advance'],strtotime($_POST['startdate'])))){
                $message = 'You cannot book that far into the future.  You can only book ' . $courts[$_POST['calendar']]['advance'] . ' in the future.  Please try again.';
                //$message .= date('Ymd',strtotime($_POST['startdate'])) . ' > ' . date('Ymd',strtotime('+' . $courts[$_POST['calendar']]['advance'],strtotime($_POST['startdate'])));
        }
        /*
         * Check and see if a booking already exists.
         */
        elseif(isTimeBooked($startdate,$_POST['starttime'],$endtime1,$courts[$_POST['calendar']]['id'])){
                $message = 'Time already booked.  Please select another time.';
				?> 
                <script type="text/javascript"> 
<!--
window.document.write('<link type="text/css" rel="stylesheet" href="https://www.therange702.com/parallax/busbooking.css"><h2><span style="color: #ff0000;">Unfortunately, that time is already booked. &nbsp;<br></span></h2><p><em><strong>Please give us a call at (702) 485-3232 and we\'ll get you on the schedule...</strong></em> &nbsp;</p><p>&nbsp;</p><p>Thank you!</p>');
//-->
</script> 
<?php
        
		/*
         * Check and see if distance between location is too far for one trip. 
         */
		//elseif($distance >= 3.00){
               //$message = 'Time chosen will conflict with other bookings due to the distance between locations.';
		
        
        /*
         * Everything is good, submit the event.
         */
		}else{
                $postargs = createPostArgsJSON($startdate,$_POST['starttime'],$endtime1,$titleDetails,$_POST['location'],$_POST['requests']);
                $token = getAccessToken();
                $result = sendPostRequest($postargs,$token,$courts[$_POST['calendar']]['id']);
                //echo '<pre>' . $result . '</pre>';
				$emailaddress = "info@youremail.com";
				$customeremail = $_POST['email'];
				$subject = "New Online Bus Booking from The Range 702";
				$email = $_POST['email'];
				$military_time = $_POST['starttime'];
				$standard_time = date('h:i A', strtotime($military_time));
				$message="";
				$message.="Name: ".$_POST['title']."\r\n";
				$message.="E-Mail: ".$_POST['email']."\r\n";
				$message.="Phone Number: ".$_POST['phone']."\r\n\r\n";
				$message.="\r\n Booking Information:\r\n\r\n";
				$message.="Passengers: ".$_POST['passengers']."\r\n";
				$message.="Pick Up Date: ".$date."\r\n";
				$message.="Pick Up Time: ".$standard_time."\r\n";
				$message.="Pick Up Location: ".$_POST['location']."\r\n";
				
				
				$message=$message."\r\nMessage:\r\n".$_POST['requests'];
				mail($emailaddress,$subject,$message,"From: $email" );
				mail($customeremail,$subject,$message,"From: info@youremail.com" );
							
				
				
				
			?> 
                <script type="text/javascript"> 
<!--
window.document.write('<link type="text/css" rel="stylesheet" href="https://www.therange702.com/parallax/busbooking.css"><h2><span style="color: #339966;">The shuttle was booked. You will recieve an email confirmation shortly. &nbsp;<br>-Thank You</span></h2>');
//-->
</script> 
<?php
        }
		}
?>
