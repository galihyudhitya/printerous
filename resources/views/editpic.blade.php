<?php 
	session_start();
	$user_id = $_SESSION['user_id'];	
?>

@extends('master')
@section('content')

	<title>Edit PIC</title>

<?php
    foreach ($organization as $org) {
        $org_name =  $org->name;
        $org_id =  $org->id;
    }
?>

	<div class="container" style="margin-top:80px">
	<div class="card">
	<div class="card-body">

	<h3 class="text-center">Edit PIC Detail</h3>
	<p class="btn btn-outline-success" style="margin-left:25%"><a href="/detail/{{ $org_id }}"> Back</a></p>
	
	@foreach($person as $p)
	<form action="/detailpic/update" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}

	<table  class="table" style="width:50%; margin:auto;">
		<input type="hidden" name="id" value="{{ $p->id }}">
        <input type="hidden" name="organization_id" value="{{ $org_id }}">

		<tr> <td class="text-right"> Name </td> <td> <input type="text" name="name" required="required" value="{{ $p->name }}"> </td> </tr>
		<tr> <td class="text-right"> Phone </td> <td> <input type="text" name="phone" required="required" value="{{ $p->phone }}"> </td> </tr>
		<tr> <td class="text-right"> Email </td> <td> <input type="text" name="email" required="required" value="{{ $p->email }}"> </td> </tr>
		<tr> <td class="text-right"> Upload Avatar </td> <td> <input type="file" name="avatar"> </td> </tr>
		<tr> <td> </td> <td> <input type="submit" value="Save"> </td> </tr>
		
	</form>

	</table>
	@endforeach
