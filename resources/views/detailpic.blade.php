<?php 
	session_start();
	$user_id = $_SESSION['user_id'];	
?>

@extends('master')
@section('content')

	<title>Printerous</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">

<?php
foreach ($organization as $org) {
    $org_name =  $org->name;
	$org_id =  $org->id;
}
?>

	<div class="container" style="margin-top:80px; min-height:500px">
	<div class="card">
	<div class="card-body">


	<h2 class="text-center">PIC of {{ $org_name }}</h2>
	
	<a class="btn btn-outline-success" href="/organization"> Back</a>
	<a class="btn btn-outline-success" href="/detailpic/add/{{$org_id}}"> Add New PIC</a>
	
	<br/>
	<br/>

	<table  class="table table-bordered">
		<tr>
			<th></th>
			<th>Name</th>
			<th>Phone</th>
			<th>Email</th>
			<th>Options</th>
		</tr>
		@foreach($person as $p)
		<tr>
			<td><img src="../{{ $p->avatar }}" width="50" height="50"></td>
			<td>{{ $p->name }}</td>
			<td>{{ $p->phone }}</td>
			<td>{{ $p->email }}</td>
			<td>
				<a href="/detailpic/edit/{{ $org_id }}/{{ $p->id }}">Edit</a>
				|
				<a href="/detailpic/delete/{{ $org_id }}/{{ $p->id }}">Delete</a>
			</td>
		</tr>
		@endforeach
	</table>


	</div>
	</div>
	</div>

