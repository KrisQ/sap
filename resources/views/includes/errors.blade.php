@if (count($errors) > 0)
<div class="row" id="alert_box">
  <div class="col s12 m12">
    <div class="card red darken-1">
      <div class="row">
        <div class="col s12 m10">
          <div class="card-content white-text">
            <h5>Oops:</h5>
            <ul>
            @foreach ($errors as $error)
              <li>{{$error}}</li>
            @endforeach
            </ul>
        </div>
      </div>
      <div class="col s12 m2">
        <i class="fa fa-times icon_style" id="alert_close" aria-hidden="true"></i>
      </div>
    </div>
   </div>
  </div>
</div>
@endif
