<!doctype html>
<html lang="en">
  <head>
  	<title>Deneher</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="shortcut icon" href="https://www.danaher.com/themes/danaher_bootstrap/favicon.ico" type="image/vnd.microsoft.icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css')}}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <link href="http://go.pardot.com/css/form.css?ver=20121030" rel="stylesheet" type="text/css">
    <script src="https://use.fontawesome.com/81ede17d59.js"></script>
  </head>
  <body>

		<div class="wrapper d-flex align-items-stretch">
			@include('layouts/navbar')

            <!-- Page Content  -->
            <div id="content" class="p-4 p-md-5 pt-5">
                <div class="container-fluid">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addLead">
                        Add Lead
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="addLead" tabindex="-1" aria-labelledby="addLeadLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addLeadLabel">ADD LEAD</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <style>
                                    form.form input.text {
                                    min-height: 40px;
                                    }
                                </style>
                                <form accept-charset="UTF-8" action="{{ route('add-lead')}}" class="form" id="pardot-form" method="post" name="pardot-form">
                                    @csrf
                                    <div class="form-field pd-text required">
                                      <input class="text" id="name" maxlength="40" name="name" onchange="" size="30" type="text" value="" required> <label for="name">Name</label>
                                      <div id="error_for_name" style="display:none"></div>
                                    </div>
                                    <div class="form-field pd-text required">
                                      <input class="text" id="value" name="value" onchange="" size="30" type="number" value="" required> <label for="value">Value</label>
                                      <div id="error_for_value" style="display:none"></div>
                                    </div>
                                    <div class="form-field pd-text required">
                                      <input class="text" id="segment" maxlength="80" name="segment" onchange="" size="30" type="text" value="" required> <label for="segment">Segment</label>
                                      <div id="error_for_segment" style="display:none"></div>
                                    </div>
                                    <div class="form-field pd-text required">
                                      <input class="text floatLabel" id="by" maxlength="255" name="by" onchange="piAjax.auditEmailField(this, 93172, 2132, 2252);" size="30" type="email" value="{{Auth::user()->email}}" placeholder="{{Auth::user()->email}}" required> <label for="by">Submitted By</label>
                                      <div id="error_for_by" style="display:none"></div>
                                    </div>
                                    <div class="form-field pd-text required">
                                      <input class="text" id="for" maxlength="255" name="for" onchange="" size="30" type="email" value="" required> <label for="for">Submitted For</label>
                                      <div id="error_for_for" style="display:none"></div>
                                    </div>
                                    <div class="form-field pd-textarea required">
                                      <textarea class="standard" cols="40" id="address" name="address" onchange="" rows="10" required style="padding: 12px; padding-top: 15px;"></textarea> <label for="address">Details</label>
                                      <div id="error_for_address" style="display:none"></div>
                                    </div>
                                    <input type="submit" value="Submit">
                                </form>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div id="app">
                    <div class="container-fluid">
                        <leads-submitted></leads-submitted>
                    </div>
                </div>
            </div>

		</div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/sidebar.js') }}"></script>
        <script>
            $("input[type=text], input[type=email], input[type=number], select, textarea").addClass("floatLabel");
              function floatLabel(inputType) {
                $(inputType).each(function () {
                  var $this = $(this);
                  // on focus add classs active to label
                  $this.focus(function () {
                    $this.next().addClass("active");
                  });
                  //on blur check field and remove class if needed
                  $this.blur(function () {
                    if ($this.val() === "" || $this.val() === "blank") {
                      $this.next().removeClass();
                    }
                  });
                  //manager the prepopulated values
                  if ($this.val() != "") {
                    $this.closest(".form-field").find("label").addClass("active");
                  }
                });
              }
              floatLabel(".floatLabel");
        </script>
  </body>
</html>
