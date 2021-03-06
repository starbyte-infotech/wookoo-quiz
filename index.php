<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link href="assets/css/style.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

  <style type="text/css">
    .progress {
      /* margin: 10px; */
      width: 110%;
    }

    .progress-bar {
      display: flex;
      flex-direction: column;
      justify-content: center;
      overflow: hidden;
      background-color: #df1839 !important;
    }
  </style>
  <title>Wookoo quiz</title>
</head>

<body>
  <div class="mobile-body mx-auto">
    <!-- <div class="process-bar w-50"></div> -->
    <div class="process-bar-55 progress">
      <div id="dynamic" class="progress-bar progress-bar-success active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
        <span id="current-progress"></span>
      </div>
    </div>
    <div class="logo">
      <div class="waviy text-center">
        <span style="--i:1">W</span>
        <span style="--i:2">O</span>
        <span style="--i:3">O</span>
        <span style="--i:4">K</span>
        <span style="--i:5">O</span>
        <span style="--i:6">O</span>

      </div>
    </div>
    <div class="logo-two">
      <div class="row">
        <div class="col-4">
          <div>
            <h1 style="line-height: 12px;
    text-align: center;"><span class="num counter">3</span></h1>
          </div>
          <div class="cat">category</div>
        </div>
        <div class="col-4">
          <div>
            <h1 style="line-height: 12px;
    text-align: center;"><span class="num counter">30</span><span class="num">+</span></h1>
          </div>
          <!-- <div class="num count">30 <span>+</span></div> -->
          <div class="cat">category</div>
        </div>
        <div class="col-4">
          <div>
            <h1 style="line-height: 12px;
    text-align: center;"><span class="num counter">1,00,000</span><span class="num">+</span></h1>
          </div>
          <!-- <div class="num count">1L+</div> -->
          <div class="cat">Coin spend</div>
        </div>
      </div>
    </div>
  </div>

  <script src="assets/js/bootstrap.bundle.js"></script>

  <script>
    var toggleButton = document.querySelector('.toggle-menu');
    var navBar = document.querySelector('.nav-bar');
    toggleButton.addEventListener('click', function() {
      navBar.classList.toggle('toggle');
    });
  </script>


</body>

</html>
 <script type="text/javascript">
  window.setTimeout(function() {

    // Move to a new location or you can do something else
    window.location.href = "./quiz-game/landing-question.php";

  }, 4000);
</script>
<!--<script>
  $(document).ready(function() {

    var counters = $(".count");
    var countersQuantity = counters.length;
    var counter = [];

    for (i = 0; i < countersQuantity; i++) {
      counter[i] = parseInt(counters[i].innerHTML);
    }

    var count = function(start, value, id) {
      var localStart = start;
      setInterval(function() {
        if (localStart < value) {
          localStart++;
          counters[id].innerHTML = localStart;
        }
      }, 100);
    }

    for (j = 0; j < countersQuantity; j++) {
      count(0, counter[j], j);
    }
  });
</script>
<script>
  $(document).ready(function() {

    var counters = $(".count");
    var countersQuantity = counters.length;
    var counter = [];

    for (i = 0; i < countersQuantity; i++) {
      counter[i] = parseInt(counters[i].innerHTML);
    }

    var count = function(start, value, id) {
      var localStart = start;
      setInterval(function() {
        if (localStart < value) {
          localStart++;
          counters[id].innerHTML = localStart;
        }
      }, 100);
    }

    for (j = 0; j < countersQuantity; j++) {
      count(0, counter[j], j);
    }
  });
</script> -->


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.counterup/1.0/jquery.counterup.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>

<script>
  $(".counter").counterUp({
    delay: 10,
    time: 2000
  });
  $(".counter").addClass("animated fadeInDownBig");
  $("h3").addClass("animated fadeIn");
</script>


<script type="text/javascript">
  $(function() {
    var current_progress = 0;
    var interval = setInterval(function() {
      current_progress += 10;
      $("#dynamic")
        .css("width", current_progress + "%")
        .attr("aria-valuenow", current_progress);
      if (current_progress >= 100)
        clearInterval(interval);
    }, 500);
  });
</script>