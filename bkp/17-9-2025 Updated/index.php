<!DOCTYPE html>
<html lang="en">

<head>
  <title>Tour and Travel Website</title>

<?php include("header.php"); ?>


<div class="banner-home-slider">
  <div class="banner-caption">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-sm-12 col-md-5">  
          <h1 class="banner-hding_web2 pt-4">Travel Made Simple, <br><span> Memories</span> Made Lasting</h1>
          <p class="banner-prgh_web2 pt-md-3">From booking to boarding, we make every step effortless—so you can focus on creating memories that last a lifetime.</p>
        </div>
        <div class="col-sm-12 col-md-7 pe-md-0">  
          <form id="flightForm" class="flight-searc-box_web2" action="flight-search.php"  method="GET">
            <div class="row">
              <div class="col-sm-12">
                <div class="flight-search_bg_web2">
                  <div class="row">
                    <div class="col-sm-12 mb-3">
                      <div class="form-group">
                          <label><input type="radio" class="choose-trip-type" name="tripType" value="oneway" checked> One Way</label>
                          <label><input type="radio" class="choose-trip-type" name="tripType" value="roundtrip"> Round Trip</label>
                      </div>    
                    </div>
                    <div class="col-md">
                      <div class="row">
                        <div class="col-sm-6 col-md-6 pe-md-0">
                          <div class="form-group" id="citySection">
                            <label class="flight-search-lbl">Leaving From</label>
                            <input type="text" class="flight-search-field" id="fromAirport" placeholder="From" required>
                            <input type="hidden" id="fromAirportCode" name="origin" value="">
                             <input type="hidden" id="fromAirportName" name="origin_name" value="">
                          </div> 
                        </div>
                        <div class="col-sm-6 col-md-6 ps-md-0">
                          <div class="form-group" id="citySection">
                            <label class="flight-search-lbl">Going To</label>
                            <input type="text" class="flight-search-field" id="toAirport" placeholder="To" required>
                            <input type="hidden" id="toAirportCode" name="destination" value=""> 
                            <input type="hidden" id="toAirportName" name="destination_name" value>
                          </div>
                        </div>    
                      </div>
                    </div>
                    
                    <div class="col-sm-6 col-md-2 pe-md-0">
                      <div class="form-group">
                         <label class="flight-search-lbl">Departure</label>
                          <input type="text" class="flight-search-field field-radius-0_web2" id="departDate" name="departure_date" placeholder="Date" required>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-2 ps-md-0">
                      <div class="form-group">   
                          <label class="flight-search-lbl">Return</label> 
                          <input type="text" class="flight-search-field field-radius-0_web2" name="return_date" id="returnDate" placeholder="Date">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-8 mb-3">
                      <div class="form-group">
                        <label class="flight-search-lbl">Passenger & Class</label>
                        <div class="flight-search-field" id="passengerClassDisplay">1 Adult - Economy</div>
                        <input type="hidden" name="passenger" id="passenger" value="1 Adult - Economy"> 

                        <div class="dropdown-panel" id="passengerDropdown">
                          <div class="traveller-row_web2">
                              <input type="hidden" name="adults" id="adults" value="1">
                              <span>Adults <span>(12y +)</span></span>
                              <div>
                                  <button type="button" class="count-btn" onclick="changeCount('adult', -1)">-</button>
                                  <span class="passenger-count-output" id="adultCount">1</span>
                                  <button type="button" class="count-btn" onclick="changeCount('adult', 1)">+</button>
                              </div>
                          </div>
                          <div class="traveller-row_web2">
                              <input type="hidden" name="children" id="children" value="0">
                              <span>Children <span>(2y - 12y)</span></span>
                              <div>
                                  <button type="button" class="count-btn" onclick="changeCount('child', -1)">-</button>
                                  <span class="passenger-count-output" id="childCount">0</span>
                                  <button type="button" class="count-btn" onclick="changeCount('child', 1)">+</button>
                              </div>
                          </div>
                          <div class="traveller-row_web2">
                              <input type="hidden" name="infants" id="infants" value="0">
                              <span>Infants <span>(Below 2y)</span></span>
                              <div>
                                  <button type="button" class="count-btn" onclick="changeCount('infant', -1)">-</button>
                                  <span class="passenger-count-output" id="infantCount">0</span>
                                  <button type="button" class="count-btn" onclick="changeCount('infant', 1)">+</button>
                              </div>
                          </div>

                          <div class="form-group mt-3">
                              <label class="travel-class-lbl">Choose Travel Class</label>
                              <select class="form-control" id="travelClass">
                                  <option value="Economy">Economy</option>
                                  <option value="Business">Business</option>
                                  <option value="First">First Class</option>
                              </select>
                              <input type="hidden" name="travel_class" id="cabin_class" value="ECONOMY">
                          </div>

                          <div class="mt-3 text-end">
                              <button type="button" class="btn btn-success btn-sm" onclick="confirmPassengers()">Confirm</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                      <div class="d-flex justify-content-md-center">
                        <button type="submit" name="submit" class="wrap-comman-btn w-100"><i class="fa-solid fa-magnifying-glass"></i> Search Flights</button>
                      </div>  
                    </div>
                  </div>
                </div>
              </div>  
            </div>
          </form>

          <script>
              tripTypeRadios.forEach(radio => {
                  radio.addEventListener('change', () => {
                      if (radio.value === 'roundtrip') {
                          returnDateInput.readOnly = false; 
                      } else {
                          returnDateInput.readOnly = true;  
                          returnDateInput.value = '';       
                      }
                  });
              });

              // Initial state
              if (document.querySelector('input[name="tripType"]:checked').value !== 'roundtrip') {
                  returnDateInput.readOnly = true;
              }
              
          </script>
        </div>
      </div>
    </div>
  </div>
    
