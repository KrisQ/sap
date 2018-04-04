<button class="waves-effect waves-light btn-floating green modal-trigger" data-target="modal"><i class="material-icons left">edit</i></button>
  <button class="waves-effect waves-light btn-floating red delete" data-id="{{$user->id}}" data-token="{{ csrf_token() }}"><i class="material-icons left">delete</i></button>
