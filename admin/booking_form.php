
<?php 
include('../connection.php');
error_reporting(1);
extract($_REQUEST);
$rooms = mysqli_fetch_all(mysqli_query($con, "SELECT r.*
FROM rooms r
LEFT JOIN room_booking_details b ON r.room_id = b.room_id;"));

if(isset($savedata))
{

;
echo "select room_id from rooms where room_no='$room_type'";

$rid=mysqli_fetch_assoc(mysqli_query($con,"select room_id from rooms where room_id='$room_type' "));

$roomid = $rid["room_id"];


  $sql="insert into room_booking_details(name,room_id,email,phone,address,contry,room_type,check_in_date,check_in_time,check_out_date,Occupancy) 
  values('$name','$roomid','$email','$phone','$address','$country',
  '$room_type','$cdate','$ctime','$codate','$Occupancy')";


 if(mysqli_query($con,$sql))
 {
  $status="paid";
 $msg= "<h1 style='color:blue'>You have Successfully booked this room</h1><h2><a href='order.php'>View </a></h2>"; 
 }
 
 
}
?>

<div class="container-fluid text-center"id="primary" style=""><!--Primary Id-->
  
  <div class="container">
    <div class="row" style="height:600px; margin-top:100px; background-color:white;">
    <h1 style="color:#212221;"> Booking Form </h1><br>
      <?php echo @$msg; ?>
      <!--Form Containe Start Here-->
     <form class="form-horizontal" style="position:relative;right:50px;" method="post">
       <div class="col-sm-6">
         <div class="form-group">
           <div class="row">
              <div class="control-label col-sm-4"><h4> Name :</h4></div>
                <div class="col-sm-8">
                 <input type="text"  class="form-control" name="name" placeholder="الإسم" required>
          </div>
        </div>
      </div>

        <div class="form-group">
          <div class="row">
           <div class="control-label col-sm-4"><h4>ID :</h4></div>
          <div class="col-sm-8">
              <input type="text" class="form-control" name="email"  placeholder="رقم الإقامة"required/>
          </div>
        </div>
        </div>

        <div class="form-group">
          <div class="row">
           <div class="control-label col-sm-4"><h4>Mobile :</h4></div>
          <div class="col-sm-8">
              <input type="number" class="form-control" name="phone" placeholder="رقم الهاتف"required>
          </div>
        </div>
        </div>

        <div class="form-group">
          <div class="row">
           <div class="control-label col-sm-4"><h4>Address :</h4></div>
          <div class="col-sm-8">
              <textarea name="address" class="form-control" placeholder="العنوان"></textarea>
          </div>
        </div>
        </div>

         <div class="form-group">
          <div class="row">
           <div class="control-label col-sm-4"><h4>Country</h4></div>
          <div class="col-sm-8">
              <input type="text" class="form-control" name="country" placeholder="الجنسية"required>
          </div>
        </div>
        </div>

        <div class="form-group">
          <div class="row">
           <div class="control-label col-sm-4"><h4></h4></div>
          <div class="col-sm-8">
              <input type="hidden" name="state" class="form-control"placeholder="Enter Your State Name"required>
          </div>
        </div>
        </div>

		      <div class="form-group">
            <div class="row">
           <div class="control-label col-sm-4"><h4></h4></div>
          <div class="col-sm-8">
              <input type="hidden" name="zip" class="form-control" placeholder="Enter Your Zip Code"required>
          </div>
        </div>
        </div>
        </div>
           <div class="col-sm-6">
            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-5"><h4>Room Type:</h4></div>
                  <div class="col-sm-7">
                <select class="form-control" name="room_type"required>
                <?php
                    foreach($rooms as $room){
                        echo "<option value='".$room[0]."'>".$room[1]."</option>";
                    }
                ?>
                  <!-- <option>Deluxe Room</option>
                  <option>Luxurious Suite</option>
                  <option>Standard Room</option>
                  <option>Suite Room</option>
                  <option>Twin Deluxe Room</option> -->
               </select>
              </div>
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-5"><h4>check In Date :</h4></div>
                  <div class="col-sm-7">
                  <input type="date" name="cdate" class="form-control"required>
                  </div>
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <div class="row">
                 <div class="control-label col-sm-5"><h4>Check In Time:</h4></div>
                   <div class="col-sm-7">
                    <input type="time" name="ctime" class="form-control"required>
                  </div>
              </div>
            </div>
          </div>
           <div class="col-sm-6">
            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-5"><h4>Check Out Date :</h4></div>
                <div class="col-sm-7">
                  <input type="date" name="codate" class="form-control"required>
                </div> 
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <div class="row">
                <label class="control-label col-sm-5"><h4 id="top">Occupancy :</h4></label>
                <div class="col-sm-7">
                  <div class="radio-inline"><input type="radio" value="single" name="Occupancy"required >Single</div>
                  <div class="radio-inline"><input type="radio" value="twin" name="Occupancy" required>Twin</div>
                  <div class="radio-inline"><input type="radio" value="double" name="Occupancy" required>Double</div>
                </div> 
              </div>
            </div>
            <input type="submit"value="Confirm Booking" onclick="load()" name="savedata" class="btn btn-danger"required/>
          </div>
          </form><br>
        </div>
      </div>
    </div>
  </div>
<script>
  function load(){
    
     alert("processing payment....");
  }
  </script>