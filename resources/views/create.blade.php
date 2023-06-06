@extends('layout')
<!DOCTYPE html>
<link href="https://fonts.googleapis.com/css2?family=EB+Garamond&wght@500&display=swap" rel="stylesheet">
<link href="https://img.icons8.com/cotton/64/null/train--v2.png" rel="icon">
<nav class="navbar gradient-custom-2 mb-3 rounded-0">
  <div class="container-fluid">
  <a href="{{ route('tickets.index') }}" style="text-decoration: none;"><span class="navbar-brand h1 fw-bold text-light"><img src="https://img.icons8.com/cotton/32/null/train--v2.png" class="me-2 mb-1">Ticket Station</span></a>
      </div>
    </nav>
@section('content')
<div class="card uper mx-auto col-10 col-md-8 col-lg-6 mt-5">
  <div class="card-header fw-bold fs-5">
    Issue a ticket
  </div>
  <div class="card-body">
  <div class="train-seat-container card d-none justify-content-end">
  <div class="card-header train-seat-header fw-bold fs-6">
    Train
  </div>
  <div class="card-body mx-4">
    <div class='seat available' id="1">1</div>
    <div class='seat available' id="2">2</div>
    <div class='seat available' id="3">3</div>
    <br>
    <div class='seat available' id="4">4</div>
    <div class='seat available' id="5">5</div>
    <div class='seat available mb-3' id="6">6</div>
    <br>
    <div class='seat available' id="7">7</div>
    <div class='seat available' id="8">8</div>
    <div class='seat available' id="9">9</div>
    <br>
    <div class='seat available' id="10">10</div>
    <div class='seat available' id="11">11</div>
    <div class='seat available mb-3' id="12">12</div>
    <br>
    <div class='seat available' id="13">13</div>
    <div class='seat available' id="14">14</div>
    <div class='seat available' id="15">15</div>
    <br>
    <div class='seat available' id="16">16</div>
    <div class='seat available' id="17">17</div>
    <div class='seat available mb-3' id="18">18</div>
    <br>
    <div class='seat available' id="19">19</div>
    <div class='seat available' id="20">20</div>
    <div class='seat available' id="21">21</div>
    <br>
    <div class='seat available' id="22">22</div>
    <div class='seat available' id="23">23</div>
    <div class='seat available mb-3' id="24">24</div>
    <br>
    <div class='seat available' id="25">25</div>
    <div class='seat available' id="26">26</div>
    <div class='seat available' id="27">27</div>
    <br>
    <div class='seat available' id="28">28</div>
    <div class='seat available' id="29">29</div>
    <div class='seat available mb-3' id="30">30</div>
    <br>
    <div class='seat available' id="31">31</div>
    <div class='seat available' id="32">32</div>
    <div class='seat available' id="33">33</div>
    <br>
    <div class='seat available' id="34">34</div>
    <div class='seat available' id="35">35</div>
    <div class='seat available' id="36">36</div>
