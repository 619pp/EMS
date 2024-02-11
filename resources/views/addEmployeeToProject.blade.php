@extends('layout')
@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <h3 class="navbar-brand">EMS</h3>
    <a href={{"/login"}}><button class="btn btn-secondary my-2 my-sm-0">Logout</button></a>
  </div>
</nav>
<br>
<div class="container">
  <div class="row">
    <div style="height: 200px ;" class="col-md-6 offset-md-3 ">
      <h3 class="feature-title">Add new employee</h3>
      <form action="/addNewEmployee" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$ID}}">
        <div class="form-group">
          <lable>ID of employee :</lable>
          <input type="text" name="emp_id" class="form-control " placeholder="Enter Employee ID">
        </div>

        <div class="form-group">
          <lable>Project ID :</lable>
          <input type="text" name="proj_id" class="form-control " placeholder="Enter Project ID">
        </div>

        <div class="form-group">
          <lable>Manager ID :</lable>
          <input type="text" name="proj_manager" class="form-control " placeholder="Enter Project manager ID">
        </div><br><br>
        <button type="submit" class="btn btn-success">Add Employee </button>
      </form>
    </div>
  </div>
</div>
<footer class="bg-info text-center text-lg-start fixed-bottom">
  <div class=" text-white text-center p-4 bg-primary" ">
    © 2021 Copyright:
    <a class=" text-white fw-bold" href="#">EMS:Employee Management System</a>
  </div>
</footer>
@stop