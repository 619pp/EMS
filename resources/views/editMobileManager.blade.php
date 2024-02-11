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
            <h3 class="feature-title">Update mobile and address</h3>

            <form action="/editMobileManager" method="POST">
                @csrf
                <input type="hidden" name="emp_id" value="{{$emp}}">
                <div class="form-group">
                    <lable>New mobile number :</lable>
                    <input type="text" name="mobile_num" class="form-control " placeholder="Enter New Mobile Number" pattern="[5-9][0-9]{9}" required>
                </div>

                <div class="form-group">
                    <lable>New communication address :</lable>
                    <input type="text" name="comm_address" class="form-control " placeholder="Enter New address">
                </div>

                <div class="form-group">
                    <lable>New city :</lable>
                    <input type="text" name="city" class="form-control " placeholder="Enter New city">
                </div><br>
                <button type="submit" class="btn btn-success">Update </button>
            </form><br><br><br>
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