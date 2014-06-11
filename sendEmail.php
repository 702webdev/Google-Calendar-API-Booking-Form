
<?php

	$title = $_POST['title'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$passengers = $_POST['passengers'];
	
	$messageReq = $_POST['message'];
	$location = $_POST['location'];

require_once('libs/cal/corecal-bus.php');

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
 
if(isset($_POST['submits']) && $_POST['submits'] == 'Pick A Time!'){
        
	  /* This section is to set the date in the correct format 
	   * and to set the ending time to 15 minutes past the time
	   * that they selected and set time to 15 minuts prior
	   * to the time they selected which is used to determine
	   * information about the location of each booking and if
	   * the driver can get to the two places within one trip. 
	   */
	  
				$date = $_POST['startdate'];
				$startdate = date("Y-m-d", strtotime($date));
				
				
	
		
		/*
         * Check to see if everything was filled out properly.
         */
      
		
        if(date('Ymd') > date('Ymd',strtotime($startdate))){
                $message = 'You cannot make a booking in the past.  Please check your date.';
						?> 
                <script type="text/javascript"> 
<!--
window.document.write ('<link type="text/css" rel="stylesheet" href="https://www.therange702.com/parallax/busbooking.css"><h2><span style="color: #ff0000;">There was an error in your submission please be sure to fill out all the required fields. <br>-Thank You</span></h2><div style="width:100%; text-align: center;"><a href="'+(window.location="https://www.therange702.com/parallax/busbooking.php")+'">Click Here to Start Over</a></div>');
//-->
</script> 
<?php
        }
        
		elseif ($title == '') {
				$message = 'You must enter your name';
						?> 
                <script type="text/javascript"> 
<!--
window.document.write ('<link type="text/css" rel="stylesheet" href="https://www.therange702.com/parallax/busbooking.css"><h2><span style="color: #ff0000;">There was an error in your submission please be sure to fill out all the required fields. <br>-Thank You</span></h2><div style="width:100%; text-align: center;"><a href="'+(window.location="https://www.therange702.com/parallax/busbooking.php")+'">Click Here to Start Over</a></div>');
//-->
</script> 
<?php
		}
     	elseif ($email == '') {
				$message = 'You must enter your email address';
					?> 
                <script type="text/javascript"> 
<!--
window.document.write ('<link type="text/css" rel="stylesheet" href="https://www.therange702.com/parallax/busbooking.css"><h2><span style="color: #ff0000;">There was an error in your submission please be sure to fill out all the required fields. <br>-Thank You</span></h2><div style="width:100%; text-align: center;"><a href="'+(window.location="https://www.therange702.com/parallax/busbooking.php")+'">Click Here to Start Over</a></div>');
//-->
</script> 
<?php
		}
		elseif ($phone == '') {
				$message = 'You must enter your phone number';
				?> 
                <script type="text/javascript"> 
<!--
window.document.write ('<link type="text/css" rel="stylesheet" href="https://www.therange702.com/parallax/busbooking.css"><h2><span style="color: #ff0000;">There was an error in your submission please be sure to fill out all the required fields. <br>-Thank You</span></h2><div style="width:100%; text-align: center;"><a href="'+(window.location="https://www.therange702.com/parallax/busbooking.php")+'">Click Here to Start Over</a></div>');
//-->
</script> 
<?php
		}
		elseif ($messageReq == '') {
				$message = 'You must enter a message';
				?> 
                <script type="text/javascript"> 
<!--
window.document.write ('<link type="text/css" rel="stylesheet" href="https://www.therange702.com/parallax/busbooking.css"><h2><span style="color: #ff0000;">There was an error in your submission please be sure to fill out all the required fields. <br>-Thank You</span></h2><div style="width:100%; text-align: center;"><a href="'+(window.location="https://www.therange702.com/parallax/busbooking.php")+'">Click Here to Start Over</a></div>');
//-->
</script> 
<?php
		}
       
      
        /*
         * Check for available tome
         */
	
        else{
                	
        $new_thing = isTimeBooked($startdate,$_POST['starttime'],$endtime1,$calendarId);
		//var_dump($new_thing);
		echo "<br><br>";
		$start = 'start';
		$dateTime = 'dateTime';
		?>
        
	
        <?php
		$count = count($new_thing);
		for( $i = 0; $i < $count; $i ++)
{
      	
    	
		
		$startTime = $new_thing[$i]->start->{$dateTime};
		$rest = substr($startTime, -14, -9);
		//echo $rest;
		?>
        
        <script>
		var j = jQuery.noConflict();
	  j(function() {
		j("select#starttime option[value='<?php echo $rest ?>']").attr('disabled','disabled') 
		j("select#starttime option[value='13:15']").attr('disabled','disabled')
		j("select#starttime option[value='13:30']").attr('disabled','disabled') 
		j("select#starttime option[value='13:45']").attr('disabled','disabled') 
		//optionText = optionsName.text();
		//alert('Hello');
		//options.attr("disabled", true);
	  });
		</script>

             
   <?php    
}

 

        }
		
  
}
?>




<?php
	$title = $_POST['title'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$passengers = $_POST['passengers'];
	$startdate = $_POST['startdate'];
	$message = $_POST['message'];
	$location = $_POST['location'];
	
		$response = '<form id="captcha_form" action="https://www.therange702.com/booking.php?cal=court1" method="post" name="booking"><fieldset>
<table style="width: 300px; margin: 0 auto; font-size: 12px;" border="0">
<tr style="height: 35px;">
<td><label class="solo" for="starttime">Pick Up Time:</label><span class="required">*</span></td>
<td><span id="startTimes"><select id="starttime" name="starttime"> <option value="10:00">10:00AM</option> <option value="10:30">10:30AM</option> <option value="11:00">11:00AM</option> <option value="11:30">11:30AM</option> <option value="12:00">12:00PM</option> <option value="12:30">12:30PM</option> <option value="13:00">01:00PM</option> <option value="13:30">01:30PM</option> <option value="14:00">02:00PM</option> <option value="14:30">02:30PM</option> <option value="15:00">03:00PM</option><option value="15:30">03:30PM</option> <option value="16:00">04:00PM</option> <option value="16:30">04:30PM</option> <option value="17:00">05:00PM</option><option value="17:30">05:30PM</option> </select></span><br />
<br />
<br />
</td>
</tr>

<tr>
<td colspan="2"><input type="hidden" name="calendar" value="court1" readonly /> <input type="hidden" name="calendarname" value="court1" readonly /> <button class="slider-button" style="float: right; width: 100%; border: 0; height: 35px;" name="submit" value="Book Court" type="submit">Send</button></td>
</tr>
<tr>
<td colspan="2"><br />
<div style="width:100%; text-align: center;">
<A HREF="javascript:history.go(0)">Click Here to Start Over</A>
</div>
<input type="hidden" name="title" value="'.$title.'" />
<input type="hidden" name="email" value="'.$email.'" />
<input type="hidden" name="phone" value="'.$phone.'" />
<input type="hidden" name="location" value="'.$location.'" />
<input type="hidden" name="requests" value="'.$message.'" />
<input type="hidden" name="passengers" value="'.$passengers.'" />
<input type="hidden" name="startdate" value="'.$startdate.'" />

</td>
</tr>
</tbody>
</table>
</fieldset></form>';

		
		echo $response;


?>