<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.datepick.css"> 
<script type="text/javascript" src="js/jquery.datepick.js"></script>

<link type="text/css" rel="stylesheet" href="css/busbooking.css">

<script>
var g = jQuery.noConflict();
  g(function() {
    g( "#startdate" ).datepick({dateFormat: 'yyyy-mm-dd'});
  });
</script>
 
 <script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script>
 <script type="text/javascript" src="js/script.js"></script>
 
<div style="margin: 0 auto; text-align: center; width: 100%;">
<div style="font-family: 'texgyreadventorregular'; font-size: 31px; color: rgba(38,37,37,0.5);width:290px;">GET FREE TRANSPORTATION!</div>
<div style="font-family: 'arial'; font-size: 14px; font-style: italic; font-weight: bold;width:290px;">Book your free ride online and we will waive your $10 Range Fee!<br /><br />&nbsp;</div>
</div>
<form method="post" action="sendEmail.php"> 
<div id="container">

	

	<div id="main">
	<fieldset>
<table style="width: 300px; margin: 0 auto; font-size: 12px;" border="0">
<tbody>
<tr style="height: 25px;">
<td width="125px"><label class="solo" for="name">Passenger Name:</label><span class="required">*</span></td>
<td><input id="firstname" class="soloinput" type="text" name="title" value="" /></td>
</tr>
<tr style="height: 35px;">
<td width="125px"><label class="solo" for="passengers"># of Passengers:</label><span class="required">*</span></td>
<td><select id="passengers" name="passengers"> <option value="1">1</option> <option value="2">2</option> <option value="3">3</option> <option value="4">4</option> <option value="5">5</option> <option value="6">6</option> <option value="7">7</option> <option value="8">8</option> <option value="9">9</option> <option value="10">10</option> <option value="11">11</option> <option value="12">12</option> <option value="13">13</option> <option value="14">14</option> </select></td>
</tr>
<tr style="height: 25px;">
<td><label class="solo" for="date">Pick Up Date:</label><span class="required">*</span></td>
<td><input id="startdate" type="text" name="startdate" value="" placeholder="2013-10-31" /></td>
</tr>
<tr style="height: 35px;">
<td><label class="solo" for="location">Pick Up Location:</label><span class="required">*</span></td>
<td><select id="location" style="width: 145px;" name="location"> <option value="Aria - 3730 S Las Vegas Blvd, Las Vegas, NV">Aria Tour Bus</option> <option value="Bally's - 3645 S Las Vegas Blvd, Las Vegas, NV">Bally's N. Tour Bus Entrance</option> <option value="Bellagio - 3600 S Las Vegas Blvd, Las Vegas, NV&lrm;">Bellagio Shuttle Bus (d.stairs)</option> <option value="Caesars - 3570 S Las Vegas Blvd, Las Vegas, NV&lrm;">Caesars Main Valet</option> <option value="Casino Royale - 3411 S Las Vegas Blvd, Las Vegas, NV">Casino Royale Main Valet</option> <option value="Circus Circus - 2880 S Las Vegas Blvd, Las Vegas, NV&lrm;">Circus Circus Main Valet</option> <option value="Cosmopolitan - 3708 S Las Vegas Blvd, Las Vegas, NV">Cosmopolitan Main Valet</option> <option value="Elara - 80 E Harmon Ave, Las Vegas, NV">Elara Main Valet</option> <option value="Encore - 3121 S Las Vegas Blvd, Las Vegas, NV">Encore at Wynn Main Valet</option> <option value="Excalibur - 3850 S Las Vegas Blvd, Las Vegas, NV">Excalibur SW Side Roundabout</option> <option value="Flamingo - 3555 S Las Vegas Blvd. Las Vegas, NV">Flamingo Main Valet</option> <option value="Four Queens - 202 Fremont St, Las Vegas, NV">Four Queens Main Valet</option> <option value="Four Seasons - 3960 S Las Vegas Blvd, Las Vegas, NV&lrm;">Four Seasons Main Valet</option> <option value="Gold Coast - 4000 W Flamingo Rd, Las Vegas, NV">Gold Coast Main Valet</option> <option value="Golden Nugget - 129 Fremont St Las Vegas, NV">Golden Nugget Main Valet</option> <option value="Hard Rock Hotel - 4455 Paradise Rd, Las Vegas, NV">Hard Rock Hotel Main Valet</option> <option value="Harrah's Casino - 3475 S Las Vegas Blvd, Las Vegas, NV">Harrah's Main Valet</option> <option value="Hilton Grand Vacation - 2650 S Las Vegas Blvd, Las Vegas, NV">Hilton Grand Vacation Main Valet</option> <option value="Hooters Casino - 115 E Tropicana Ave, Las Vegas, NV">Hooters Main Valet</option> <option value="Imperial Pal (Quad) - 3535 S Las Vegas Blvd, Las Vegas, NV">The Quad Back Valet/Shuttle</option> <option value="Luxor Casino - 3900 S Las Vegas Blvd, Las Vegas, NV">Luxor North Side Valet</option> <option value="LVH - 3000 Paradise Rd, Las Vegas, NV">LVH Main Valet</option> <option value="Mandalay Bay - 3950 S Las Vegas Blvd, Las Vegas, NV">Mandalay Bay Shuttle Bus (beach lvl)</option> <option value="Mandarin Oriental - 3752 S Las Vegas Blvd, Las Vegas, NV">Mandarin Oriental Main Valet</option> <option value="MGM Casino -3799 S Las Vegas Blvd, Las Vegas, NV">MGM Main Valet</option> <option value="MGM Sig Tower - 45 E Harmon Ave, Las Vegas, NV">MGM Sig Tower Main Valet</option> <option value="Mirage Casino - 3400 S Las Vegas Blvd, Las Vegas, NV">Mirage at Shuttle Bus North</option> <option value="Monte Carlo Casino - 3770 S Las Vegas Blvd, Las Vegas, NV">Monte Carlo Taxi/Shuttle bus door</option> <option value="New York New York Casino -3790 S Las Vegas Blvd, Las Vegas, NV">New York New York Shuttle Bus</option> <option value="Orleans Casino - 4500 W Tropicana Ave, Las Vegas, NV">Orleans Main Valet</option> <option value="Palazzo Casino - 3325 S Las Vegas Blvd, Las Vegas, NV">Palazzo Main Valet</option> <option value="Palms Casino - 4321 W Flamingo Rd, Las Vegas, NV">Palms Main Valet</option> <option value="Paris Casino - 3655 S Las Vegas Blvd, Las Vegas, NV">Paris Tour Bus Lobby</option> <option value="Planet Hollywood - 3500 S Las Vegas Blvd, Las Vegas, NV">Planet Hollywood Tour Bus Lobby</option> <option value="Polo Towers - 3745 S Las Vegas Blvd, Las Vegas, NV">Polo Towers Main Valet</option> <option value="Renaissance - 3400 Paradise Rd, Las Vegas, NV">Renaissance Main Valet</option> <option value="Riviera - 2901 S Las Vegas Blvd, Las Vegas, NV">Riviera Main Valet</option> <option value="South Point Casino - 9777 S Las Vegas Blvd, Las Vegas, NV">South Point Main Valet</option> <option value="Stratosphere - 2000 S Las Vegas Blvd, Las Vegas, NV">Stratosphere Main Valet</option> <option value="The Hotel - 3950 S Las Vegas Blvd, Las Vegas, NV">The Hotel Main Valet</option> <option value="The M - 12300 S Las Vegas Blvd, Henderson, NV">The M Main Valet</option> <option value="Treasure Island - 3300 S Las Vegas Blvd, Las Vegas, NV">Treasure Island Main Valet</option> <option value="Tropicana Casino - 3801 S Las Vegas Blvd, Las Vegas, NV">Tropicana Main Valet</option> <option value="Vdara - 2600 W Harmon Ave, Las Vegas, NV">Vdara P/U @ Aria Tour Bus</option> <option value="Venetian Casino - 3355 S Las Vegas Blvd, Las Vegas, NV">Venetian at Ground Transportation</option> <option value="Wynn - 3131 S Las Vegas Blvd, Las Vegas, NV">Wynn South Gate Bus</option> </select></td>
</tr>
<tr style="height: 25px;">
<td><label class="solo" for="email">Email address:</label><span class="required">*</span></td>
<td><input id="email" class="soloinput" type="text" name="email" value="" /></td>
</tr>
<tr style="height: 25px;">
<td><label class="solo" for="phone">Phone number:*</label></td>
<td><input id="phone" class="soloinput" type="text" name="phone" value="" /></td>
</tr>
<tr style="height: 75px;">
<td><label class="solo" for="requests">Message:</label><span class="required">*</span></td>
<td><textarea id="message" class="soloinput" style="height: 50px;" name="requests"></textarea></td>
</tr>
<tr>
<td colspan="2"><input type="hidden" name="calendar" value="court1" readonly /> <input type="hidden" name="calendarname" value="court1" readonly /> <input class="slider-button" style="float: right; width: 100%; border: 0; height: 35px;" name="submit" value="Pick A Time!" type="button" id="submit"/></td>
</tr>
</tbody>
</table>
</fieldset>
	</div><!--end main -->
	
</div><!-- end container -->
</form>
</body>
</html>