</div>



<section class="py-5 mt-md-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-sm-12 col-md-6">
        <div class="row">
          <div class="col-md-6 mb-3">
            <div class="box-shadow_web2 h-100">
              <div class="d-flex align-items-start">         
                <div class="why-book-icon me-3">
                  <i class="fa-solid fa-plane-departure"></i>
                </div>
                <div class="feature-content">
                  <h6 class="wrap_subhding_web2 pb-2">Instant Booking</h6>
                  <p class="wrap_prgh_web2">Confirm your flight tickets within minutes with a smooth, user-friendly booking process.</p>
                </div>
              </div>
            </div>    
          </div>
          <div class="col-md-6 mb-3">
            <div class="box-shadow_web2 h-100">
              <div class="d-flex align-items-start">         
                <div class="why-book-icon me-3">
                  <i class="fa-solid fa-money-bill"></i>
                </div>
                <div class="feature-content">
                  <h6 class="wrap_subhding_web2 pb-2">Best Price Guarantee</h6>
                  <p class="wrap_prgh_web2">Compare fares across airlines and grab the most affordable deals in real time.</p>
                </div>
              </div>
            </div>    
          </div>
          <div class="col-md-6 mb-3">
            <div class="box-shadow_web2 h-100">
              <div class="d-flex align-items-start">         
                <div class="why-book-icon me-3">
                  <i class="fa-solid fa-credit-card"></i>
                </div>
                <div class="feature-content">
                  <h6 class="wrap_subhding_web2 pb-2">Secure Payments</h6>
                  <p class="wrap_prgh_web2">Enjoy safe and reliable payment options with full transparency and no hidden charges.</p>
                </div>
              </div>
            </div>    
          </div>
          <div class="col-md-6 mb-3">
            <div class="box-shadow_web2 h-100">
              <div class="d-flex align-items-start">         
                <div class="why-book-icon me-3">
                  <i class="fa-solid fa-calendar-days"></i>
                </div>
                <div class="feature-content">
                  <h6 class="wrap_subhding_web2 pb-2">24/7 Accessibility</h6>
                  <p class="wrap_prgh_web2">Book anytime, anywhere—our portal is always available to fit your schedule.</p>
                </div>
              </div>
            </div>    
          </div>
        </div>
        
      </div>
      <div class="col-sm-12 col-md-6">
        <div class="mb-4 ps-md-4">
          <h2 class="wrap_hding_web2 pb-3 pt-3 pt-md-0">Why book with Us</h2>
          <p class="wrap_prgh_web2 pb-md-0">
            Booking flights on our self-portal is fast, secure, and designed for your convenience. Compare fares from multiple airlines in real time, choose the best option for your budget, and confirm your ticket instantly—without waiting on agents or long calls. With transparent pricing, easy payment options, and 24/7 accessibility, you stay in full control of your travel plans. Whether it’s a last-minute trip or a planned vacation, our portal makes flight booking simple, reliable, and stress-free.
          </p>
        </div>  
      </div>
      
      
    </div>
  </div>
