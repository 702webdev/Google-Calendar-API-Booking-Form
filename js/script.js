/* Author: Nicholas Darley
*
* Must change where it says localhost/sendEmail.php to be where ever you put this file on your server
*
*/

var m=jQuery.noConflict();m(function(){var a=m("input#submit").parent("p");m(a).children("input").remove();m(a).append('<input type="button" name="submit" id="submit" value="Pick A Time!" />');m("#main input#submit").click(function(){m("#main").append('<img src="https://www.therange702.com/images/revolver.gif" class="loaderIcon" alt="Loading..." />');var i=m("input#firstname").val();var g=m("input#email").val();var c=m("input#phone").val();var f=m("input#startdate").val();var b=m("select#location option:selected").val();var e=m("select#passengers option:selected").val();var h=m("textarea#message").val();var d=m("input#submit").val();m.ajax({type:"post",url:"localhost/sendEmail.php",data:"title="+i+"&email="+g+"&location="+b+"&startdate="+f+"&submits="+d+"&passengers="+e+"&phone="+c+"&message="+h,success:function(j){m("#main img.loaderIcon").fadeOut(1000);m("#main").html(j)}})})});