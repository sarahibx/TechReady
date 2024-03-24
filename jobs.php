<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "techready";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicom.png" type="">

  <title>TechReady Opportunities</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body class="sub_page">

  <div class="hero_area">

    <div class="hero_bg_box">
      <div class="bg_img_box">
        <img src="images/hero-bg.png" alt="">
      </div>
    </div>

    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <span>
              TechReady
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
              <li class="nav-item ">
                <a class="nav-link" href="index.html">Home </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html"> About</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="service.html">Services <span class="sr-only">(current)</span> </a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="team.html">Team</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"> <i class="fa fa-user" aria-hidden="true"></i> Login</a>
              </li>
              <form class="form-inline">
                
              </form>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>


  <!-- service section -->

 <div>
 <div class="heading_container heading_center">
        <h2 class="" style="margin-bottom: 80px; margin-top:50px;">
          Internships and Jobs <span >Opportunities</span>
        </h2>
      </div>
      
 <h2></h2>
    <table>
        <tr style="padding-bottom: 50px;">
            <th class="col-md-2" style="padding-bottom: 50px;"></th>
            <th class="col-md-2" style="padding-bottom: 50px;">COMPANY</th>
            <th class="col-md-2" style="padding-bottom: 50px;">LINK</th>
            <th class="col-md-2" style="padding-bottom: 50px;">CATEGORY</th>
            <th class="col-md-2" style="padding-bottom: 50px;">DEADLINE</th>
            <th class="col-md-2" style="padding-bottom: 50px;">LOCATION</th>
        </tr>

        <?php
        // Select data from database
$sql = "SELECT ID, COMPANY, LINK, CATEGORY, DEADLINE, LOCATION FROM jobs";
$result = $conn->query($sql);
      
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr style='padding-bottom: 50px;'>";
                echo "<td class='col-md-2' style='padding-bottom: 50px;'>" . $row["ID"] . "</td>";
                echo "<td class='col-md-3' style='padding-bottom: 50px;'>" . $row["COMPANY"] . "</td>";
                echo '<td class="col-md-2" style="padding-bottom: 50px;"><a href="' . $row["LINK"] . '" target="_blank"><button style="background-color:#00bbf0; border-radius:5px;">Apply Now</button></a></td>';
                echo "<td class='col-md-2' style='padding-bottom: 50px;'>" . $row["CATEGORY"] . "</td>";
                echo "<td class='col-md-2' style='padding-bottom: 50px;'>" . $row["DEADLINE"] . "</td>";
                echo "<td class='col-md-2' style='padding-bottom: 50px;'>" . $row["LOCATION"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>0 results</td></tr>";
        }


        ?>

    </table>
   

 </div>

  <!-- end service section -->

  <!-- info section -->

  <section class="info_section layout_padding2">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 info_col">
          <div class="info_contact">
            <h4>
              Address
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Beirut, Lebanon
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call +961 70123456
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  techready@gmail.com
                </span>
              </a>
            </div>
          </div>
          <div class="info_social">
            <a href="">
              <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-linkedin" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 info_col">
          <div class="info_detail">
            <h4>
              Info
            </h4>
            <p>
              Providing the next generation of tech enthusiasts with the ultimate preparation tools!            </p>
            </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-2 mx-auto info_col">
          <div class="info_link_box">
            <h4>
              Links
            </h4>
            <div class="info_links">
              <a class="active" href="index.html">
                Home
              </a>
              <a class="" href="about.html">
                About
              </a>
              <a class="" href="service.html">
                Services
              </a>
              <a class="" href="why.html">
                Why Us
              </a>
              <a class="" href="team.html">
                Team
              </a>
            </div>
          </div>
        </div>
       
      </div>
    </div>
  </section>

  <!-- end info section -->

  <!-- footer section -->
  <section class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="https://html.design/">TechReady</a>
      </p>
    </div>
  </section>
  <!-- footer section -->

  <!-- jQery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script type="text/javascript" src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>

</html>

<?php
// Close connection
$conn->close();
?>