</div>
</div>
  @if ($errors->any())
    <div class="alert alert-danger" style="padding-bottom: 3px !important">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div><br/>
    @endif
    <div class="row">
      <div class="col-6">
    <form method="post" action="{{ route('tickets.store') }}">
      <div class="form-group fw-semibold">
        @csrf
        <label for="line_number">Line №:</label>
        <select class="form-select" name="line_number" id="lineNumber">
          <option selected name="line_number" value="8632 [F]">8632 [F]</option>
          <option name="line_number" value="8912 [F]">8912 [F]</option>
          <option name="line_number" value="9036 [P]">9036 [P]</option>
          <option name="line_number" value="15890 [F]">15890 [F]</option>
          <option name="line_number" value="8690 [FF]">8690 [FF]</option>
          <option name="line_number" value="8901 [P]">8901 [P]</option>
          <option name="line_number" value="10202 [FF]">10202 [FF]</option>
          <option name="line_number" value="11780 [P]">11780 [P]</option>
        </select>
      </div>
      <div class="form-group fw-semibold">
        <label for="from">From:</label>
        <select class="form-select" name="from">
          <option selected name="from" value="Blagoevgrad">Blagoevgrad</option>
          <option name="from" value="Burgas">Burgas</option>
          <option name="from" value="Varna">Varna</option>
          <option name="from" value="Veliko Turnovo">Veliko Turnovo</option>
          <option name="from" value="Vidin">Vidin</option>
          <option name="from" value="Vratsa">Vratsa</option>
          <option name="from" value="Gabrovo">Gabrovo</option>
          <option name="from" value="Dobrich">Dobrich</option>
          <option name="from" value="Kurdjali">Kurdjali</option>
          <option name="from" value="Kiustendil">Kiustendil</option>
          <option name="from" value="Lovech">Lovech</option>
          <option name="from" value="Montana">Montana</option>
          <option name="from" value="Pazardjik">Pazardjik</option>
          <option name="from" value="Pleven">Pleven</option>
          <option name="from" value="Pernik">Pernik</option>
          <option name="from" value="Plovdiv">Plovdiv</option>
          <option name="from" value="Razgrad">Razgrad</option>
          <option name="from" value="Ruse">Ruse</option>
          <option name="from" value="Silistra">Silistra</option>
          <option name="from" value="Sliven">Sliven</option>
          <option name="from" value="Smolyan">Smolyan</option>
          <option name="from" value="Sofia">Sofia</option>
          <option name="from" value="Stara Zagora">Stara Zagora</option>
          <option name="from" value="Targovishte">Targovishte</option>
          <option name="from" value="Haskovo">Haskovo</option>
          <option name="from" value="Shumen">Shumen</option>
          <option name="from" value="Yambol">Yambol</option>
        </select>
      </div>
      <div class="form-group fw-semibold">
        <label for="to">To:</label>
        <select class="form-select" name="to">
          <option name="to" value="Blagoevgrad">Blagoevgrad</option>
          <option selected name="to" value="Burgas">Burgas</option>
          <option name="to" value="Varna">Varna</option>
          <option name="to" value="Veliko Turnovo">Veliko Turnovo</option>
          <option name="to" value="Vidin">Vidin</option>
          <option name="to" value="Vratsa">Vratsa</option>
          <option name="to" value="Gabrovo">Gabrovo</option>
          <option name="to" value="Dobrich">Dobrich</option>
          <option name="to" value="Kurdjali">Kurdjali</option>
          <option name="to" value="Kiustendil">Kiustendil</option>
          <option name="to" value="Lovech">Lovech</option>
          <option name="to" value="Montana">Montana</option>
          <option name="to" value="Pazardjik">Pazardjik</option>
          <option name="to" value="Pleven">Pleven</option>
          <option name="to" value="Pernik">Pernik</option>
          <option name="to" value="Plovdiv">Plovdiv</option>
          <option name="to" value="Razgrad">Razgrad</option>
          <option name="to" value="Ruse">Ruse</option>
          <option name="to" value="Silistra">Silistra</option>
          <option name="to" value="Sliven">Sliven</option>
          <option name="to" value="Smolyan">Smolyan</option>
          <option name="to" value="Sofia">Sofia</option>
          <option name="to" value="Stara Zagora">Stara Zagora</option>
          <option name="to" value="Targovishte">Targovishte</option>
          <option name="to" value="Haskovo">Haskovo</option>
          <option name="to" value="Shumen">Shumen</option>
          <option name="to" value="Yambol">Yambol</option>
        </select>
      </div>
      <div class="form-group fw-semibold">
        <label for="departure_date">Departure date:</label>
        <input type="date" class="form-control" name="departure_date" id="datePicker"/>
      </div>
</div>
<div class="col-6">
      <div class="form-group fw-semibold">
        <label for="class">Class:</label>
        <select class="form-select" name="class" id="Class">
          <option selected name="class" value="1">1</option>
          <option name="class" value="2">2</option>
        </select>
      </div>
      <div class="form-group fw-semibold">
        <label for="seat">Seat:</label>
        <input type="text" class="form-control" placeholder="№ 1 to 100" name="seat" min="1" max="100" id="seatShow" readonly/>
      </div>
      <div class="form-group fw-semibold">
        <label for="price">Price:</label>
        <input type="text" class="form-control" name="price" id="Price" readonly/>
      </div>
      <div class="form-group fw-semibold">
        <label for="discount">Discount type:</label>
        <select class="form-select" aria-label="Default select example" name="discount" id="discountType">
          <option selected name="discount" value="0">No discount</option>
          <option name="discount" value="10">Student</option>
          <option name="discount" value="25">Collegian</option>
          <option name="discount" value="50">Pensioner</option>
        </select>
      </div>
</div>
</div>
      <br>
      <button type="submit" class="btn gradient-custom-2 text-light fw-semibold">Submit</button>
      <a href="{{URL::asset('tickets')}}" class="btn btn-secondary fw-semibold ms-2">Go Back</a>
    </form>
  </div>
