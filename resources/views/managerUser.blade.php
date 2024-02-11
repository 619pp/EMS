@extends('layout')
@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <h3 class="navbar-brand">EMS</h3>
    <a href={{"/login"}}><button class="btn btn-secondary my-2 my-sm-0">Logout</button></a>

  </div>
</nav>
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
  <h5 class="text-center">
    {{Session::get('success')}}
  </h5>


</div>
@endif
@if(Session::has('fail'))
<div class="alert alert-danger" role="alert">
  <h5 class="text-center">
    {{Session::get('fail')}}
  </h5>

</div>
@endif
<br>
<div class="container">
  <h4 class=" bg-info text-center">Your details </h4>
  <div class="table-responsive">
    <table class="table align-middle table-hover">
      <tr>
        <td scope="col">Id</td>
        <td scope="col">Firstname</td>
        <td scope="col">Lastname</td>
        <td scope="col">Mobile</td>
        <td scope="col">DOB</td>
        <td scope="col">gender</td>
        <td scope="col">Address</td>
        <td scope="col">City</td>
        <td scope="col">User Type</td>
        <td scope="col">UserName</td>

        <td scope="col">Operation</td>
      </tr>
      @foreach ($employee as $emp)
      <tr>
        <td>{{$emp->emp_id}}</td>
        <td>{{$emp->emp_firstname}}</td>
        <td>{{$emp->emp_lastname}}</td>
        <td>{{$emp->mobile_num}}</td>
        <td>{{$emp->date_of_birth}}</td>
        <td>{{$emp->gender}}</td>
        <td>{{$emp->comm_address}}</td>
        <td>{{$emp->city}}</td>
        <td>{{$emp->user_type}}</td>
        <td>{{$emp->userName}}</td>

        <td>
          <a href={{"editMobile/".$emp->emp_id}} class="btn btn-success">Edit</a>
        </td>
      </tr>
      @endforeach
    </table>
  </div>

</div>
<div class="container">
  <h4 class=" bg-info text-center">Employee Reported to You </h4>
  <div class="table-responsive">
    <table class="table align-middle table-hover">
      <tr>
        <td scope="col">emp_id</td>
        <td scope="col">emp_firstname</td>
        <td scope="col">emp_lastname</td>
        <td scope="col">mobile_num</td>

        <td scope="col">gender</td>
        <td scope="col">comm_address</td>
        <td scope="col">city</td>


        <td scope="col">Operation</td>
      </tr>

      @foreach ($reported as $rep)
      <tr class="table-active">
        <td>{{$rep->emp_id}}</td>
        <td>{{$rep->emp_firstname}}</td>
        <td>{{$rep->emp_lastname}}</td>
        <td>{{$rep->mobile_num}}</td>

        <td>{{$rep->gender}}</td>
        <td>{{$rep->comm_address}}</td>
        <td>{{$rep->city}}</td>

        <td>
          <a href={{"deleteRepotee/".$rep->emp_id."/".$emp->emp_id}}>Remove This Employee</a>
        </td>
      </tr>
      @endforeach
    </table>
  </div>

</div>


<br><br><br>





<div class="container features">
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
      <h3 class="feature-title">Add Employee</h3>

      <p>To add New employee to project click on "Add"! </p>
      <a href={{"/addEmployee/".$emp->emp_id}} class="btn btn-success"> Add </a>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12">
      <h3 class="feature-title">Issues</h3>

      <p>Look into the issues raised by other employees. </p>
      <a href={{"/displayIssue/".$emp->emp_id}} class="btn btn-success"> Issues </a>
    </div>



    <div class="col-lg-4 col-md-4 col-sm-12">
      <h3 class="feature-title">Raise a issue!</h3>
      <form action="/create" method="POST">
        @csrf
        <input type="hidden" name="emp_id" value="{{$emp->emp_id}}">


        <div class="form-group">
          <lable>Issue Type :</lable>
          <input type="text" name="issue_type" class="form-control " placeholder="Enter issue type" required>
        </div>

        <div class="form-group">
          <lable>Issue Description :</lable>
          <input type="text" name="issue_desc" class="form-control " placeholder="Enter issue description" required><br>
        </div>


        <button type="submit" class="btn btn-success">Submit issue </button><br>
        <br><br><br>
      </form>

    </div>
  </div>
</div>
<footer>
  <div class=" text-white text-center p-4 bg-primary" ">
    © 2021 Copyright:
    <a class=" text-white fw-bold" href="#">EMS:Employee Management System</a>
  </div>
</footer>
@stop