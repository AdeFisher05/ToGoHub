<?php
session_start();
require './header.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<div class="container hire">
    
    <h2>Hire A Ride</h2>
    <p>Hire a ride now and have the driver pick you at your specified location.
        Fill the form below to make request and get response in a flash!
    </p>
    <div>
        <form action="" method="post">
            <div>
            <div>
           <label for="name">Name 
            <input type="text" name="name" id="name" disabled>
           </label>
           </div>
           <div>
           <label for="userid">User ID 
            <input type="text" name="userid" id="userid" disabled>
           </label>
           </div>
           <div>
           <label for="vehicle">Vehicle type
            <select name="vehicle" id="vehicle">
                <option value="opt1" selected disabled>Select one...</option>
                <option value="opt 2">Bike (Okada)</option>
                <option value="opt 3">Tricycle</option>
                <option value="opt 4">Car</option>
                <option value="opt 5">SUV</option>
                <option value="opt 6">Haice Bus</option>
                <option value="opt 7">Truck</option>
                <option value="opt 8">Coaster</option>
                <option value="opt 9">Luxury Bus</option>
                <option value="opt 10">Tipper/Lorry</option>
                <option value="opt 11">Trailer</option>
                <option value="opt 12">Train</option>
                <option value="opt 13">Boat</option>
            </select>
           </label>
           </div>
           <div>
           <label for="veh-reg">Vehicle Registration Number
            <input type="text" name="veh-reg" id="veh-reg">
           </label>
           </div>
           <div>
           <label for="states">State
            <select name="state" id="state">
                <option value="opt 1" selected disabled>Select one...</option>
                <option value="opt 2">Abia</option>
                <option value="opt 3">Adamawa</option>
                <option value="opt 4">Akwa Ibom</option>
                <option value="opt 5">Anambra</option>
                <option value="opt 6">Bauchi</option>
                <option value="opt 7">Bayelsa</option>
                <option value="opt 8">Benue</option>
                <option value="opt 9">Borno</option>
                <option value="opt 10">Cross River</option>
                <option value="opt 11">Delta</option>
                <option value="opt 12">Ebonyi</option>
                <option value="opt 13">Edo</option>
                <option value="opt 14">Ekiti</option>
                <option value="opt 15">Enugu</option>
                <option value="opt 16">Gombe</option>
                <option value="opt 17">Imo</option>
                <option value="opt 18">Jigawa</option>
                <option value="opt 19">Kaduna</option>
                <option value="opt 20">Kano</option>
                <option value="opt 21">Katsina</option>
                <option value="opt 22">Kebbi</option>
                <option value="opt 23">Kogi</option>
                <option value="opt 24">Kwara</option>
                <option value="opt 25">Lagos</option>
                <option value="opt 26">Nassarrawa</option>
                <option value="opt 27">Niger</option>
                <option value="opt 28">Ogun</option>
                <option value="opt 29">Ondo</option>
                <option value="opt 30">Osun</option>
                <option value="opt 31">Oyo</option>
                <option value="opt 32">Plateau</option>
                <option value="opt 33">Rivers</option>
                <option value="opt 34">Sokoto</option>
                <option value="opt 35">Taraba</option>
                <option value="opt 36">Yobe</option>
                <option value="opt 37">Zamfara</option>
                <option value="opt 38">FCT Abuja</option>
            </select>
           </label>
           </div>
           <div>
           <label for="local-gov">Local government
            <select name="local-gov" id="local-gov">
                <option value="opt 1" selected disabled>Select one...</option>
            </select>
           </label>
           </div>
           <div>
           <label for="trip-type">Trip type
            <select name="trip-type" id="trip-type">
                <option value="opt 1" selected disabled>Select one...</option>
                <option value="opt 2">On-the-go</option>
                <option value="opt 3">Home Pickup</option>
                <option value="opt 4">Hire</option>
            </select>
           </label>
           </div>
           <div>
           <label for="dept">Depart form
            <input type="text" name="dept" id="dept" placeholder="Ketu">
           </label>
           </div>
           <div>
           <label for="dest">Going to
            <input type="text" name="dest" id="dest" placeholder="Ikorodu">
           </label>
           </div>
           <div>
           <label for="hire-type">Hire Type 
            <select name="hire-type" id="hire-type">
                <option value="opt 1" selected disabled>Select one...</option>
                <option value="opt 2">One Way</option>
                <option value="opt 3">Return Back</option>
            </select>
           </label>
           </div>
           <div>
           <label for="loc">Pickup Location GPS 
            <input type="text" name="loc" id="loc">
           </label>
           </div>
           <div>
           <label for="amt">Fare Amount 
            <input type="text" name="amt" id="amt">
           </label>
           </div>
           <div>
           <label for="m-o-p">Means of Payment
            <select name="m-o-p" id="m-o-p">
                <option value="opt 1" selected disabled>Select one...</option>
                <option value="opt 2">Wallet</option>
                <option value="opt 3">Card</option>
                <option value="opt 4">Ticket</option>
            </select>
           </label>
           </div>
           <div>
           <label for="date">Date/Time
            <input type="text" name="date" id="date">
           </label>
           </div>
           <div>
           <label for="ref-id">Reference ID 
            <input type="text" name="ref-id" id="ref-id">
           </label>
           </div>
           </div>
           <input type="submit" value="Submit Hire Request">
        </form>
    </div>
</div>
<?php
require './footer.php';
?>