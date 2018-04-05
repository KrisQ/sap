@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col l12 s12">
          <h4>Users</h4>
          <div class="card">
            <div class="card-content">
              <button data-target="createUserModal" class="btn waves-effect modal-trigger">Create User</button>
                <form enctype="multipart/form-data" id="createUserModalForm" method="post" class="col s12 form" >
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
                  </div>
                  <div class="modal-footer">
                    <a href="#!" class="modal-action modal-close waves-effect waves-orange btn-flat">Close</a>
                    <button type="submit" class="waves-effect waves-orange btn-flat" id="newUser">Create</button>
                  </div>
                </div>
              </form>
              <form class="editUserModalForm col s12">
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
    $('#createUserModalForm').submit(function(event){
      event.preventDefault();
      $.ajax({
        method: 'POST',
        data: $('#createUserModalForm').serialize(),
        processData: false,
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
    //EDIT MODAL
    $('table').on('click','.edit',function(){
      var id = $(this).data("id");
      var token = $(this).data("token");
      console.log(id);
      $.ajax({
        method: 'GET',
        data: {
            "id": id,
            "_token": token,
        },
        url: '/users/ajax_edit/'+id,
        success: function(data) {
          $('.editUserModalForm').html(data.html);
          $('select').formSelect();
          var elem = document.querySelector('.editUserModal');
          var instance = M.Modal.init(elem);
          M.updateTextFields();
          instance.open();
        },
      });
    });
    //UPDATE
    $('.editUserModalForm').on('click','.editUser',function(){
      var id = $('.userEditId').val();
      $.ajax({
        method: 'PUT',
        data: $('.editUserModalForm').serialize(),
        url: '/users/ajax_update/'+id,
        success: function(data) {
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
        method: 'DELETE',
        data: {
            "id": id,
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
