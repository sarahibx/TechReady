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

    <title> TechReady Services</title>

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

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script type="text/javascript">
    var currentQuestionID = null; // Variable to store the current question ID

  $(document).ready(function () {
      loadQuestion(); // Load the first question on page load
  });

  function loadQuestion() {
      $.ajax({
          url: 'get_question.php',
          type: 'GET',
          success: function (data) {
              var question = JSON.parse(data);
              $('#question').text(question.Question);
              $('#answer').text(question.Answer);
              $('#questionID').val(question.ID);
              currentQuestionID = question.ID; // Set the current question ID
              updateButtonStates(); // Update button states
          }
      });
  }

  function flipCard() {
      // Make an AJAX request to update the "Solved" status in the database
      $.ajax({
          url: 'update_status.php',
          type: 'POST',
          data: { questionID: currentQuestionID },
          success: function () {
              // Flip the card by adding a CSS class
              var flashcard = $('.flashcard');
              flashcard.toggleClass('flipped');
          }
      });
  }

  function nextQuestion() {
      $.ajax({
          url: 'get_next_question.php',
          type: 'GET',
          data: { currentQuestionID: currentQuestionID },
          success: function (data) {
              var question = JSON.parse(data);
              if (question) {
                  $('#question').text(question.Question);
                  $('#answer').text(question.Answer);
                  $('#questionID').val(question.ID);
                  currentQuestionID = question.ID; // Update the current question ID
                  $('.flashcard').removeClass('flipped');
                  updateButtonStates(); // Update button states
              } else {
                  alert('No next question found.');
              }
          }
      });
  }

  function prevQuestion() {
      $.ajax({
          url: 'get_prev_question.php',
          type: 'GET',
          data: { currentQuestionID: currentQuestionID },
          success: function (data) {
              var question = JSON.parse(data);
              if (question) {
                  $('#question').text(question.Question);
                  $('#answer').text(question.Answer);
                  $('#questionID').val(question.ID);
                  currentQuestionID = question.ID; // Update the current question ID
                  $('.flashcard').removeClass('flipped');
                  updateButtonStates(); // Update button states
              } else {
                  alert('No previous question found.');
              }
          }
      });
  }

  function markAsSolved() {
    if (currentQuestionID !== null) {
        // Make an AJAX request to update the "Solved" status in the database
        $.ajax({
            url: 'update_status.php', // Replace with the actual URL to update the database
            type: 'POST',
            data: { questionID: currentQuestionID },
            success: function (data) {
                // Check if the database update was successful
                if (data === 'success') {
                    // Update the UI or perform any other actions as needed
                } else {
                    alert('Failed to mark the question as solved.');
                }
            },
            error: function () {
                alert('An error occurred while marking the question as solved.');
            }
        });
    } else {
        alert('No question to mark as solved.');
    }
}
function resetQuestions() {
    $.ajax({
        url: 'reset_questions.php', // Replace with the actual URL to reset the questions in the database
        type: 'POST',
        data: {},
        success: function (data) {
            // Check if the database reset was successful
            if (data === 'success') {
                // You can also update the UI or perform any other actions as needed
            } else {
                alert('Failed to reset questions.');
            }
        },
        error: function () {
            alert('An error occurred while resetting questions.');
        }
    });
}

      </script>

    
  <style>
          /* Custom CSS for flashcard-container */
          #flashcard-container {
              max-width: 800px; /* Increase the maximum width as needed */
              margin: 0 auto;
              padding: 20px;
              text-align: center;
          }

          .flashcard {
              position: relative;
              height: 500px; /* Increase the height for a larger flashcard */
              perspective: 1200px; /* Add perspective for 3D effect */
              transform-style: preserve-3d;
              transition: transform 0.5s;
              cursor: pointer;
          }
          .flipped {
              transform: rotateY(180deg);
          }

          .card {
              width: 100%;
              height: 100%;
              position: absolute;
              transition: transform 0.5s;
              backface-visibility: hidden;
              display: flex;
              justify-content: center;
              align-items: center;
              border: 1px solid #ccc;
              background-color: #fff;
              box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Increase shadow effect */
              border-radius: 10px; /* Increase border radius for rounded corners */
          }

          .card-front {
              transform: rotateY(0deg);
          }

          .card-back {
              transform: rotateY(180deg);
          }

          .card p {
              font-size: 24px; /* Increase font size for text */
          }

          .navigation-buttons {
              margin-top: 30px; /* Increase margin for spacing */
          }

          /* Style the buttons similar to the project's CSS */
      .navigation-buttons button {
          width: 200px; /* Set a fixed width for both buttons */
          padding: 15px;
          font-size: 18px;
          background-color: #00204a;
          color: #ffffff;
          border: none;
          border-radius: 10px;
          cursor: pointer;
          transition: background-color 0.3s;
      }

          /* Change button background color on hover */
          .navigation-buttons button:hover {
              background-color: mediumblue;
          }

          /* Additional styles for flipped card */
          

          .card-front,
          .card-back {
              display: flex;
              align-items: center;
              justify-content: center;
              background-color: #00204a;
          }

          .card-back {
              transform: rotateY(180deg);
          } 
          #progressBarContainer {
            width: 100%;
            background-color: #ccc;
        }

        #progressBar {
            width: 0%;
            height: 30px;
            background-color: #4caf50;
            text-align: center;
            line-height: 30px;
            color: white;
        }
      </style>

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
            <a class="navbar-brand" href="../home.html">
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
                  <a class="nav-link" href="../home.html">Home </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../about.html"> About</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="../service.html">Services <span class="sr-only">(current)</span> </a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link" href="../team.html">Team</a>
                </li>
               
                <form class="form-inline">
                  <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                    <i class="fa fa-search" aria-hidden="true"></i>
                  </button>
                </form>
              </ul>
            </div>
          </nav>
        </div>
      </header>
      <!-- end header section -->
    </div>


    <div id="flashcard-container" class="flashcard-container">
      
            <div class="flashcard" onclick="flipCard()">
              <div class="card card-front">
                  <p id="question">Loading...</p>
              </div>
              <div class="card card-back">
                  <p id="answer">Loading...</p>
              </div>a
          </div>
          <div class="navigation-buttons">
            <button id="prevButton" onclick="prevQuestion()" disabled>Previous Question</button>
            <button id="solvedButton" onclick="markAsSolved()">Solved</button>
            <button id="nextButton" onclick="nextQuestion()" disabled>Next Question</button>
          </div>  
          <div class="navigation-buttons">
          <button id="resetButton" onclick="resetQuestions()">Reset</button>

          </div>



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
                <a class="active" href="../home.html">
                  Home
                </a>
                <a class="" href="../about.html">
                  About
                </a>
                <a class="" href="../service.html">
                  Services
                </a>
               
                <a class="" href="../team.html">
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

    <script type="text/javascript" src="js/scripts.js"></script>

    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>
    <!-- End Google Map -->

  </body>

  </html>