</div>
@foreach($tickets as $ticket)
<div class="takenSeats d-none">{{$ticket->seat}}</div>
@endforeach
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script>
  var lineNumber = document.getElementById("lineNumber");

  document.addEventListener('DOMContentLoaded',function(){
    document.getElementById("Price").value = 20;
    document.getElementById("datePicker").valueAsDate = new Date();
  })

  document.getElementById("lineNumber").addEventListener('change',function(){
    if(lineNumber[0].selected == true && document.getElementById("Class")[0].selected == true || lineNumber[1].selected == true && document.getElementById("Class")[0].selected == true || lineNumber[3].selected == true && document.getElementById("Class")[0].selected == true){
      document.getElementById("Price").value = 20;
    }
    else if(lineNumber[0].selected == true && document.getElementById("Class")[1].selected == true || lineNumber[1].selected == true && document.getElementById("Class")[1].selected == true || lineNumber[3].selected == true && document.getElementById("Class")[1].selected == true){
      document.getElementById("Price").value = 10;
    }
    else if(lineNumber[2].selected == true && document.getElementById("Class")[0].selected == true || lineNumber[5].selected == true && document.getElementById("Class")[0].selected == true || lineNumber[7].selected == true && document.getElementById("Class")[0].selected == true){
      document.getElementById("Price").value = 10;
    }
    else if(lineNumber[2].selected == true && document.getElementById("Class")[1].selected == true || lineNumber[5].selected == true && document.getElementById("Class")[1].selected == true || lineNumber[7].selected == true && document.getElementById("Class")[1].selected == true){
      document.getElementById("Price").value = 5;
    }
    else if(lineNumber[4].selected == true && document.getElementById("Class")[0].selected == true || lineNumber[6].selected == true && document.getElementById("Class")[0].selected == true){
      document.getElementById("Price").value = 30;
    }
    else{
      document.getElementById("Price").value = 15;
    }
  })

  document.getElementById("Class").addEventListener('change',function(){
    if(document.getElementById("Class")[1].selected == true){
    document.getElementById("Price").value *= 0.5;
  }
  else{
    document.getElementById("Price").value *= 2;
  }
  })

  document.getElementById('seatShow').addEventListener('click',function(){
    document.querySelectorAll('.takenSeats').forEach(takenSeat => {
    document.querySelectorAll('.seat').forEach(element => {
      if(element.innerText == takenSeat.innerHTML)
      element.classList.add('selected')
    });
               
      });
    document.querySelector('.train-seat-container').classList.remove('d-none')
    document.querySelector('.train-seat-container').classList.add('d-flex')
    document.querySelector('.train-seat-header').innerText = 'Train №: ' + document.getElementById("lineNumber").value
  })

  document.getElementById('seatShow').addEventListener('blur', function(){setTimeout(() => {
    document.querySelector('.train-seat-container').classList.remove('d-flex')
    document.querySelector('.train-seat-container').classList.add('d-none')
  }, 100)});
    

  $(function(){
            $('.seat').on('click',function(){ 

              document.querySelectorAll('.seat').forEach(element => {
                element.classList.remove( "selected" ); 
              });
              if($(this).hasClass( "selected" )){
                $( this ).removeClass( "selected" );                  
              }else{                   
                $( this ).addClass( "selected" );
                document.getElementById('seatShow').value = this.innerText
                document.querySelector('.train-seat-container').classList.remove('d-flex')
                document.querySelector('.train-seat-container').classList.add('d-none')
              }

            });
        });

</script>
<style>
.gradient-custom-2 {
    /* fallback for old browsers */
    background: #6a11cb;
  
    /* Chrome 10-25, Safari 5.1-6 */
    background: -webkit-linear-gradient(to bottom, rgba(106,17,203,1), rgba(37,117,252,1));
  
    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    background: linear-gradient(to bottom, rgba(106,17,203,1), rgba(37,117,252,1))
  }

@media (min-width: 768px) {
.gradient-form {
height: 100vh !important;
}
}
@media (min-width: 769px) {
.gradient-custom-2 {
border-top-right-radius: .3rem;
border-bottom-right-radius: .3rem;
}
}

*{
    font-family: 'EB Garamond', serif;
}

.seat {
    width: 20px;
    height: 20px;
    margin: 1px;
    padding-bottom: 20px;
    border: solid 1px black;
    float: left;
    text-align: center;
    cursor: pointer;
}

.clearfix { clear: both;}
.available {
    background-color: #96c131;
}

.hovering{
    cursor: pointer;
	background-color: #ae59b3;
}
.selected{
    background-color: red;
}

.train-seat-container{
  z-index: 1; 
  right:0 !important; 
  position: absolute;
   margin-right: -20px !important;
   margin-top: 50px !important;
}

    </style>
@endsection
