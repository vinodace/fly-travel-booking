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
                3612 Windshire Dr Springfield, IL 62704, USA
              </p>
            </div>  
          </div>
          
        </address>
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3067.660642795187!2d-89.6963805247957!3d39.74727317155502!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x887538a451072499%3A0x43c04ed97b0ae4d1!2s3612%20Windshire%20Dr%2C%20Springfield%2C%20IL%2062704%2C%20USA!5e0!3m2!1sen!2sin!4v1754925521618!5m2!1sen!2sin" style="border:0; width:100%; height: 250px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
    <div class="col-lg-5 ps-lg-0">
      <div class="contact_frmbox_web2">
        <h2 class="wrap_hding_web2 pb-4">Fill your Query</h2>
        <form action="" method="post">
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
              <button type="submit" name="submit" class="wrap-comman-btn">Send Query</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>



<?php include("footer.php"); ?>


 