</section>

<section class="container pt-4 pb-5">
  <div class="row align-items-center">
    
    <div class="col-md-6">
      <div class="position-relative pb-5">
        <h2 class="wrap_hding_web2 pb-2">Explore Top Destinations Today</h2>
        <p class="wrap_prgh_web2">Discover the world’s most popular destinations and create memories that last a lifetime. From bustling cities to serene getaways, we bring you curated travel experiences that suit every style and budget. Start your journey today and explore new horizons with ease and comfort.<br><br> Make your travel dreams come true with exclusive deals crafted for every explorer. Whether you crave stunning landscapes, lively city escapes, or peaceful retreats, now is the perfect time to plan your journey. With limited-time offers and unmatched discounts, your next adventure is just a booking away. Get ready to pack your bags and create memories that will last forever!  </p>
        <a href="tel:<?php echo $phone_number_web2; ?>" class="wrap-comman-btn mt-4">Call Now For Booking</a>
        <img src="images/shape.png" alt="" class="w-50">
      </div>  
    </div>
    <div class="col-md-6">
      <img src="images/about-us.jpg" alt="" class="img-fluid img_radius_web2 mb-4">
    </div>
  </div>
</section>

<section class="pb-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="wrap_hding_web2 pb-2">Book Your Dream Journey</h2>
        <p class="wrap_prgh_web2 pb-5">Choose from countless destinations, compare the best fares, and make your travel dreams a reality—all in just a few clicks.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-6 col-sm-4 col-md-4 col-lg-4">
        <div class="desti-bg_web2">
          <div class="desti-img_web2">
            <img src="images/new-york-city.jpg" alt="">
          </div>
          <h3 class="wrap_subhding_web2 text-white text-center">New York, USA</h3>
          <p class="wrap_prgh_web2 text-center">John F. Kennedy International Airport</p>
        </div>  
      </div>
      <div class="col-6 col-sm-4 col-md-4 col-lg-4">
        <div class="desti-bg_web2">
          <div class="desti-img_web2">
            <img src="images/london.jpg" alt="">
          </div>
          <h3 class="wrap_subhding_web2 text-white text-center">London, UK</h3>
          <p class="wrap_prgh_web2 text-center">Heathrow Airport (LHR)</p>
        </div>  
      </div>
      <div class="col-6 col-sm-4 col-md-4 col-lg-4">
        <div class="desti-bg_web2">
          <div class="desti-img_web2">
            <img src="images/paris.jpg" alt="">
          </div>
          <h3 class="wrap_subhding_web2 text-white text-center">Paris, France</h3>
          <p class="wrap_prgh_web2 text-center">Charles de Gaulle Airport (CDG)</p>
        </div>  
      </div>
      <div class="col-6 col-sm-4 col-md-4 col-lg-4">
        <div class="desti-bg_web2">
          <div class="desti-img_web2">
            <img src="images/dubai.jpg" alt="">
          </div>
          <h3 class="wrap_subhding_web2 text-white text-center">Dubai, UAE</h3>
          <p class="wrap_prgh_web2 text-center">Dubai International Airport (DXB)</p>
        </div>  
      </div>
      <div class="col-6 col-sm-4 col-md-4 col-lg-4">
        <div class="desti-bg_web2">
          <div class="desti-img_web2">
            <img src="images/singapore.jpg" alt="">
          </div>
          <h3 class="wrap_subhding_web2 text-white text-center">Singapore</h3>
          <p class="wrap_prgh_web2 text-center">Changi Airport (SIN)</p>
        </div>  
      </div>
      <div class="col-6 col-sm-4 col-md-4 col-lg-4">
        <div class="desti-bg_web2">
          <div class="desti-img_web2">
            <img src="images/tokyo.jpg" alt="">
          </div>
          <h3 class="wrap_subhding_web2 text-white text-center">Tokyo, Japan</h3>
          <p class="wrap_prgh_web2 text-center">Haneda Airport (HND)</p>
        </div>  
      </div>
      <div class="col-6 col-sm-4 col-md-4 col-lg-4">
        <div class="desti-bg_web2">
          <div class="desti-img_web2">
            <img src="images/bangkok.jpg" alt="">
          </div>
          <h3 class="wrap_subhding_web2 text-white text-center">Bangkok, Thailand</h3>
          <p class="wrap_prgh_web2 text-center">Suvarnabhumi Airport (BKK)</p>
        </div>  
      </div>
      <div class="col-6 col-sm-4 col-md-4 col-lg-4">
        <div class="desti-bg_web2">
          <div class="desti-img_web2">
            <img src="images/sydney.jpg" alt="">
          </div>
          <h3 class="wrap_subhding_web2 text-white text-center">Sydney, Australia</h3>
          <p class="wrap_prgh_web2 text-center">Kingsford Smith Airport (SYD)</p>
        </div>  
      </div>
      <div class="col-6 col-sm-4 col-md-4 col-lg-4">
        <div class="desti-bg_web2">
          <div class="desti-img_web2">
            <img src="images/toronto.jpg" alt="">
          </div>
          <h3 class="wrap_subhding_web2 text-white text-center">Toronto, Canada</h3>
          <p class="wrap_prgh_web2 text-center">Pearson International Airport (YYZ)</p>
        </div>  
      </div>
    </div>
  </div>
