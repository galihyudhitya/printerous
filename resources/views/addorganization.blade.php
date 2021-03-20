<?php 
	session_start();
	$user_id = $_SESSION['user_id'];	
?>

@extends('master')
@section('content')

	<title>Organization</title>

	<div class="container" style="margin-top:80px; min-height:500px">
	<div class="card">
	<div class="card-body">

	<h2 class="text-center">Add Organization</h2>
	<p><a class="btn btn-outline-success" style="margin-left:25%" href="/organization"> Back</a></p>

	<form action="/organization/store" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
	<table  class="table" style="width:50%; margin:auto;">
		<tr> <td class="text-right"> Name </td> <td> <input type="text" name="name" required="required"> </td> </tr>
		<tr> <td class="text-right"> Phone </td> <td> <input type="tel" name="phone" placeholder="exp: +62123456789" required="required" pattern="^[+]?[0-9]{9,12}$"> </td> </tr>
		<tr> <td class="text-right"> Email </td> <td> <input type="email" name="email" required="required" pattern="[a-z0-9._-]+@[a-z0-9.-]+\.[a-z]{2,4}$"> </td> </tr>
		<tr> <td class="text-right"> Website </td> <td> <input type="text" name="website" required="required"> </td> </tr>
		<tr> <td class="text-right"> Upload Logo </td> <td> <input type="file" name="logo" required="required"> </td> </tr>
		<tr> <td class="text-right"> Account Manager </td> <td>
			<?php
				echo "<select name='am' id='am'>";
					echo "<option></option>";
					foreach($person as $p) {
						echo "<option value=".$p->user_id.">".$p->name."</option>";
					}
				echo "</select>";
			?>
		</td> </tr>
		<tr> <td> </td> <td> <input type="submit" value="Save"> </td> </tr>
		
	</form>

	</table>

	</div>
	</div>
	</div>