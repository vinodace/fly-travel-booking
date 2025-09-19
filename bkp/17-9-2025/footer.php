 
<footer id="footer">
	<div class="container">
		<div class="row justify-content-between pb-3">
			<div class="col-12 col-md-4">
				<div class="d-flex justify-content-md-center">
					<div>
						<h2 class="ftr_hding_web2">Connect With Us</h2>
						<ul class="ftr_icon_web2">
							<li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
							<li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
							<li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
							<li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
						</ul>
						<p class="ftr_text_web2 pt-2">Discover the world with comfort and convenience <br> always just a call away</p>
						<address class="ftr_address_web2 mt-2">
							<div class="d-flex align-items-center gap-3">
							 	<i class="fa-solid fa-phone-volume"></i> <?php echo $phone_number_web2; ?>
							</div> 
						</address>
					</div>
				</div>		
			</div>
			
			
			<div class="col-6 col-md-2">
				<h2 class="ftr_hding_web2">Main Links</h2>
				<ul class="ftr_list_web2">
					<li><a href="flights.php">Flights</a></li>
					<li><a href="flights-offers.php">Today's Deals</a></li>
					<li><a href="about-us.php">About Us</a></li>
					<li><a href="contact-us.php">Contact Us</a></li>
					
				</ul>
			</div>
			<div class="col-6 col-md-2">
				<h2 class="ftr_hding_web2">Other Links</h2>
				<ul class="ftr_list_web2">
					<li><a href="privacy-policy.php">Privacy Policy</a></li>
					<li><a href="terms-and-conditions.php">Terms & Conditions</a></li>
					<li><a href="canellation-and-refund-policy.php">Cancellation & Refund Policy</a></li>
				</ul>
			</div>
			<div class="col-sm-6 col-md-4">
				<div class="d-flex justify-content-md-end mt-4 mt-md-0 mt-sm-2">
					<div>
						
						<h2 class="ftr_hding_web2">Get in Touch</h2>
						<address class="ftr_address_web2">
							<div class="d-flex align-items-center gap-3 mb-3">
							 	<i class="fa-solid fa-house"></i> 3612 Windshire Dr Springfield, IL 62704, USA
							</div> 
							<div class="d-flex align-items-center gap-3 mb-3">
							 	<i class="fa-solid fa-envelope"></i> <?php echo $email_address_web2; ?>
							</div> 	
						</address>
						
					</div>
				</div>		
			</div>
			
		</div>
	</div>	
	<div class="copyright_bg_web2">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p class="copyright_web2 text-center">Copyright © <script>document.write(new Date().getFullYear())</script> <?php echo $domainurl_web2 ?>. All rights reserved</p>
				</div>
			</div>
		</div>
	</div>	
</footer>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

<!-- Add and Remove Traveller row field -->
<script>
$(document).ready(function(){
    $(".add-traveller_btn_web2").click(function(){
        $("#traveller-table").append(
            `<div class="row align-items-center">
                <div class="col-12 col-sm-12 col-md col-lg-2 mb-2"><strong>Adult <?= $i ?></strong></div>
                <div class="col-6 col-sm-2 col-md mb-2">
                    <label class="traveller-form_lbl_web2">First Name<span class="red">*</span></label>
                    <input type="text" name="first-name[]" class="form_field_web2 alphabet" placeholder="eg.John" required>
                    <div class="errmsg"></div>
                </div>
                <div class="col-6 col-sm-2 col-md mb-2">
                    <label class="traveller-form_lbl_web2">Last Name</label>
                    <input type="text" name="last-name[]" class="form_field_web2 alphabet" placeholder="eg.Williams" >
                    <div class="errmsg"></div>
                </div>
                <div class="col-6 col-sm-2 col-md mb-2">
                    <label class="traveller-form_lbl_web2">Gender<span class="red">*</span></label>
                    <select name="gender[]" class="form_field_web2">
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
                <div class="col-6 col-sm-2 col-md mb-2">
                    <label class="traveller-form_lbl_web2">DOB<span class="red">*</span></label>
                    <input type="text" name="dob[]" class="form_field_web2 dob_datepicker" placeholder="Select Date" required>
                    <input type="hidden" name="age[]" class="age_hidden">
                </div>
                <div class="col-6 col-sm-2 col-md-auto mb-2">
                  <button class="remove-traveller_tr_web2"><i class="fa-solid fa-minus"></i></button>    
                </div>
              </div>

              `
        );
    });
});

$(document).on("click", ".remove-traveller_tr_web2", function(){
    $(this).closest(".row").remove();
});

</script>

<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<script>
	$(function(){
	   // Numbers only
	   $(".number").keypress(function (e) {
	      if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
	         $(this).next(".errmsg")
	            .html("Numbers only")
	            .stop()
	            .show()
	            .fadeOut("slow");
	         return false;
	      }
	   });

	   // Alphabets only
	   $(".alphabet").keypress(function (e) {
	      // A-Z (65–90), a-z (97–122), backspace(8), space(32)
	      if (e.which != 8 && e.which != 32 && (e.which < 65 || (e.which > 90 && e.which < 97) || e.which > 122)) {
	         $(this).next(".errmsg")
	            .html("Alphabets only")
	            .stop()
	            .show()
	            .fadeOut("slow");
	         return false;
	      }
	   });
	});
</script>

</body>
</html>