</section>



<section class="bg-light py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12 pb-5">
        <h2 class="wrap_hding_web2 text-center pb-2">Unbeatable Prices on Favorite Routes</h2>
        <p class="wrap_prgh_web2 text-center">Fly your favorite routes at unbeatable prices—save more on every journey!</p>
      </div>
    </div>
    <div class="row" id="flight-offer-cards-container">
    </div>
  </div>
</section>





<section class="py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-12">
        <h2 class="wrap_hding_web2 text-center pb-2">Frequently Asked Questions (FAQs)</h2>
        <p class="wrap_prgh_web2 text-center pb-5">Find quick answers to the most common questions about flight booking, payments, cancellations, and more.</p>
      </div>
      <div class="col-md-6">
        <img src="images/faq.jpg" alt="faq" class="img-fluid">
      </div>
      <div class="col-md-6">
        
        <div class="accordion accordion-flush" id="accordionFlushExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                How do I search and book a flight on your website?
              </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">You can easily search by entering your departure city, destination, travel dates, and passenger details in the search form. Browse the available flights, choose the one that suits you, and follow the simple booking steps to confirm.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                Can I book one-way and round-trip flights?
              </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Yes! Our system allows you to book one-way and round-trip journeys depending on your travel plans.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                How do I know my flight booking is confirmed?
              </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">After completing your payment, a confirmation email with your e-ticket and booking reference number (PNR) will be sent to your registered email address.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingFour">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                What payment methods are accepted for flight bookings?
              </button>
            </h2>
            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">We accept major credit/debit cards for secure online payment options.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingFive">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                Can I modify or cancel my flight after booking?
              </button>
            </h2>
            <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Yes, most airlines allow changes or cancellations, but charges may apply depending on the airline’s policy.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingSix">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                Will I receive an e-ticket after booking a flight?
              </button>
            </h2>
            <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Yes, once your booking is confirmed, you will receive an e-ticket with all your flight details.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingSeven">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven">
                Are there any additional charges for baggage?
              </button>
            </h2>
            <div id="flush-collapseSeven" class="accordion-collapse collapse" aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">Baggage allowance depends on the airline and fare type. Some airlines include free check-in baggage, while others may charge extra. Details will be shown before you confirm your booking.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingEight">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseEight" aria-expanded="false" aria-controls="flush-collapseEight">
                What documents are required at the airport?
              </button>
            </h2>
            <div id="flush-collapseEight" class="accordion-collapse collapse" aria-labelledby="flush-headingEight" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">You must carry a valid government-issued photo ID (passport for international travel) and your e-ticket/boarding pass.</div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</section>
  
