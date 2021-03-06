<?php
  session_start();
  $count = 0;  
  $title = "Index";
  require_once "./template/header.php";
  require_once "./functions/database_functions.php";
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
  </head>
<body>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="images/book1.jpg" alt="">
        <div class="carousel-caption d-none d-md-block">
          <h5>George R.R. Martin, A Dance with Dragons</h5>
          <p>“A reader lives a thousand lives before he dies, said Jojen. The man who never reads lives only one.” </p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/book2.jpg" alt="">
        <div class="carousel-caption d-none d-md-block">
          <h5>John Green, The Fault in Our Stars</h5>
          <p>“Sometimes, you read a book and it fills you with this weird evangelical zeal, and you become convinced that the shattered world will never be put back together unless and until all living humans read the book.” </p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/book3.jpg" alt="">
        <div class="carousel-caption d-none d-md-block">
          <h5>J.D. Salinger, The Catcher in the Rye</h5>
          <p>“What really knocks me out is a book that, when you're all done reading it, you wish the author that wrote it was a terrific friend of yours and you could call him up on the phone whenever you felt like it. That doesn't happen much, though.” </p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/book4.jpg" alt="">
        <div class="carousel-caption d-none d-md-block">
          <h5>William Styron, Conversations with William Styron</h5>
          <p>“A great book should leave you with many experiences, and slightly exhausted at the end. You live several lives while reading.” </p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

<!---book section one--->

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

  <!---book section two--->

    <div class="card-deck">
      <div class="card">
        <img class="card-image center" src="images/The-Kane-Chronicles-Book.jpg" alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">The Kane Chronicles Book</h4>
          <h5>$455.21</h5>
        </div>
        <div class="card-footer">
          <small class="text-muted">Last updated 3 mins ago</small>
        </div>
        <button class="btn btn-primary btn-card">
          <i class="fa fa-cart-plus"></i>
        </button>
      </div>
      <div class="card">
        <img class="card-image center" src="images/The-Raven-Cycle-Series.jpg" alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">The Raven Cycle Series</h4>
          <h5>$561.45</h5></div>
        <div class="card-footer">
          <small class="text-muted">Last updated 3 mins ago</small>
        </div>
        <button class="btn btn-primary btn-card">
          <i class="fa fa-cart-plus"></i>
        </button>
      </div>
      <div class="card">
        <img class="card-image center" src="images/Six-Of-Crows.jpg" alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">Six Of Crows</h4>
          <h5>$129.34</h5>
        </div>
        <div class="card-footer">
          <small class="text-muted">Last updated 3 mins ago</small>
        </div>
        <button class="btn btn-primary btn-card">
          <i class="fa fa-cart-plus"></i>
        </button>
      </div>
      <div class="card">
        <img class="card-image center" src="images/The-Twoering-Sky.jpg" alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">The Towering Sky</h4>
          <h5>$239.12</h5></div>
        <div class="card-footer">
          <small class="text-muted">Last updated 3 mins ago</small>
        </div>
        <button class="btn btn-primary btn-card">
          <i class="fa fa-cart-plus"></i>
        </button>
      </div>
    </div>

    <!---visitors counter-->
    <section id="counter" class="counter counterWrapper">
            <div class="main_counter_area">
                <div class="overlay p-y-3">
                    <div class="container">
                        <div class="row">
                            <div class="main_counter_content text-center white-text wow fadeInUp">
                                <div class="col-md-3 visitorItem">
                                    <div class="single_counter p-y-2 m-t-1">
                                        <i class="fa fa-heart m-b-1"></i>
                                        <h2 class="statistic-counter">100</h2>
                                        <p>Love Our Team</p>
                                    </div>
                                </div>
                                <div class="col-md-3 visitorItem">
                                    <div class="single_counter p-y-2 m-t-1">
                                        <i class="fa fa-check m-b-1"></i>
                                        <h2 class="statistic-counter">400</h2>
                                        <p>Check Our</p>
                                    </div>
                                </div>
                                <div class="col-md-3 visitorItem">
                                    <div class="single_counter p-y-2 m-t-1">
                                        <i class="fa fa-refresh m-b-1"></i>
                                        <h2 class="statistic-counter">312</h2>
                                        <p>repeat client</p>
                                    </div>
                                </div>
                                <div class="col-md-3 visitorItem">
                                    <div class="single_counter p-y-2 m-t-1">
                                        <i class="fa fa-beer m-b-1"></i>
                                        <h2 class="statistic-counter">480</h2>
                                        <p>Books Ordered</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!---google map api--->
        <div class="row">
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