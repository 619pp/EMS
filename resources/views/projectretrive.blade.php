@extends('layout')
@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <h3 class="navbar-brand">EMS</h3>
        <a href={{"/login"}}><button class="btn btn-secondary my-2 my-sm-0">Logout</button></a>

    </div>
</nav><br>
<div class="container">
    <h4 class=" bg-info text-center">Employee worked on projects so far</h4>
    <div class="table-responsive">
        <table class="table align-middle table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Project Id</th>
                    <th scope="col">Project Name</th>
                    <th scope="col">Project Desc</th>
                    <th scope="col">Project Start Date</th>
                    <th scope="col">Project End Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                <tr>
                    <th>{{$item->proj_id}}</th>
                    <td>{{$item->proj_name}}</td>
                    <td>{{$item->proj_desc}}</td>
                    <td>{{$item->proj_startdate}}</td>
                    <td>{{$item->proj_enddate}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <a href={{"/admin/".$admin_id}}><button class="btn btn-secondary">Back</button></a>
    </div>
</div>
<footer class="bg-info text-center text-lg-start fixed-bottom">
    <div class=" text-white text-center p-4 bg-primary" ">
    © 2021 Copyright:
    <a class=" text-white fw-bold" href="#">EMS:Employee Management System</a>
    </div>
</footer>

@stop