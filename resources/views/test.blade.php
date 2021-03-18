<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon_logo.png') }}">
    <title>CA Admin | Techfest</title>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-81222017-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-81222017-1');
    </script>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table.min.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <script src="https://use.fontawesome.com/81ede17d59.js"></script>
</head>

<body>
    <div class="wrapper d-flex align-items-stretch">
        @include('layouts/navbar')

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <div id="toolbar" class="select">
                <select class="form-control">
                    <option value="">Export Basic</option>
                    <option value="all">Export All</option>
                </select>
            </div>
            <table id="table" class="table table-striped" data-toggle="table" data-pagination="true" data-search="true" data-pagination-pre-text="Previous" data-pagination-next-text="Next" data-pagination-h-align="left" data-pagination-detail-h-align="right" data-page-list="[10, 50, 100, 1000, All]" data-toolbar="#toolbar"  data-click-to-select="true"  data-show-toggle="true" data-show-pagination-switch="true" data-show-export="true" data-show-print="true">
                <thead>
                <tr>
                    <th data-field="name" data-sortable="true" data-switchable="false" scope="col">Name</th>
                    <th data-field="value" data-sortable="true" scope="col">Value</th>
                    <th data-field="segment" data-sortable="true" scope="col">Segment</th>
                    <th data-field="details" data-sortable="true" scope="col">Details</th>
                    <th data-field="by" data-sortable="true" scope="col">Submitted By</th>
                    <th data-field="for" data-sortable="true" scope="col">Assigned To</th>
                    <th data-field="status" data-sortable="true" scope="col">Status</th>
                    <th data-field="created_at" data-sortable="true" scope="col">Created At</th>
                    <th data-field="validated_at" data-sortable="true" scope="col">Validated/Rejected At</th>
                    <th data-field="closed_at" data-sortable="true" scope="col">Closed At</th>
                    <th data-field="updated_at" data-sortable="true" scope="col">Updated At</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($leads as $lead)
                    <tr>
                        <td>{{$lead->name}}</td>
                        <td>{{$lead->value}}</td>
                        <td>{{$lead->segment}}</td>
                        <td>{{$lead->address}}</td>
                        <td>{{$lead->by}}</td>
                        <td>{{$lead->for}}</td>
                        <td>{{$lead->status}}</td>
                        <td>{{$lead->created_at}}</td>
                        <td>validated at</td>
                        <td>closed at</td>
                        <td>{{$lead->updated_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
    <script src="https://unpkg.com/tableexport.jquery.plugin/libs/jsPDF/jspdf.min.js"></script>
    <script src="https://unpkg.com/tableexport.jquery.plugin/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table.min.js"></script>
    <script src="{{asset('js/bootstrap-table-print.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-table-export.min.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            var table = $('#table');

            $('select').on('change', function(){
                if($(this).val() == 'selected'){
                    table.bootstrapTable('showColumn', 'state');
                } else{
                    table.bootstrapTable('hideColumn', 'state');
                }
                table.bootstrapTable({
                    exportDataType: $(this).val(),
                    exportTypes: ['json', 'xml', 'csv', 'txt', 'sql', 'excel', 'pdf'],
                });
            });
        });
    </script>
</body>

</html>