<section class="pb-5 pt-md-4 mb-5">
  <div class="container ">
    <div class="row justify-content-center">
      <div class="col-sm-12 col-md-9 position-relative">
        <div class="cta-bg">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="cta-textarea">
                <h1 class="wrap_hding_web2 text-center">
                  Best deals and <span>discounts</span> for flight reservations
                </h1>
                <p class="wrap_prgh_web2 pt-3 text-center">Grab the best flight deals and exclusive discounts—your next adventure is just a click away!</p>
                <h1 class="wrap_hding_web2 text-center">
                  Call @ <span><?php echo $phone_number_web2; ?></span>
              </h1>
              </div>  
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include("footer.php"); ?>


<!-- Flight Price offer card api -->

<script>
  const container = document.getElementById("flight-offer-cards-container");

  // Show loader before fetch
  container.innerHTML = `<div id="loader" style="text-align:center; padding:20px;" class="d-flex justify-content-center gap-3 align-items-center">
    <i class="fa fa-spinner fa-spin fa-2x"></i> Loading flights...
  </div>`;

  // Get today's date + 7 days
  let today = new Date();
  today.setDate(today.getDate() + 7); // 7 days ahead

  let year = today.getFullYear();
  let month = String(today.getMonth() + 1).padStart(2, "0");
  let day = String(today.getDate()).padStart(2, "0");

  let futureDate = `${year}-${month}-${day}`;

  // Fetch with dynamic future date
  fetch(`get-flight-offers.php?origin=NYC&destination=LON&date=${futureDate}&adults=1`)
    .then(res => res.json())
    .then(data => {
      console.log("API Response:", data); // Debugging
      container.innerHTML = ""; // clear loader

      if (!data.data || data.data.length === 0) {
        container.innerHTML = `<p style="text-align:center; padding:20px;">❌ No flights found for your search.</p>`;
        return;
      }

      let cardLimit = 9;
      data.data.slice(0, cardLimit).forEach(flight => {
        let segment = flight.itineraries[0].segments[0];
        let lastSegment = flight.itineraries[0].segments.slice(-1)[0];

        let originCode = segment.departure.iataCode;
        let destinationCode = lastSegment.arrival.iataCode;

        let departureDate = new Date(segment.departure.at).toLocaleDateString();
        let departureTime = new Date(segment.departure.at).toLocaleTimeString([], { hour: "2-digit", minute: "2-digit" });

        let arrivalDate = new Date(lastSegment.arrival.at).toLocaleDateString();
        let arrivalTime = new Date(lastSegment.arrival.at).toLocaleTimeString([], { hour: "2-digit", minute: "2-digit" });

        let departureTerminal = segment.departure.terminal || "—";
        let arrivalTerminal = lastSegment.arrival.terminal || "—";

        let carrier = segment.carrierCode;
        let flightNumber = segment.number;

        let duration = flight.itineraries[0].duration
          .replace("PT", "")
          .replace("H", "h ")
          .replace("M", "m")
          .toLowerCase()
          .trim();

        let price = flight.price.total;

        let logoUrl = `https://static.tripcdn.com/packages/flight/airline-logo/latest/airline_logo/3x/${carrier.toLowerCase()}.webp`;

        container.innerHTML += `
          <div class="col-md-4">
            <div class="disc_card">
              <div class="d-flex justify-content-between mb-2">
                <h2 class="wrap_subhding_web2 pt-0 text-primary">$${price}</h2>
                <a href="booking.php?offerId=${flight.id}&adults=1&children=0&infants=0" class="disc_btn">Book Now</a>
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="flight_route_web2">${originCode}</h4>
                  <ul class="disc-flight_details_web2">
                    <li><i class="fa-solid fa-calendar-days"></i> ${departureDate}</li>
                    <li><i class="fa-solid fa-clock"></i> ${departureTime}</li>
                    <li><i class="fa-solid fa-archway"></i> Terminal: ${departureTerminal}</li>
                  </ul>
                </div>
                <div>
                  <img src="images/airplane.png" class="disc_route_img">
                  <p class="disc-flight_num_web2 pt-1">${duration}</p>
                </div>  
                <div>
                  <h4 class="flight_route_web2">${destinationCode}</h4>
                  <ul class="disc-flight_details_web2">
                    <li><i class="fa-solid fa-calendar-days"></i> ${arrivalDate}</li>
                    <li><i class="fa-solid fa-clock"></i> ${arrivalTime}</li>
                    <li><i class="fa-solid fa-archway"></i> Terminal: ${arrivalTerminal}</li>
                  </ul>
                </div>
              </div>
              <img src="${logoUrl}" alt="${carrier}" class="disc_flight_logo">
              <p class="disc-flight_num_web2">${carrier} ${flightNumber}</p>
            </div>
          </div>
        `;
      });
    })
    .catch(err => {
      console.error("❌ Fetch error:", err);
      container.innerHTML = `<p style="text-align:center; padding:20px; color:red;">⚠️ Failed to load flights. Please try again later.</p>`;
    });
