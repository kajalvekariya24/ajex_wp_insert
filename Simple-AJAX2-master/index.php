<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
<title>AJAX2</title>
<style>
body{padding:5% 10%; line-height:20px; font-family:calibri;font-size:16px; text-align:center;}
.loading{max-width:100px; margin:20px;}
</style>
</head>
<body>
<div><h3>PHP simaple ajax pagination</h1></div>
<div>

<?php
include('config.php'); 
?>
<div align="center">


<div id="results"><div class="loading-div"><img src="loading.gif" ></div></div>

</div>
</div>
</body>
<script>
$(document).ready(function() {
    $("#results" ).load( "pagination.php"); //load initial records
    
    //executes code below when user click on pagination links
    $("#results").on( "click", ".pagination a", function (e){
        e.preventDefault();
        $(".loading-div").show(); //show loading element
        var page = $(this).attr("data-page"); //get page number from link
        $("#results").load("pagination.php",{"page":page}, function(){ //get content from PHP page
            $(".loading-div").hide(); //once done, hide loading element
        });
    });
});
</script>