<?php
  session_start();
  $count = 0;  
  $title = "Index";
  require_once "./template/header.php";
  require_once "./functions/database_functions.php";
  $book_id = $_GET['Book_id'];
  // connecto database
  require_once "./functions/database_functions.php";
  $conn = db_connect();

  $query = "SELECT * FROM books WHERE Book_id = '$book_id'";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }

  $row = mysqli_fetch_assoc($result);
  if(!$row){
    echo "Empty book";
    exit;
  }

  $title = $row['book_title'];
  require "./template/header.php";
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
    <title>Book</title>
  </head>
  <body>
  
  <!---Books Display--->

  <div class="row">
    <div class="col-md-3 text-center">
      <img class="img-responsive img-thumbnail" src="images/<?php echo $row['book_image']; ?>">
    </div>
    <div class="col-md-6">
      <h4>Book Description</h4>
      <p><?php echo $row['About']; ?></p>
      <h4>Book Details</h4>
      <table class="table">
      <?php foreach($row as $key => $value){
          if($key == "About" || $key == "book_image" || $key == "Publisher_id" || $key == "Title"){
                continue;
              }
              switch($key){
                case "book_id":
                  $key = "ID";
                  break;
                case "Title":
                  $key = "Title";
                  break;
                case "Author_id":
                  $key = "Author";
                  break;
                case "Price":
                  $key = "Price";
                  break;
              }
            ?>
            <tr>
              <td><?php echo $key; ?></td>
              <td><?php echo $value; ?></td>
            </tr>
            <?php 
              } 
              if(isset($conn)) {mysqli_close($conn); }
            ?>
          </table>
          <form method="post" action="cart.php">
            <input type="hidden" name="booktitle" value="<?php echo $book_id;?>">
            <input type="submit" value="Purchase / Add to cart" name="cart" class="btn btn-primary">
          </form>
        </div>
      </div>

  <!---Recommended--->

  <div style="text-align: center;"><h1>Our Top Picks</h1></div>
  <div class="card-deck">
    <div class="card">
      <img class="card-image center" src="images/harry-potter.jpg" alt="Card image cap">
      <div class="card-body">
        <h4 class="card-title">Harry Potter</h4>
        <h5>$140.3</h5>
      </div>
      <div class="card-footer">
        <small class="text-muted">Last updated 3 mins ago</small>
      </div>
      <button class="btn btn-primary btn-card">
        <i class="fa fa-cart-plus"></i>
      </button>
    </div>
    <div class="card">
      <img class="card-image center" src="images/percy-jackson-and-the-olympians.jpg" alt="Card image cap">
      <div class="card-body">
        <h4 class="card-title">Percy Jackson And The Olympians</h4>
        <h5>$349.23</h5></div>
      <div class="card-footer">
        <small class="text-muted">Last updated 3 mins ago</small>
      </div>
      <button class="btn btn-primary btn-card">
        <i class="fa fa-cart-plus"></i>
      </button>
    </div>
    <div class="card">
      <img class="card-image center" src="images/heros-of-olympas.jpg" alt="Card image cap">
      <div class="card-body">
        <h4 class="card-title">Heros Of Olympas</h4>
        <h5>$559.31</h5>
      </div>
      <div class="card-footer">
        <small class="text-muted">Last updated 3 mins ago</small>
      </div>
      <button class="btn btn-primary btn-card">
        <i class="fa fa-cart-plus"></i>
      </button>
    </div>
    <div class="card">
      <img class="card-image center" src="images/The-chronicles-of-Narnia.jpg" alt="Card image cap">
      <div class="card-body">
        <h4 class="card-title">The Chronicles Of Narnia</h4>
        <h5>$229.54</h5></div>
      <div class="card-footer">
        <small class="text-muted">Last updated 3 mins ago</small>
      </div>
      <button class="btn btn-primary btn-card">
        <i class="fa fa-cart-plus"></i>
      </button>
    </div>
  </div>


        <!---google map api--->
        <div class="row" style="margin-top: 20px;">
          <div class="col-sm-8 ourServicesWrapper">
            <h2>Our Achievements:</h2>
            <div class="container_full footer_top_bg">
              <div class="fix container">
                <div class="footer_top_area">
                  <div class="single_footer_area">
                    <h3 class="frst_h2_1">Recent Posts</h3>
                    <ul>
                      <li><a href="#">Duis id tellus at eros tempor imper.</a></li>
                      <li><a href="#">Aenean ligula nisl, fermentum vel lobortis id, scelerisque at lorem.</a></li>
                      <li><a href="#">Suspendisse nec neque ut nunc rhoncus sodales.</a></li>
                      <li><a href="#">Duis id Nam pulvinar faucibus dui.</a></li>
                      <li><a href="#">Pellentesque pulvinar sagittis.</a></li>
                    </ul>
                  </div>
                  <div class="single_footer_area area_middle_2">
                    <h3 class="frst_h2_2">Archives</h3>
                    <ul>
                      <li><a href="#">January 2018</a></li>
                      <li><a href="#">February 2018</a></li>
                      <li><a href="#">March 2018</a></li>
                      <li><a href="#">Arpril 2018</a></li>
                      <li><a href="#">May 2018</a></li>
                      <li><a href="#">July 2018</a></li>
                    </ul>
                  </div>
                  <div class="single_footer_area">
                    <h3 class="frst_h2_3">Twitter</h3>
                    <div class="twitter_section">
                      <p>Sed ut perspiciatis unde omnis iste natus, error sit voluptatem accusantium <a href="http://bit.ly/bkPfFM ">http://bit.ly/bkPfFM </a>doloremque laudantium, totam rem aperiamea. <a href="#">3 hours ago</a> <a href="#">@jacquelinecharl</a></p>

                    </div>
                    <img class="tw_im_btm" src="images/twitter_icon.png" alt="" />
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="col-sm-4 googleApiWrapper">
            <h2 class="gooleApiHeader">Our Location</h2>
            <div id="map" class="googleApiMap">

            </div>

          </div>
        </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script>
      function initMap(){
        //map options
        var options={
          zoom:8,
          center:{lat:23.8191,lng:90.4526}
        }
        //new map
        var map= new google.maps.Map(document.getElementById('map'), options);
        //add marker
        var marker = new google.maps.Marker({
          position:{lat:23.807996768,lng:90.421164982},
          map:map
        });
        var infoWindow= new google.maps.infoWindow({
          content: '<h1>BookWorm Office</h1>'

        });
        marker.addListener('click' , function(){
        infoWindow.open(map, marker);
      });

    }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPKm8mJcjTReQDn0YqJMOGsLZwaLweo94&callback=initMap"async defer></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
    <script>

    jQuery('.statistic-counter').counterUp({
                    delay: 10,
                    time: 2000
                });
    </script>
    <?php
      if(isset($conn)) {mysqli_close($conn);}
      require_once "./template/footer.php";
    ?>

  </body>
</html>