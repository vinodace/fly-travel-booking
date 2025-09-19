<!DOCTYPE html>
<html lang="en">

<head>
  <title>Contact Us</title>

<?php include("header.php"); ?>


<section class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-4 pe-lg-0">
      <div class="contact_adrsbox_web2">
        <h2 class="wrap_hding_web2 pb-4">Get in Tourch</h2>
        <address>
          <div class="mb-3 d-flex align-items-center gap-4">
            <p class="wrap-title_web1 fa-2x mb-0 main_color_web2">
              <i class="fa-solid fa-phone-volume"></i>
            </p>
            <div>
              <h3 class="wrap_prgh_web2 fw-bold main_color_web2">Call Us</h3>
              <a href="tel:<?php echo $phone_number_web2; ?>" class="wrap_subhding_web2  d-block text-decoration-none text-dark pt-1"><?php echo $phone_number_web2; ?></a>
            </div>  
          </div>
          <div class="mb-3 d-flex align-items-center gap-4">
            <p class="wrap-title_web1 fa-2x mb-0 main_color_web2">
              <i class="fa-solid fa-envelope"></i>
            </p>
            <div>
              <h3 class="wrap_prgh_web2 fw-bold main_color_web2">Email</h3>
              <a href="maito:<?php echo $email_address_web2 ?>" class="wrap_subhding_web2  d-block text-decoration-none text-dark pt-1"><?php echo $email_address_web2 ?></a>
            </div>  
          </div>
          <div class="mb-3 d-flex align-items-center gap-4">
            <p class="wrap-title_web1 fa-2x mb-0 main_color_web2">
              <i class="fa-solid fa-building"></i>
            </p>
            <div>
              <h3 class="wrap_prgh_web2 fw-bold main_color_web2">Address</h3>
              <p class="wrap_subhding_web2  d-block text-decoration-none text-dark pt-1">
                1433 1st Ave N, Texas City, TX 77590
              </p>
            </div>  
          </div>
          
        </address>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3476.4779605941058!2d-94.91875892534806!3d29.385570975261924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x863f79b788219303%3A0x9f0bab9f4acfa081!2s1433%201st%20Ave%20N%2C%20Texas%20City%2C%20TX%2077590%2C%20USA!5e0!3m2!1sen!2sin!4v1758210504560!5m2!1sen!2sin" style="border:0; width:100%; height: 250px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
    <div class="col-lg-5 ps-lg-0">
      <div class="contact_frmbox_web2">
        <h2 class="wrap_hding_web2 pb-4">Fill your Query</h2>
        <form action="submit.php" method="post">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group mb-3">
                <label class="form_lbl_web2">Name</label>
                <input type="text" name="name" class="form_field_web2" placeholder="Enter your Name">
              </div>
              <div class="form-group mb-3">
                <label class="form_lbl_web2">Email</label>
                <input type="email" name="name" class="form_field_web2" placeholder="Enter your Email">
              </div>
              <div class="form-group mb-3">
                <label class="form_lbl_web2">Phone Number</label>
                <input type="text" name="name" class="form_field_web2" placeholder="Enter your Phone Number">
              </div>
              <div class="form-group mb-3">
                <label class="form_lbl_web2">Name</label>
                <textarea rows="4" name="message" class="form_field_web2" placeholder="Enter your Message here.."></textarea>
              </div>
              
              <!-- Cloudflare Turnstile -->
              <div class="cf-turnstile" data-sitekey="0x4AAAAAAB2DedsAPXTR2vsL"></div>
              <button type="submit" name="submit" class="wrap-comman-btn">Send Query</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>


<!-- Load Turnstile JS -->
<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>


<?php include("footer.php"); ?>


 