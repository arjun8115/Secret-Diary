<!-- jQuery first, then Tether, then Bootstrap JS. -->
    
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  
  <script type="text/javascript">
     $(".toggleForms").click(function(){
		 
  $("#signupform").toggle();
  $("#loginform").toggle();
	 });
	 
$("#diary").on('change keyup paste', function() {
	console.log($);
      $.ajax({
  method: "POST",
  url: "updatedatabase.php",
  data: { content: $("#diary").val() }
})
.done(function(msg){
	alert("DATA saved: "+msg);
});
});
  </script>
  </body>
</html>
