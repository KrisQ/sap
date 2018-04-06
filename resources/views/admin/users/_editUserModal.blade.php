{{ csrf_field() }}
{{-- EDIT MODAL --}}
<div class="editUserModal modal modal-fixed-footer">
<div class="modal-content">
  <h4>Edit User</h4>
  <hr>
  <div class="message">

  </div>
   <div class="row">
     <input class="userEditId" type="hidden" name="id" value="{{$user->id}}">
     <div class="input-field col s4">
       <input value="{{$user->name}}" class="name validate" name="name" type="text"></input>
       <label for="name">Name:</label>
     </div>
     <div class="input-field col s4">
       <input value="{{$user->password}}" class="password validate" name="password" type="password">
       <label for="password">Password</label>
     </div>
     <div class="input-field col s4">
       <select class="role_id" name="role_id">
          @foreach ($roles as $role)
            @if ($role == $user->role )
              <option value="{{$role->id}}" selected>{{$role->name}}</option>
            @else
              <option value="{{$role->id}}">{{$role->name}}</option>
            @endif
          @endforeach
       </select>
       <label for="role_id">Role</label>
     </div>
   </div>
   <div class="row">
     <div class="input-field col s12">
       <input value="{{$user->email}}" class="email validate" name="email" type="email">
       <label for="email">Email</label>
     </div>
   </div>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-orange btn-flat">Close</a>
    <a href="#!" class="editUser waves-effect waves-orange btn-flat">Edit</a>
  </div>
</div>
