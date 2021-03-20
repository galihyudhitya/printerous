<?php 
	session_start();
	$user_id = $_SESSION['user_id'];	
?>

@extends('master')
@section('content')

	<title>Add PIC</title>

<?php
    foreach ($organization as $org) {
        $org_name =  $org->name;
        $org_id =  $org->id;
    }
?>

	<div class="container" style="margin-top:80px">
	<div class="card">
	<div class="card-body">

	<h2 class="text-center">Add PIC for {{ $org_name }}</h2>
	<p><a href="/detail/{{ $org_id }}" class="btn btn-outline-success" style="margin-left:25%"> Back</a></p>
	
	<form action="/detailpic/store" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
	<table  class="table" style="width:50%; margin:auto;">
        <input type="hidden" name="organization_id" value="{{ $org_id }}">
		
		<tr> <td class="text-right"> Name </td> <td> <input type="text" name="name" required="required"> </td> </tr>
		<tr> <td class="text-right"> Phone </td> <td> <input type="tel" placeholder="exp: +62123456789" pattern="^[+]?[0-9]{9,12}$" name="phone" required="required"> </td> </tr>
		<tr> <td class="text-right"> Email </td> <td> <input type="email" name="email" required="required" pattern="[a-z0-9._-]+@[a-z0-9.-]+\.[a-z]{2,4}$"> </td> </tr>
		<tr> <td class="text-right"> Upload Avatar </td> <td> <input type="file" name="avatar" required="required"> </td> </tr>
		<tr> <td> </td> <td> <input type="submit" value="Save"> </td> </tr>
		
	</form>

	</table>