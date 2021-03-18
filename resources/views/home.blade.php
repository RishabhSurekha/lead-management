<!doctype html>
<html lang="en">
  <head>
  	<title>Deneher</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="shortcut icon" href="https://www.danaher.com/themes/danaher_bootstrap/favicon.ico" type="image/vnd.microsoft.icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="css/sidebar.css">
    <script src="https://use.fontawesome.com/81ede17d59.js"></script>
  </head>
  <body>

		<div class="wrapper d-flex align-items-stretch">
			@include('layouts/navbar')

            <!-- Page Content  -->
            <div id="content" class="p-4 p-md-5 pt-5">
                <div id="app">
                    <div class="container-fluid" style="border: 2px solid black; border-radius: 10px; padding-top: 3em; padding-bottom: 3em;">
                        <div class="row">
                            <div class="col-4">
                                <img src="{{ asset('img/ID-Card.png') }}" alt="" style="width: 100%;">
                            </div>
                            <div class="col-8 pt-5">
                                <h2>Name: {{Auth::user()->name}}</span></h2>
                                <hr>
                                <h2>OpCo: {{Auth::user()->opco}}</h2>
                                <hr>
                                <h2>Email: {{Auth::user()->email}}</h2>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

		</div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/sidebar.js') }}"></script>
  </body>
</html>