</script>




<!-- show total passenger value and fetch value in another page  -->
<script>
  const displayBox = document.getElementById('passengerClassDisplay');
  const dropdownPanel = document.getElementById('passengerDropdown');
  const counts = { adult: 1, child: 0, infant: 0 };

  // Toggle dropdown
  displayBox.addEventListener('click', () => {
      dropdownPanel.style.display = dropdownPanel.style.display === 'block' ? 'none' : 'block';
  });

  // Update count
  function changeCount(type, delta) {
      if (counts[type] + delta >= 0) {
          counts[type] += delta;
          document.getElementById(type + 'Count').textContent = counts[type];
      }
  }

  // Build summary + update hidden fields
  function updateDisplay() {
      const travelClass = document.getElementById('travelClass').value;
      const totalPassengers = counts.adult + counts.child + counts.infant;
      const passengerLabel = totalPassengers === 1 ? 'Passenger' : 'Passengers';

      // Display box
      displayBox.textContent = `${totalPassengers} ${passengerLabel} - ${travelClass}`;

      // Hidden inputs
      document.getElementById('adults').value      = counts.adult;
      document.getElementById('children').value    = counts.child;
      document.getElementById('infants').value     = counts.infant;
      document.getElementById('cabin_class').value = travelClass;
      document.getElementById('passenger').value = 
          `${counts.adult} Adult${counts.adult > 1 ? 's' : ''}`
          + (counts.child > 0 ? `, ${counts.child} Child${counts.child > 1 ? 'ren' : ''}` : '')
          + (counts.infant > 0 ? `, ${counts.infant} Infant${counts.infant > 1 ? 's' : ''}` : '')
          + ` - ${travelClass}`;
  }

  // Confirm button action
  function confirmPassengers() {
      updateDisplay();
      dropdownPanel.style.display = 'none';
      buildTravellerRows();
  }

  // Build traveller rows dynamically
  function buildTravellerRows() {
      const tbody = document.querySelector("#traveller-table tbody");
      if (!tbody) return;

      tbody.innerHTML = "";
      for (let i = 1; i <= counts.adult; i++) tbody.appendChild(createTravellerRow(`Adult ${i}`));
      for (let i = 1; i <= counts.child; i++) tbody.appendChild(createTravellerRow(`Child ${i}`));
      for (let i = 1; i <= counts.infant; i++) tbody.appendChild(createTravellerRow(`Infant ${i}`));
  }

  // Create single traveller row
  function createTravellerRow(label) {
      const tr = document.createElement("tr");
      tr.innerHTML = `
          <td>${label}</td>
          <td><label>First Name</label><input type="text" name="first-name[]" required></td>
          <td><label>Middle Name</label><input type="text" name="middle-name[]"></td>
          <td><label>Last Name</label><input type="text" name="last-name[]" required></td>
          <td><label>Gender</label>
              <select name="gender[]"><option>Male</option><option>Female</option></select>
          </td>
          <td><label>DOB</label><input type="text" name="dob[]" class="dob_datepicker" required></td>
      `;
      return tr;
  }

  // Close dropdown if clicking outside
  document.addEventListener('click', function(e) {
      if (!e.target.closest('#passengerDropdown') && !e.target.closest('#passengerClassDisplay')) {
          dropdownPanel.style.display = 'none';
      }
  });

  // --- KEY FIX ---
  // Update hidden fields before any form submission
  document.querySelector("form").addEventListener("submit", function() {
      updateDisplay();
  });

