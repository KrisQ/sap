<form id="createUserModalForm" class="col s12">
  <input id="token" type="hidden" name="_token" value="{{csrf_token()}}">
    {{-- EDIT MODAL --}}
  <div id="createUserModal" class="modal modal-fixed-footer">
  <div class="modal-content">
    <h4>Edit User</h4>
    <hr>
    <div class="message">

    </div>
     <div class="row">
       <div class="input-field col s4">
         <input id="name" name="name" type="text" class="validate">
         <label for="name">Name:</label>
       </div>
       <div class="input-field col s4">
         <input id="password" name="password" type="password" class="validate">
         <label for="password">Password</label>
       </div>
       <div class="input-field col s4">
         <select id="role_id" name="role_id">
           <option value="" disabled selected>SELECT</option>
            @foreach ($roles as $role)
            <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
         </select>
         <label for="role_id">Role</label>
       </div>
     </div>
     <div class="row">
       <div class="input-field col s12">
         <input id="email" name="email" type="email" class="validate">
         <label for="email">Email</label>
       </div>
     </div>
     <div class="row">
       <div class="file-field input-field col s12">
         <div class="btn">
           <span>File</span>
           <input type="file">
         </div>
         <div class="file-path-wrapper">
           <input class="file-path validate" type="text">
         </div>
       </div>
     </div>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-orange btn-flat">Close</a>
    <input class="waves-effect waves-orange waves-orange btn-flat" id="newUser" type="button" value="Create">
  </div>
</div>
</form>
