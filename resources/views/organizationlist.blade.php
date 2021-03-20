<?php 
	session_start();
	$user_id = $_SESSION['user_id'];
?>

@extends('master')
@section('content')

<!DOCTYPE html>
<html>
<head>
	<title>Printerous</title>
</head>
<body>

	<div class="container" style="margin-top:80px; min-height:500px">
	<div class="card">
	<div class="card-body">

	<img src="image/printerous_logo2.png" width="20%">
	<h3 class="text-center">Organization Database</h3>

	<form action="/organization_search" method="GET">
	<button class="btn btn-outline-success my-2 my-sm-0 float-right" type="submit">Search</button>
	<input name="search" class="form-control mr-sm-2 float-right" style='width:150px' type="text" placeholder="Search" aria-label="Search">
	</form>

	<p><a class="btn btn-outline-success" href="/organization/add"> + Add New Organization</a></p>
	
	
	<table  class="table table-bordered">
		<tr>
			<th></th>
			<th>Name</th>
			<th>Phone</th>
			<th>Email</th>
			<th>Website</th>
			<th>Options</th>
		</tr>
		@foreach($organization as $org)
		<tr>
			<td><img src="{{ $org->logo }}" width="50" height="50"></td>
			<?php
				if ($user_id == $org->accountmanager_id || $_SESSION['auth'] == 'admin') {
					echo "<td><a href='/detail/".$org->id."' >".$org->name."</a></td>";
				} else {
					echo "<td> ".$org->name." </td>";
				}
			?>
			<td>{{ $org->phone }}</td>
			<td>{{ $org->email }}</td>
			<td>{{ $org->website }}</td>
			<td>
			<?php
				if ($user_id == $org->accountmanager_id || $_SESSION['auth'] == 'admin') {
					echo '<a href="/organization/edit/'.$org->id.'">Edit</a>';
					echo " | ";
					echo '<a href="/organization/delete/'.$org->id.'">Delete</a>';
				} else {
					echo "";
				}
			?>
			</td>
		</tr>
		@endforeach
	</table>
	<div>
	{!! $organization->links() !!}
	</div>
	</div>
	</div>
	</div>	

</body>
</html>


<style type="text/css">
	.pagination li{
		float: left;
		list-style-type: none;
		margin:5px;
	}

	svg {
		width: 30px !important;
		height: 30px !important;
	}

	.leading-5 {
		padding-top: 8px !important;
	}
</style>