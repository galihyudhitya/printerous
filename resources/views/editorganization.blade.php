<?php 
	session_start();
	$user_id = $_SESSION['user_id'];	
?>

@extends('master')
@section('content')

	<title>Edit Organization</title>

	<div class="container" style="margin-top:80px; min-height:500px">
	<div class="card">
	<div class="card-body">

	<h3 class="text-center">Edit Organization</h3>

	<p class="btn btn-outline-success" style="margin-left:25%"><a href="/organization"> Back</a></p>

	@foreach($organization as $org)
	<form action="/organization/update" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}

	<table  class="table" style="width:50%; margin:auto;">
		<input type="hidden" name="id" value="{{ $org->id }}">

		<tr> <td class="text-right"> Name </td> <td> <input type="text" name="name" required="required" value="{{ $org->name }}"> </td> </tr>
		<tr> <td class="text-right"> Phone </td> <td> <input type="text" name="phone" required="required" value="{{ $org->phone }}"> </td> </tr>
		<tr> <td class="text-right"> Email </td> <td> <input type="text" name="email" required="required" value="{{ $org->email }}"> </td> </tr>
		<tr> <td class="text-right"> Website </td> <td> <input type="text" name="website" required="required" value="{{ $org->website }}"> </td> </tr>
		<tr> <td class="text-right"> Upload Logo </td> <td> <input type="file" name="logo"> </td> </tr>
		<tr> <td> </td> <td> <input type="submit" value="Save"> </td> </tr>
		
	</form>

	</table>
	@endforeach