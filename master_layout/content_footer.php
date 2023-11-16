<!-- Footer start -->
<footer>
  <div class="top-sec">
    <div class="container ">
      <div class="row match-height-container">
        <div class="col-sm-6 subscribe-info wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="40">
          <div class="row">
            <div id="weather"></div> <!-- Thêm chức năng xem thời tiết ở đây -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="btm-sec">
    <div class="container">
      <div class="row">
        <div class="col-sm-16">
        </div>
      </div>
    </div>
  </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
  $.get('https://api.openweathermap.org/data/2.5/weather?q=Hanoi&appid=d5df918e38a6eb809a51bcdb9d44cff4', function(data) {
    $('#weather').html('Thời tiết ở Hà Nội: ' + data.weather[0].description);
  });
});
</script>
