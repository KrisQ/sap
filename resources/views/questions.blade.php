@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col l12 s12">
          <!-- Modal Trigger -->
        <a class="waves-effect waves-light btn btn-large modal-trigger" href="#modal1">Publish new Question</a>

        <!-- Modal Structure -->
        <div id="modal1" class="modal modal-fixed-footer">
          <div class="modal-content">
            <h4>Modal Header</h4>
            <p>A bunch of text</p>
          </div>
          <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Agree</a>
          </div>
        </div>
          @php
            $row = 0
          @endphp
          <div class="row" style="margin-top: 40px;">
            @foreach ($questions as $q)
              <div class="col s12 m12 l4">
                <div class="card">
                  <div class="card-content">
                    <div class="card-title">
                      {{$q->title}}
                    </div>
                      <hr>
                      <div class="row">
                        <div class="col l6">
                          {{-- <p class="blue-text left"><i class="material-icons">flag</i> Team One</p> --}}
                          <p class="blue-text left">{{$q->teamOne->name}}</p>
                        </div>
                        <div class="col l6">
                          {{-- <p class="red-text right">Team Two <i class="material-icons">flag</i></p> --}}
                          <p class="red-text right">{{$q->teamTwo->name}}</p>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              @php
                $row++
              @endphp
              @if ($row % 3 == 0)
                </div><div class="row">
              @endif
            @endforeach
          </div>
        </div>
        <div class="center">
          {{ $questions->links() }}
        </div>

    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
  $(document).ready(function(){
    $('.modal').modal();
  });
</script>
@endsection
