@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col l12 s12">
          <h4>Users</h4>
          <div class="card">
            <div class="card-content">
              <button data-target="createUserModal" class="btn waves-effect modal-trigger">Create User</button>
                <form id="createUserModalForm" class="col s12">
                  {{ csrf_field() }}
                  {{-- CREATE MODAL --}}
                  <div id="createUserModal" class="modal modal-fixed-footer">
                  <div class="modal-content">
                    <h4>New User</h4>
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
    var oTable = $('#userTable').DataTable( {
       "ajax": "/users/ajax_user",
       "deferRender": true
    });
    //CREATE
    $('#newUser').click(function(){
      $.ajax({
        method: 'POST',
        data: $('#createUserModalForm').serialize(),
        url: '/users/ajax_store',
        success: function(data) {
          console.log(data);
          if (data.errors) {
            $(".message").html(data.html);
          } else {
            $(".message").html(data.html);
            oTable.ajax.reload( null, false );
          }
        },
      });
    });
    //EDIT
    $('#newUser').click(function(){
      $.ajax({
        method: 'POST',
        data: $('#editUserModalForm').serialize(),
        url: '/users/ajax_store',
        success: function(data) {
          console.log(data);
          if (data.errors) {
            $(".message").html(data.html);
          } else {
            $(".message").html(data.html);
            oTable.ajax.reload( null, false );
          }
        },
      });
    });
    //DELETE
    $('table').on('click','.delete',function(){
      var id = $(this).data("id");
      var token = $(this).data("token");
      console.log(id);
      $.ajax({
        type: 'DELETE',
        data: {
            "id": id,
            "_method": 'DELETE',
            "_token": token,
        },
        url: '/users/ajax_delete/'+id,
        success: function(data) {
          oTable.ajax.reload( null, false );
        },
      });
    });
    $('.modal').modal();
    $('select').formSelect();

  });
</script>
@endsection
