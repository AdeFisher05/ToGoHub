<?php
session_start();
require './header.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>
<div class="pay container">
<h2>Pay for Ride</h2>
<form action="">
    <label for="search">Search
        <input type="search" name="search" id="search" placeholder="Search...">
    </label>
    <button class="search">Search</button>

</form>
<div class="vehicles tab-bar" role="tablist" aria-label="Service tabs">
          <button
            class="tab-btn"
            role="tab"
            aria-selected="true"
            aria-controls="tab1"
            id="bike"
          >
            Bike
          </button>
          <button
            class="tab-btn"
            role="tab"
            aria-selected="false"
            aria-controls="tab2"
            id="tricycle"
          >
            Tricycle
          </button>
          <button
            class="tab-btn"
            role="tab"
            aria-selected="false"
            aria-controls="tab3"
            id="car"
          >
            Car
          </button>
          <button
            class="tab-btn"
            role="tab"
            aria-selected="false"
            aria-controls="tab4"
            id="highlander"
          >
            SUV
          </button>
          <button
            class="tab-btn"
            role="tab"
            aria-selected="false"
            aria-controls="tab5"
            id="pickup"
          >
            Pickup
          </button>
          <button
            class="tab-btn"
            role="tab"
            aria-selected="false"
            aria-controls="tab5"
            id="bus"
          >
            Bus
          </button>
          <button
            class="tab-btn"
            role="tab"
            aria-selected="false"
            aria-controls="tab5"
            id="truck"
          >
            Truck
          </button>
          <button
            class="tab-btn"
            role="tab"
            aria-selected="false"
            aria-controls="tab5"
            id="coaster"
          >
            Coaster
          </button>
          <button
            class="tab-btn"
            role="tab"
            aria-selected="false"
            aria-controls="tab5"
            id="luxurious"
          >
            Luxurious
          </button>
          <button
            class="tab-btn"
            role="tab"
            aria-selected="false"
            aria-controls="tab5"
            id="train"
          >
            Train
          </button>
          <button
            class="tab-btn"
            role="tab"
            aria-selected="false"
            aria-controls="tab5"
            id="boat"
          >
            Boat
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
                <a class="view" href="#"
                >View more</a
              >
            </div>
            <div class="thumb">
                <a class="view" href="#"
                >View more</a
              >
            </div>
            <div class="thumb">
                <a class="view" href="#"
                >View more</a
              >
            </div>
            <div class="thumb">
                <a
                class="view"
                href="#"
                >View more</a
              >
            </div>
            <div class="thumb">
                <a
                class="view"
                href="#"
                >View more</a
              >
            </div>
            <div class="thumb">
                <a
                class="view"
                href="#"
                >View more</a
              >
            </div>
            <div class="thumb">
                <a class="view" href="#"
                >View more</a
              >
            </div>
            <div class="thumb">
                <a
                class="view"
                href="#"
                >View more</a
              >
            </div>
            <div class="thumb">
                <a
                class="view"
                href="#"
                >View more</a
              >
            </div>
</div>
</div>

</div>
<?php
require './footer.php';
?>