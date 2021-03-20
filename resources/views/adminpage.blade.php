<?php 
	session_start();
	$user_id = $_SESSION['user_id'];	
?>

@extends('master')
@section('content')

<style>
    th {
        text-align: center !important;
    }
</style>

<script>
    // document.querySelector('input[list]').addEventListener('input', function(e) {
    //     var input = e.target,
    //         list = input.getAttribute('list'),
    //         options = document.querySelectorAll('#' + list + ' option'),
    //         hiddenInput = document.getElementById(input.getAttribute('id') + '-hidden'),
    //         inputValue = input.value;

    //     hiddenInput.value = inputValue;

    //     for(var i = 0; i < options.length; i++) {
    //         var option = options[i];

    //         if(option.innerText === inputValue) {
    //             hiddenInput.value = option.getAttribute('data-value');
    //             break;
    //         }
    //     }
    // });

    function ShowForm1() {
        var x = document.getElementById("form1");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    function ShowEditButton(org_id) {
        var x = document.getElementById("am_name_"+org_id);
        var y = document.getElementById("am_edit_"+org_id);
        if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display = "none";
        } else {
            x.style.display = "none";
            y.style.display = "block";
        }
    }
</script>

<title>Organization</title>

<div class="container" style="margin-top:80px; min-height:500px">
<div class="card">
<div class="card-body">
    <div style="text-align:center">
        <h2>Assign Account Manager to Organization</h2>
        <br>
        <!-- <p><a class="btn btn-outline-success" href="#" onclick="ShowForm1()">Add Account Manager</a></p> -->
        <!-- <div id="form1" style="display:none">
            <form action="#" method="GET">
                Account Manager Name <br>
                <input type="text" name="am_name" required> <br>
                Account Manager Email <br>
                <input type="email" name="am_email" required> <br>
            </form>
        </div> -->
        <!-- <br><br>
        <p><a class="btn btn-outline-success" href="#">Assign Account Manager</a></p> -->
        <div>
                <table class="table table-bordered">
                    <th>Organization</th> <th>Account Manager</th> <th>Option</th>
                    <?php
                        foreach($accountmanager as $am) {
                            echo "<tr>";
                            echo "<td>".$am->org."</td>";
                            echo "<td style='text-align:center'>";
                                echo "<div id='am_name_".$am->org_id."'>";
                                echo $am->am;
                                echo "</div>";

                                echo "<div id='am_edit_".$am->org_id."' style='display:none'>";
                                echo "<form action='/editam' method='GET'>";
                                echo "<select name='am' id='am'>";
                                    foreach($person as $p) {
                                        if ($p->user_id == $am->am_id) {
                                            echo "<option value=".$p->user_id." selected>".$p->name."</option>";
                                        } else {
                                            echo "<option value=".$p->user_id.">".$p->name."</option>";
                                        }
                                    }
                                echo "</select>";
                                // echo "<input list='ams' name='am' id='am'>";
                                // echo "<datalist id='ams'>";
                                //     foreach($person as $p) {
                                //         echo "<option data-value=".$p->user_id.">".$p->name."</option>";
                                //     }
                                // echo "</datalist>";
                                echo "&nbsp";
                                // echo "<input type='hidden' name='am_id' id='am-hidden'>";
                                echo "<input type='hidden' name='org_id' value='".$am->org_id."'>";
                                echo "<button class='btn btn-sm btn-outline-success' type='submit'>Assign</button>";
                                echo "</form>";
                                echo "<div>";
                            echo "</td>";
                            echo "<td style='text-align:center'><button class='btn btn-sm btn-outline-success' onclick='ShowEditButton(".$am->org_id.")'>Edit</button></td>";
                            echo"</tr>";
                        }
                    ?>
                </table>
        </div>
    </div>
</div>
</div>
</div>
