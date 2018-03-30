@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col l12 s12">
          <h4>Users</h4>
          <div class="card">
            <div class="card-content">
              <button data-target="createUserModal" class="btn waves-effect modal-trigger">Create User</button>
                <form class="col s12">
                  @csrf
                  <div id="createUserModal" class="modal modal-fixed-footer">
                  <div class="modal-content">
                    <h4>New User</h4>
                    <hr>
                     <div class="row">
                       <div class="input-field col s4">
                         <input name="name" type="text" class="validate">
                         <label for="name">Name:</label>
                       </div>
                       <div class="input-field col s4">
                         <input name="password" type="password" class="validate">
                         <label for="password">Password</label>
                       </div>
                       <div class="input-field col s4">
                         <select name="role_id">
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
                         <input name="email" type="email" class="validate">
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
                    <input class="waves-effect waves-orange waves-orange btn-flat" type="submit" value="Create">
                  </div>
                </div>
              </form>

              <br><br>
              <table id="userTable" class="striped">
                <thead>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th width="80px">Actions</th>
                </thead>
                <tbody>
                </tbody>
              </table>

            </div>
          </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
  $(document).ready(function(){

    $('#userTable').DataTable( {
       "ajax": "/ajax_user",
       "deferRender": true
    });

    $('.modal').modal();
    $('select').formSelect();
  });
</script>
@endsection
