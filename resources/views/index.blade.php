@extends('layout')
<!DOCTYPE html>
<link href="https://fonts.googleapis.com/css2?family=EB+Garamond&wght@500&display=swap" rel="stylesheet">
<link href="https://img.icons8.com/cotton/64/null/train--v2.png" rel="icon">
<nav class="navbar gradient-custom-2 rounded-0">
  <div class="container-fluid">
  <a href="{{ route('tickets.index') }}" style="text-decoration: none;"><span class="navbar-brand h1 fw-bold text-light"><img src="https://img.icons8.com/cotton/32/null/train--v2.png" class="me-2 mb-1">Ticket Station</span></a>
  </div>
</nav>
@section('content')
<div class="uper pt-5">
  @if(session()->get('success'))
  <div class="alert alert-success">
    {{ session()->get('success') }}
  </div><br/>
  @endif
  @if(session()->get('error'))
  <div class="alert alert-danger">
    {{ session()->get('error') }}
  </div><br/>
  @endif
  <a href="{{ route('tickets.create')}}" class="btn btn-success fw-semibold text-white">Issue a ticket</a>
  <span class="fw-bold ms-2" id="currentDate">{{ now()->format('d-M-Y') }}</span><span class="fw-bold ms-3" id="currentTime"></span>
  <div class="float-end">
    Welcome, <span class="fw-bold me-2">{{ Auth::user()->name }}</span>
    <a href="{{ route('logout') }}" class="btn btn-dark fw-semibold" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      {{ __('Log out') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  </div>
  <table class="table table-striped border mt-4 table-hover">
    <thead>
      <tr>
        <td class="border fw-bold">Ticket №:</td>
        <td class="border fw-bold">Line №:</td>
        <td class="border fw-bold">From:</td>
        <td class="border fw-bold">To:</td>
        <td class="border fw-bold">Departure date:</td>
        <td class="border fw-bold">Class:</td>
        <td class="border fw-bold">Seat:</td>
        <td class="border fw-bold">Price:</td>
        <td class="border fw-bold">Discount %:</td>
        <td class="border fw-bold">Price with discount:</td>
        <td class="border fw-bold">Issue date:</td>
        <td colspan="10" class="border fw-bold text-center">Actions</td>
      </tr>
    </thead>
    <tbody id="tableBody">
      @foreach($tickets as $ticket)
      <tr>
        <td class="border">{{$ticket->id}}</td>
        <td class="border">{{$ticket->line_number}}</td>
        <td class="border">{{$ticket->from}}</td>
        <td class="border">{{$ticket->to}}</td>
        <td class="border">{{$ticket->departure_date}}</td>
        <td class="border">{{$ticket->class}}</td>
        <td class="border">{{$ticket->seat}}</td>
        <td class="border">{{$ticket->price=number_format($ticket->price, 2)}} €</td>
        <td class="border">{{$ticket->discount}} %</td>
        <td class="border">{{sprintf('%0.2f',$ticket->price-($ticket->price*$ticket->discount/100))}} €</td>
        <td class="border issue_time">{{$ticket->updated_at->format('d-m-Y')}}</td>
        <td class="border">
          @if(Auth::user()->isAdmin==1)
          <a href="{{ route('tickets.edit', $ticket->id)}}" class="btn btn-primary fw-semibold">Edit</a>
          @endif
        </td>
        <td>
          @if(Auth::user()->isAdmin==1)
          <button class="btn btn-danger fw-semibold" data-bs-toggle="modal" data-bs-target="#Deletion_Form_{{$ticket->id}}" data-action="{{ route('tickets.destroy', $ticket->id) }}">Delete</button>
          <!-- Modal -->
          @if(Auth::user()->isAdmin==1)
          <div class="modal fade" id="Deletion_Form_{{$ticket->id}}" data-backdrop="static" tabindex="-1" aria-labelledby="Deletion_Form_Label" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <form action="{{ route('tickets.destroy', $ticket->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="Deletion_Form_Label_Question">Do you really want to continue?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Selected ticket will be deleted forever!
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Go Back</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          @endif
          @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $tickets->links() }}
  <div>
    @endsection
    <script>
      // setTimeout(function(){
      //   var issueTime = document.querySelectorAll('.issue_time');

      //     for (var newTime of issueTime) {
      //       const time = newTime.innerText.split(" ")[1]
      //       const timeArr = time.split(":")
      //       var timeSec = Number(timeArr[0]) * 3600 + Number(timeArr[1]) * 60 + Number(timeArr[2]) + 3600
      //       let hours = parseInt(timeSec / 3600);
      //     let minutes = parseInt(timeSec % 3600 / 60);
      //     let seconds = parseInt(timeSec % 3600 % 60);
      //     if(hours < 10){
      //     hours = "0" + hours
      //     }
      //     if(minutes < 10){
      //     minutes = "0" + minutes
      //     }
      //     if(seconds < 10){
      //     seconds = "0" + seconds
      //     }
      //     if(hours > 23){
      //       hours = "0" + 0
      //     }
      //     var timeNew = hours + ":" + minutes + ":" + seconds
      //     newTime.innerText = newTime.innerText.split(" ")[0] + " " + String(timeNew);
      //     }},100)
      
      document.addEventListener('DOMContentLoaded',function(){
        startTime();
      })

  function startTime() {
    const today = new Date();
    let h = today.getHours();
    let m = today.getMinutes();
    let s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    if (h < 10){
      document.getElementById('currentTime').innerHTML =  "0" + h + ":" + m + ":" + s;
    setTimeout(startTime, 1000);
    }
    else{
        document.getElementById('currentTime').innerHTML =  h + ":" + m + ":" + s;
        setTimeout(startTime, 1000);
      }
  }

  function checkTime(i) {
    if (i < 10) {i = "0" + i};
    return i;
  }
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
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
    </style>