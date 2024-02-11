@extends('layout')
@section('content')
<link rel="stylesheet" href="css/main.css">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <h3 class="navbar-brand">EMS</h3>
    <a href={{"/login"}}><button class="btn btn-secondary my-2 my-sm-0">Logout</button></a>

  </div>
</nav>
<br>
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
<div class="container">
  <h4 class=" bg-info text-center">Your details </h4>

  <div class="table-responsive">
    <table class="table align-middle table-hover">
      <thead class="thead-dark">
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
      </thead>

      @foreach ($employee as $adm)
      <tr>
        <td>{{$adm->emp_id}}</td>
        <td>{{$adm->emp_firstname}}</td>
        <td>{{$adm->emp_lastname}}</td>
        <td>{{$adm->mobile_num}}</td>
        <td>{{$adm->date_of_birth}}</td>
        <td>{{$adm->gender}}</td>
        <td>{{$adm->comm_address}}</td>
        <td>{{$adm->city}}</td>
        <td>{{$adm->user_type}}</td>
        <td>{{$adm->userName}}</td>
        <td>
          <a href={{"editMobileAdminUser/".$adm->emp_id}} class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Edit </a>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
<br>

<div class="container">
  <h4 class=" bg-info text-center">Employee Register </h4>
  <div class="table-responsive">
    <table class="table align-middle table-hover">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Emp Id</th>
          <th scope="col">Register Username</th>
          <th>Operations</th>
          <th>update</th>
        </tr>
      </thead>
      <tbody>
        @foreach($employee_reg as $item)
        <tr>
          <td>{{$item['emp_id']}}</td>
          <td><a href={{"info/".$item['emp_id']."/".$adm->emp_id}}>{{$item['userName']}}</a></td>
          <td><a href={{"delete/".$item['emp_id']."/".$adm->emp_id}}>Delete</a></td>
          <td><a href={{"updateemployee/".$item['emp_id']."/".$adm->emp_id}}>Edit</a></td>

        </tr>
        @endforeach
      </tbody>
    </table>

  </div>
</div>
<br><br>

<div class="container features">
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
      <h3 class="feature-title">Add project</h3>
      <form class="form-horizontal" action="/projectInfo" method="POST">


        @csrf
        <div class="form-group">
          <label>Project Id</label>
          <div>
            <input type="number" class="form-control" name="proj_id" placeholder="enter id for project"><br><br>
            <span style="color:red">@error('proj_id'){{$message}}@enderror</span>
          </div>
        </div>

        <div class="form-group">
          <label>Project Name</label>
          <div>
            <input type="text" class="form-control" name="proj_name" placeholder="enter name for project" required><br><br>
            <span style="color:red">@error('proj_name'){{$message}}@enderror</span>
          </div>
        </div>

        <div class="form-group">
          <label>Proj Desc</label>
          <div>
            <input type="text" class="form-control" name="proj_desc" placeholder="description of project" required><br><br>
            <span style="color:red">@error('proj_desc'){{$message}}@enderror</span>
          </div>
        </div>

        <div class="form-group">
          <label>Project Start Date</label>
          <div>
            <input type="Date" class="form-control" name="proj_startdate" placeholder="enter start date" required><br><br>
            <span style="color:red">@error('proj_startdate'){{$message}}@enderror</span>
          </div>
        </div>

        <div class="form-group">
          <label>Project End Date</label>
          <div>
            <input type="Date" class="form-control" name="proj_enddate" placeholder="enter End date" required><br><br>
            <span style="color:red">@error('proj_enddate'){{$message}}@enderror</span>
          </div>
        </div>


        <button type="submit" class="btn btn-success" name="submit">Submit</button>


      </form>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12">
      <h3 class="feature-title">Search project</h3>

      <form action="/searchproject" method="POST">

        @csrf
        <div class="form-group">
          <lable>Employee ID :</lable>
          <input type="text" class="form-control" name="search" placeholder="enter id/username">
        </div>
        <br>
        <input type="hidden" name="admin_id" value="{{$adm->emp_id}}">
        <button type="submit" name="submit" class="btn btn-success">submit</button>
      </form>
      <br><br>
      <h3 class="feature-title">Check ongoing projects!</h3>

      <a href={{"/getproject/".$adm->emp_id}} class="btn btn-success"> Check Project </a>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12">
      <h3 class="feature-title">Issues</h3>
      <p>Look into the issues raised by other employees. </p>
      <a href={{"/displayAllIssue/".$adm->emp_id}} class="btn btn-success"> Issues </a><br><br><br><br><br>

      <h3 class="feature-title">Raise a issue</h3>
      <form action="/createIssueAdmin" method="POST">
        @csrf
        <input type="hidden" name="emp_id" value="{{$adm->emp_id}}">


        <div class="form-group">
          <lable>Issue Type :</lable>
          <input type="text" class="form-control" name="issue_type" placeholder="Enter issue type" required><br>
        </div>

        <div class="form-group">
          <lable>Issue Description :</lable>
          <input type="text" class="form-control" name="issue_desc" placeholder="Enter issue description" required><br>
        </div>


        <button type="submit" class="btn btn-success">Submit issue </button>
      </form>
    </div>
  </div>
  <br><br>
</div>


<footer>
  <div class=" text-white text-center p-4 bg-primary" ">
    © 2021 Copyright:
    <a class=" text-white fw-bold" href="#">EMS:Employee Management System</a>
  </div>
</footer>
<script type="text/javascript">
  setTimeout(function() {

    // Closing the alert
    $('.alert').alert('close');
  }, 2000);
</script>

@stop