document.addEventListener('DOMContentLoaded', () => {
    // Preserve initial values from hidden inputs (useful when coming back from flight-result.php)
    counts.adult = parseInt(document.getElementById('adults').value) || 1;
    counts.child = parseInt(document.getElementById('children').value) || 0;
    counts.infant = parseInt(document.getElementById('infants').value) || 0;

    // Initialize display
    updateDisplay();

    // Attach confirm button
    document.getElementById('confirmPassengerBtn').addEventListener('click', confirmPassengers);

    // Ensure form submission updates hidden fields
    document.querySelector("form").addEventListener("submit", function() {
        updateDisplay();
    });
});


</script>

<!-- Flight airport list autocomplete -->
<script>
  // 🔑 Amadeus API credentials
  const client_id = "IMewQoGGzsLuxu2vR2r9ImKFeRVNbf4m";
  const client_secret = "bLW0u8zhqigZYcaC";

  // Get Amadeus access token
  async function getAccessToken() {
   const res = await fetch("https://test.api.amadeus.com/v1/security/oauth2/token", {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      body: new URLSearchParams({
        grant_type: "client_credentials",
        client_id: client_id,
        client_secret: client_secret
      })
    });
    const data = await res.json();
    return data.access_token;
  }

  // Setup autocomplete
  function setupAutocomplete(inputId, hiddenCodeId, hiddenNameId) {
    getAccessToken().then(token => {
      $("#" + inputId).autocomplete({
        minLength: 2, // user can start typing earlier
        source: function(request, response) {
          //fetch(`https://test.api.amadeus.com/v1/reference-data/airlines?subType=AIRPORT,CITY&keyword=${request.term}&page[limit]=20`, {
          fetch(`https://test.api.amadeus.com/v1/reference-data/locations?subType=AIRPORT&keyword=${request.term}&page[limit]=20`, {
            headers: { "Authorization": "Bearer " + token }
          })
          .then(res => res.json())
          .then(data => {
            if (!data.data) return response([]);
            response(data.data.map(airport => {
              const city = airport.address?.cityName || airport.name;
              return {
                label: `${airport.name} (${airport.iataCode}) - ${city}, ${airport.address?.countryName || ""}`,
                //label: `${airport.name} (${airport.iataCode}) - ${airport.address?.cityName || ""}`,
                value: `${airport.name} (${airport.iataCode})`, // show nice text in input
                code: airport.iataCode,   // store IATA in hidden field
                name: airport.name        // store airport name in hidden field
              };
            }));
          })
          .catch(() => response([]));
        },
        select: function(event, ui) {
          $("#" + inputId).val(ui.item.value);      // show full name in input
          $("#" + hiddenCodeId).val(ui.item.code);  // save IATA code
          $("#" + hiddenNameId).val(ui.item.name);  // save airport name
          return false;
        }
      });
    });
  }

  // Apply autocomplete
  $(document).ready(function() {
    setupAutocomplete("fromAirport", "fromAirportCode", "fromAirportName");
    setupAutocomplete("toAirport", "toAirportCode", "toAirportName");
  });
</script>


<script>
  $(function() {
      // Departure date picker
      $("#departDate").datepicker({
          dateFormat: "yy-mm-dd",
          minDate: 0,
          numberOfMonths: 2,
          onSelect: function(selectedDate) {
              // Set minimum return date
              $("#returnDate").datepicker("option", "minDate", selectedDate);

              // If round trip, open the return date calendar automatically
              if ($('input[name="tripType"]:checked').val() === 'roundtrip') {
                  setTimeout(function() {
                      $("#returnDate").datepicker("show");
                  }, 200); // small delay so it feels smooth
              }
          }
      });

      // Return date picker
      $("#returnDate").datepicker({
          dateFormat: "yy-mm-dd",
          minDate: 0,
          numberOfMonths: 2
      });

      // Trip type change handling
      $('input[name="tripType"]').on('change', function() {
          if ($(this).val() === 'roundtrip') {
              $("#returnDate").prop('disabled', false);
          } else {
              $("#returnDate").prop('disabled', true).val('');
          }
      });

      // Initial disable if not round trip
      if ($('input[name="tripType"]:checked').val() !== 'roundtrip') {
          $("#returnDate").prop('disabled', true);
      }
  });

</script>
 
 

