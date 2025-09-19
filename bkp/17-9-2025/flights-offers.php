<!DOCTYPE html>
<html lang="en">

<head>
  <title>Destination</title>

<?php include("header.php"); ?>



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
    <!-- <div class="row">  
      <div class="col-md-4">
        <div class="disc_card">
          <div class="d-flex align-items-center justify-content-between mb-2">
            <h2 class="wrap_subhding_web2 pt-0 text-primary mb-0">$243.98</h2>
            <a href="#" class="disc_btn">Book Now</a>
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h4 class="flight_route_web2">DEL</h4>
              <p class="flight_route_web2_name">New Delhi</p>
              <ul class="disc-flight_details_web2">
                <li><i class="fa-solid fa-calendar-days"></i> 9/10/2025</li>
                <li><i class="fa-solid fa-clock"></i> 11:25:00 AM</li>
                <li><i class="fa-solid fa-archway"></i> Terminal: 3</li>
              </ul>
            </div>
            <div>
              <img src="images/airplane.png" class="disc_route_img">
              <p class="disc-flight_num_web2 pt-1">13h35m</p>
            </div>  
            <div>
              <h4 class="flight_route_web2">LHR</h4>
              <p class="flight_route_web2_name">Dubai</p>
              <ul class="disc-flight_details_web2">
                <li><i class="fa-solid fa-calendar-days"></i> 9/10/2025</li>
                <li><i class="fa-solid fa-clock"></i> 8:30:00 PM</li>
                <li><i class="fa-solid fa-archway"></i> Terminal: 4</li>
              </ul>
            </div>
          </div>
          <img src="https://static.tripcdn.com/packages/flight/airline-logo/latest/airline_logo/3x/ey.webp" alt="" class="disc_flight_logo">
          <p class="disc-flight_num_web2">ETIHAD AIRWAYS (EY215)</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="disc_card">
          <div class="d-flex align-items-center justify-content-between mb-2">
            <h2 class="wrap_subhding_web2 pt-0 text-primary mb-0">$243.98</h2>
            <a href="#" class="disc_btn">Book Now</a>
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h4 class="flight_route_web2">DEL</h4>
              <p class="flight_route_web2_name">New Delhi</p>
              <ul class="disc-flight_details_web2">
                <li><i class="fa-solid fa-calendar-days"></i> 9/10/2025</li>
                <li><i class="fa-solid fa-clock"></i> 11:25:00 AM</li>
                <li><i class="fa-solid fa-archway"></i> Terminal: 3</li>
              </ul>
            </div>
            <div>
              <img src="images/airplane.png" class="disc_route_img">
              <p class="disc-flight_num_web2 pt-1">13h35m</p>
            </div>  
            <div>
              <h4 class="flight_route_web2">LHR</h4>
              <p class="flight_route_web2_name">Dubai</p>
              <ul class="disc-flight_details_web2">
                <li><i class="fa-solid fa-calendar-days"></i> 9/10/2025</li>
                <li><i class="fa-solid fa-clock"></i> 8:30:00 PM</li>
                <li><i class="fa-solid fa-archway"></i> Terminal: 4</li>
              </ul>
            </div>
          </div>
          <img src="https://static.tripcdn.com/packages/flight/airline-logo/latest/airline_logo/3x/ey.webp" alt="" class="disc_flight_logo">
          <p class="disc-flight_num_web2">ETIHAD AIRWAYS (EY215)</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="disc_card">
          <div class="d-flex align-items-center justify-content-between mb-2">
            <h2 class="wrap_subhding_web2 pt-0 text-primary mb-0">$243.98</h2>
            <a href="#" class="disc_btn">Book Now</a>
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h4 class="flight_route_web2">DEL</h4>
              <p class="flight_route_web2_name">New Delhi</p>
              <ul class="disc-flight_details_web2">
                <li><i class="fa-solid fa-calendar-days"></i> 9/10/2025</li>
                <li><i class="fa-solid fa-clock"></i> 11:25:00 AM</li>
                <li><i class="fa-solid fa-archway"></i> Terminal: 3</li>
              </ul>
            </div>
            <div>
              <img src="images/airplane.png" class="disc_route_img">
              <p class="disc-flight_num_web2 pt-1">13h35m</p>
            </div>  
            <div>
              <h4 class="flight_route_web2">LHR</h4>
              <p class="flight_route_web2_name">Dubai</p>
              <ul class="disc-flight_details_web2">
                <li><i class="fa-solid fa-calendar-days"></i> 9/10/2025</li>
                <li><i class="fa-solid fa-clock"></i> 8:30:00 PM</li>
                <li><i class="fa-solid fa-archway"></i> Terminal: 4</li>
              </ul>
            </div>
          </div>
          <img src="https://static.tripcdn.com/packages/flight/airline-logo/latest/airline_logo/3x/ey.webp" alt="" class="disc_flight_logo">
          <p class="disc-flight_num_web2">ETIHAD AIRWAYS (EY215)</p>
        </div>
      </div>
    </div> -->
  </div>
</section>

<script>
  const container = document.getElementById("flight-offer-cards-container");

  // Show loader before fetch
  container.innerHTML = `<div id="loader" style="text-align:center; padding:20px;" class="d-flex justify-content-center gap-3 align-items-center">
    <i class="fa fa-spinner fa-spin fa-2x"></i> Loading flights...
  </div>`;

  fetch("get-flight-offers.php?origin=NYC&destination=LON&date=2025-10-05&adults=1")
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

<?php include("footer.php"); ?>


 