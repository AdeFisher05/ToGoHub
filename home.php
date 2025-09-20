<?php
require './header.php';
?>
<section class="Hero" id="hero">
      <div class="heroContainer">
        <div class="frame">
          <img src="./images/Hero.jpg" alt="" />
        </div>
        <div class="panel">
          <div class="integration">
            <h3>Integration</h3>
            <p>
              Onboarding mainstream transportation into the digital age has
              never been simpler. <br />ToGoHub seamlessly integrates all types
              of public commercial vehicles — and even private vehicle owners
              who want to earn from the transport business. No bottlenecks. No
              bureaucracy. Just instant access to smarter, cashless operations.
            </p>
          </div>
          <div class="PayGo">
            <h3>PayGo</h3>
            <p>
              Pay instantly on the go with PayGo — whether by wallet, card,
              ticket, or USSD. <br />
              Fast, easy, and convenient for every trip.
            </p>
          </div>
          <div class="track">
            <h3>Track & Plan</h3>
            <p>
              With ToGoHub, tracking your trips and managing your transport
              spending is simple — all from one easy-to-use account.
            </p>
          </div>
        </div>
        <div class="panel">
          <div class="cashless">
            <h3>Cashless & Contactless</h3>
            <p>
              ToGoHub is an automated fare collection platform designed for both
              transport operators and commuters, fully digitizing the payment
              process end-to-end. <br />
              It drives Nigeria’s shift toward a cashless economy while
              promoting financial inclusiveness, removing friction, and
              unlocking new value-added services for all stakeholders.
            </p>
          </div>
          <div class="pas">
            <h3>PAS</h3>
            <p>
              Our Pay-After-Service (PAS) feature lets you book a ride, enjoy
              the service, and settle payment only after your trip — simple,
              flexible, and rider-friendly.
            </p>
          </div>
          <div class="traveler">
            <h3>Great Deal for Commuter</h3>
            <p>
              No more queues, no more disputes between passengers and
              conductors. <br />
              With ToGoHub, travelers enjoy seamless rides and earn instant
              rebates on every trip
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="ridePay" id="ridePay" aria-labelledby="ridePayment">
      <div>
        <h2>PayGo</h2>
        <h3 id="ridePayment">Pay for Ride</h3>
        <form action="" id="fareForm">
          <div class="container grid">
            <div>
              <input
                type="text"
                name="vehicleNum"
                id="vehicleNum"
                placeholder="Vehicle Registration Number"
              />
            </div>
            <div>
              <input
                type="text"
                name="BoardLoc"
                id="BoardLoc"
                placeholder="Boarding from? Name of Park/Bus-stop"
              />
            </div>
            <div>
              <input
                type="text"
                name="dropLoc"
                id="dropLoc"
                placeholder="Drop at? Name of Park/Bus-stop"
              />
            </div>
            <div>
              <select name="fareType" id="fareType">
                <option value="opt1" selected disabled>
                  Select Trip Type
                </option>
                <option value="opt2">Intra State</option>
                <option value="opt3">Inter State</option>
              </select>
            </div>
            <div>
              <input
                type="text"
                name="fareAmt"
                id="fareAmt"
                placeholder="Fare Amount"
              />
            </div>
            <div>
              <select name="payMeans" id="payMeans">
                <option value="opt1" selected disabled>Means of Payment</option>
                <option value="opt2">Wallet</option>
                <option value="opt3">Card</option>
                <option value="opt4">Ticket</option>
              </select>
            </div>
          </div>
          <div>
            <input type="submit" value="Make Payment" />
          </div>
        </form>
      </div>
    </section>

    <section class="tabs" id="tabs" aria-labelledby="tabsTitle">
      <div class="container">
        <div class="tab-bar" role="tablist" aria-label="Service tabs">
          <button
            class="tab-btn"
            role="tab"
            aria-selected="true"
            aria-controls="tab1"
            id="t1"
          >
            Pay for Ride
          </button>
          <button
            class="tab-btn"
            role="tab"
            aria-selected="false"
            aria-controls="tab2"
            id="t2"
          > 
            Hire Ride
          </button>
          <button
            class="tab-btn"
            role="tab"
            aria-selected="false"
            aria-controls="tab3"
            id="t3"
          >
            Pay for Load
          </button>
          <button
            class="tab-btn"
            role="tab"
            aria-selected="false"
            aria-controls="tab4"
            id="t4"
          >
            Pay2Park
          </button>
          <button
            class="tab-btn"
            role="tab"
            aria-selected="false"
            aria-controls="tab5"
            id="t5"
          >
            Get a Shop
          </button>
        </div>

        <div
          id="tab1"
          class="tab-panel active"
          role="tabpanel"
          aria-labelledby="t1"
        >
          <div class="grid">
            <div class="thumb">
              <img src="images/bike.jpg" alt="Bike" /><a class="view" href="./pay#bike"
                >View more</a
              >
            </div>
            <div class="thumb">
              <img src="images/tricycle.jpeg" alt="Tricycle" /><a
                class="view"
                href="./pay#tricycle"
                >View more</a
              >
            </div>
            <div class="thumb">
              <img src="images/car.jpeg" alt="Car" /><a class="view" href="./pay#car"
                >View more</a
              >
            </div>
            <div class="thumb">
              <img src="images/highlander.jpeg" alt="Highlander" /><a
                class="view"
                href="./pay#highlander"
                >View more</a
              >
            </div>
            <div class="thumb">
              <img src="images/pickup.jpg" alt="Pickup" /><a
                class="view"
                href="./pay#pickup"
                >View more</a
              >
            </div>
            <div class="thumb">
              <img src="images/haice.jpeg" alt="Haice" /><a
                class="view"
                href="./pay#bus"
                >View more</a
              >
            </div>
            <div class="thumb">
              <img src="images/truck.jpg" alt="Truck" /><a class="view" href="./pay#truck"
                >View more</a
              >
            </div>
            <div class="thumb">
              <img src="images/coaster.png" alt="Coaster" /><a
                class="view"
                href="./pay#coaster"
                >View more</a
              >
            </div>
            <div class="thumb">
              <img src="images/luxurious.jpg" alt="Luxurious" /><a
                class="view"
                href="./pay#luxurious"
                >View more</a
              >
            </div>
            <div class="thumb">
              <img src="images/train.webp" alt="Train" /><a
                class="view"
                href="./pay#train"
                >View more</a
              >
            </div>
            <div class="thumb">
              <img src="images/boat.jpeg" alt="Boat" /><a class="view" href="./pay#boat"
                >View more</a
              >
            </div>
            <div class="thumb">
              <img src="images/tipper.jpg" alt="Tipper" /><a
                class="view"
                href="./pay#tipper"
                >View more</a
              >
            </div>
          </div>
        </div>

        <div id="tab2" class="tab-panel" role="tabpanel" aria-labelledby="t2">
          <div class="grid">
            <div class="thumb">
              <img src="images/bike.jpg" alt="Bike" /><a class="view" href="#"
                >View more</a
              >
            </div>
            <div class="thumb">
              <img src="images/tricycle.jpeg" alt="Tricycle" /><a
                class="view"
                href="#"
                >View more</a
              >
            </div>
            <div class="thumb">
              <img src="images/car.jpeg" alt="Car" /><a class="view" href="#"
                >View more</a
              >
            </div>
            <div class="thumb">
              <img src="images/highlander.jpeg" alt="Highlander" /><a
                class="view"
                href="#"
                >View more</a
              >
            </div>
            <div class="thumb">
              <img src="images/pickup.jpg" alt="Pickup" /><a
                class="view"
                href="#"
                >View more</a
              >
            </div>
            <div class="thumb">
              <img src="images/haice.jpeg" alt="Haice" /><a
                class="view"
                href="#"
                >View more</a
              >
            </div>
            <div class="thumb">
              <img src="images/truck.jpg" alt="Truck" /><a class="view" href="#"
                >View more</a
              >
            </div>
            <div class="thumb">
              <img src="images/coaster.png" alt="Coaster" /><a
                class="view"
                href="#"
                >View more</a
              >
            </div>
            <div class="thumb">
              <img src="images/luxurious.jpg" alt="Luxurious" /><a
                class="view"
                href="#"
                >View more</a
              >
            </div>
            <div class="thumb">
              <img src="images/train.webp" alt="Train" /><a
                class="view"
                href="#"
                >View more</a
              >
            </div>
            <div class="thumb">
              <img src="images/boat.jpeg" alt="Boat" /><a class="view" href="#"
                >View more</a
              >
            </div>
            <div class="thumb">
              <img src="images/tipper.jpg" alt="Tipper" /><a
                class="view"
                href="#"
                >View more</a
              >
            </div>
          </div>
        </div>

        <div id="tab3" class="tab-panel" role="tabpanel" aria-labelledby="t3">
          <div class="grid">
            <div class="thumb">
              <img src="images/bike.jpg" alt="Bike" /><a class="view" href="#"
                >View more</a
              >
            </div>
            <div class="thumb">
              <img src="images/tricycle.jpeg" alt="Tricycle" /><a
                class="view"
                href="#"
                >View more</a
              >
            </div>
            <div class="thumb">
              <img src="images/car.jpeg" alt="Car" /><a class="view" href="#"
                >View more</a
              >
            </div>
            <div class="thumb">
              <img src="images/highlander.jpeg" alt="Highlander" /><a
                class="view"
                href="#"
                >View more</a
              >
            </div>
            <div class="thumb">
              <img src="images/pickup.jpg" alt="Pickup" /><a
                class="view"
                href="#"
                >View more</a
              >
            </div>
            <div class="thumb">
              <img src="images/haice.jpeg" alt="Haice" /><a
                class="view"
                href="#"
                >View more</a
              >
            </div>
            <div class="thumb">
              <img src="images/truck.jpg" alt="Truck" /><a class="view" href="#"
                >View more</a
              >
            </div>
            <div class="thumb">
              <img src="images/coaster.png" alt="Coaster" /><a
                class="view"
                href="#"
                >View more</a
              >
            </div>
            <div class="thumb">
              <img src="images/luxurious.jpg" alt="Luxurious" /><a
                class="view"
                href="#"
                >View more</a
              >
            </div>
            <div class="thumb">
              <img src="images/train.webp" alt="Train" /><a
                class="view"
                href="#"
                >View more</a
              >
            </div>
            <div class="thumb">
              <img src="images/boat.jpeg" alt="Boat" /><a class="view" href="#"
                >View more</a
              >
            </div>
            <div class="thumb">
              <img src="images/tipper.jpg" alt="Tipper" /><a
                class="view"
                href="#"
                >View more</a
              >
            </div>
          </div>
        </div>

        <div id="tab4" class="tab-panel" role="tabpanel" aria-labelledby="t4">
          <div class="grid">
            <div class="thumb"><a class="view" href="#">View more</a></div>
            <div class="thumb"><a class="view" href="#">View more</a></div>
            <div class="thumb"><a class="view" href="#">View more</a></div>
            <div class="thumb"><a class="view" href="#">View more</a></div>
            <div class="thumb"><a class="view" href="#">View more</a></div>
            <div class="thumb"><a class="view" href="#">View more</a></div>
            <div class="thumb"><a class="view" href="#">View more</a></div>
            <div class="thumb"><a class="view" href="#">View more</a></div>
            <div class="thumb"><a class="view" href="#">View more</a></div>
            <div class="thumb"><a class="view" href="#">View more</a></div>
            <div class="thumb"><a class="view" href="#">View more</a></div>
            <div class="thumb"><a class="view" href="#">View more</a></div>
          </div>
        </div>

        <div id="tab5" class="tab-panel" role="tabpanel" aria-labelledby="t5">
          <div class="grid">
            <div class="thumb"><a class="view" href="#">View more</a></div>
            <div class="thumb"><a class="view" href="#">View more</a></div>
            <div class="thumb"><a class="view" href="#">View more</a></div>
            <div class="thumb"><a class="view" href="#">View more</a></div>
            <div class="thumb"><a class="view" href="#">View more</a></div>
            <div class="thumb"><a class="view" href="#">View more</a></div>
            <div class="thumb"><a class="view" href="#">View more</a></div>
            <div class="thumb"><a class="view" href="#">View more</a></div>
            <div class="thumb"><a class="view" href="#">View more</a></div>
            <div class="thumb"><a class="view" href="#">View more</a></div>
            <div class="thumb"><a class="view" href="#">View more</a></div>
            <div class="thumb"><a class="view" href="#">View more</a></div>
          </div>
        </div>
      </div>
    </section>

    <section class="shop" id="shop">
      <div class="container">
        <h3>E‑commerce</h3>
        <div class="grid">
          <div class="card product">
            <div class="img"><img src="images/menus.webp" alt="" /></div>
            <strong>Restaurants</strong
            ><span class="price">Restauants are good place to eat</span>
            <button class="btn btn-primary">Explore Menus</button>
          </div>
          <div class="card product">
            <div class="img"><img src="images/eatery.jpg" alt="" /></div>
            <strong>Eateries</strong>
            <span class="price">Need continental or local dish?</span>
            <button class="btn btn-primary">See Nearby Eateries</button>
          </div>
          <div class="card product">
            <div class="img"><img src="images/auto.webp" alt="" /></div>
            <strong>Auto Parts</strong>
            <span class="price">Experiencing sudden auto breakdown?</span>
            <button class="btn btn-primary">Shop Auto Parts</button>
          </div>
          <div class="card product">
            <div class="img"><img src="images/mecho.webp" alt="" /></div>
            <strong>Auto-Mecho</strong>
            <span class="price">Need a auto-mecho to fix your vehicle?</span>
            <button class="btn btn-primary">Book Auto Repairs</button>
          </div>
        </div>
      </div>
    </section>

    <section class="faq" id="faq">
      <div class="container">
        <h2>FAQ</h2>
        <details>
          <summary>Who can signup for eCommerce?</summary>
          <p>Yes you can</p>
        </details>
        <details>
          <summary>What do I need if I want to signup?</summary>
          <p>Yes you can</p>
        </details>
        <details>
          <summary>Is it free to signup?</summary>
          <p>Yes you can</p>
        </details>
        <details>
          <summary>How much does it cost to signup?</summary>
          <p>Yes you can</p>
        </details>
        <details>
          <summary>For how long will a subscription last?</summary>
          <p>Yes you can</p>
        </details>
        <details>
          <summary>Is it possible to subscribe for a lesser period</summary>
          <p>Yes you can</p>
        </details>
        <details>
          <summary>Can I end my subscription anytime?</summary>
          <p>Yes you can</p>
        </details>
        <details>
          <summary>
            Can I delete my eCommerce account when I no longer need it?
          </summary>
          <p>Yes you can</p>
        </details>
      </div>
    </section>

    <section class="stats" id="stats">
      <div class="container grid">
        <div class="card">
          <div>
            <div class="metric" data-count="128420">0</div>
            <div class="label">Total User Signups</div>
          </div>
          <img src="assets/icon-users.svg" alt="" />
        </div>
        <div class="card">
          <div>
            <div class="metric" data-count="34210">0</div>
            <div class="label">Total Registered Vehicles</div>
          </div>
          <img src="assets/icon-vehicle.svg" alt="" />
        </div>
        <div class="card">
          <div>
            <div class="metric" data-count="2198740">0</div>
            <div class="label">Total Passengers Served</div>
          </div>
          <img src="assets/icon-passengers.svg" alt="" />
        </div>
      </div>
    </section>
<?php
require './footer.php';
?>