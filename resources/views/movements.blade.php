<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/donasi.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>SEPIK 2022 - Donasi</title>
    
    <!-- icon bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    </head>
<body>
    @extends('layouts.sidebar')
    <button id="tooglebar" onclick="openNav()" style="background-color: transparent; z-index: 0; position: absolute; margin-left: 10%;"><i class="fas fa-bars fa-2x"></i></button>
    <div class="container">
        <!-- heading / judul -->
        <div class="mt-4 p-5 rounded bold text-center">
            <h1 class="my-4">ADMIN PENGGALANGAN DANA SEPIK 2022</h1>
            <img src="/img/semanggi.png" alt="semanggi" width='50px'>
        </div>

        <!-- Data table Pendonasi -->

        <div class="row justify-content-center px-4">
            <div class="col-sm-12 col-md-11 col-xl-11 table-responsive">
                <table id="table_donasi" class="table table-bordered table-striped table-hover table-light">
                    <thead>
                        <tr>
                            <th>names</th>
                            <th>universities</th>
                            <th>identifications</th>
                            <th>line_ids</th>
                            <th>whatsapp_numbers</th>
                            <th>twibbon_links</th>
                            <th>instagram_usernames</th>
                            <th>id_proof_link</th>
                            <th>photo_link</th>
                            <th>transfer_proof</th>
                            <th>story_proof_link</th>
                            <th>file_proof_link</th>
                            <th>edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($movements as $m)
                            <tr>
                                <td>
                                @foreach(($m->names) as $x)
                                    @if($loop->last)
                                        {{ $x }}
                                    @else
                                        {{ $x . ', ' }}
                                    @endif
                                @endforeach
                                </td>
                                
                                <td>
                                @foreach(($m->universities) as $x)
                                    @if($loop->last)
                                        {{ $x }}
                                    @else
                                        {{ $x . ', ' }}
                                    @endif
                                @endforeach
                                </td>
                                
                                <td>
                                @foreach(($m->identifications) as $x)
                                    @if($loop->last)
                                        {{ $x }}
                                    @else
                                        {{ $x . ', ' }}
                                    @endif
                                @endforeach
                                </td>
                                
                                <td>
                                @foreach(($m->line_ids) as $x)
                                    @if($loop->last)
                                        {{ $x }}
                                    @else
                                        {{ $x . ', ' }}
                                    @endif
                                @endforeach
                                </td>

                                <td>
                                @foreach(($m->whatsapp_numbers) as $x)
                                    @if($loop->last)
                                        {{ $x }}
                                    @else
                                        {{ $x . ', ' }}
                                    @endif
                                @endforeach
                                </td>

                                
                                <td><?= str_replace('\/', '/', json_encode($m->twibbon_links)); ?></td>
                                

                                <td>
                                @foreach(($m->instagram_usernames) as $x)
                                    @if($loop->last)
                                        {{ $x }}
                                    @else
                                        {{ $x . ', ' }}
                                    @endif
                                @endforeach
                                </td>

                                <td>
                                    <a target="_blank" class="btn btn-sepik myImg" href="{{ $m->id_proof_link }}">Show</a>
                                </td>

                                <td>
                                    <a target="_blank" class="btn btn-sepik myImg" href="{{ $m->photo_link }}">Show</a>
                                </td>

                                <td>
                                    <a target="_blank" class="btn btn-sepik myImg" href="{{ $m->transfer_proof }}">Show</a>
                                </td>

                                <td>
                                    <a target="_blank" class="btn btn-sepik myImg" href="{{ $m->story_proof_link }}">Show</a>
                                </td>

                                <td>
                                    <a target="_blank" class="btn btn-sepik myImg" href="{{ $m->file_proof_link }}">Show</a>
                                </td>


                                <form action="/movements" method="post">
                                @csrf
                                <td class="edit" id="{{ $m->id }}">
                                        <button type="button" class="btn btn-lg" data-bs-toggle="popover">
                                        @if ($m->verification_status === "UNVERIFIED")
                                            <i class="bi bi-exclamation-circle-fill text-warning"></i>
                                        @elseif ($m->verification_status === "VERIFIED")
                                            <i class="bi bi-check-circle-fill text-success"></i>
                                        @elseif ($m->verification_status === "REJECTED")
                                            <i class="bi bi-x-circle-fill text-danger"></i>
                                        @endif
                                        </button>

                                        <select class="form-control" name="changeTo" id="">
                                            <option>VERIFIED</option>
                                            <option>REJECTED</option>
                                            <option>UNVERIFIED</option>
                                        </select>
                                        <input type="hidden" name="id" value="{{ $m->id }}">
                                        <button class="btn btn-success" type="submit">save</button>
                                        <!--<div class="data" style="display: none">{{ $m->verification_status }}</div> -->
                                    </td>
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- toast for notif -->
    <div class="toast" style="position: fixed; bottom: 10px; right: 10px; z-index: 3">
        <div class="toast-header">
            <strong class="me-auto text-info">NOTIFICATION</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body">
            <p>Sukses</p>
        </div>
    </div>


    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- data table -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>

<!-- data table boostrap -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

<!-- js bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- <script src="/js/movements.js"></script> -->
<script>
    var table;

$(document).ready(function () {

    if ($("#table_donasi").length > 0) {
        initDataTable();
        updateTable();
        setPopover();
    }

    initTooltip();

});

function initDataTable() {

    //init data table
    var select;
    table = $('#table_donasi').DataTable({
        "order": [],
        initComplete: function () {
            
        }
    });
}

function setPopover() {
    $('[data-bs-toggle="popover"]').popover({
        template: `
            <div class="popover">
                <div class="popover-arrow"></div>
                <h3 class="popover-header"></h3>
                <div class="popover-body"></div>
            </div>`,
        trigger: "focus",
        html: true,
        title: "EDIT",
        content: `
            <i class="btn btn-outline-secondary btn-edit bi bi-check-circle-fill text-success" id="VERIFIED"></i>
            <i class="btn btn-outline-secondary btn-edit bi bi-x-circle-fill text-danger" id="REJECTED"></i>
            <i class="btn btn-outline-secondary btn-edit bi bi-exclamation-circle-fill text-warning" id="UNVERIFIED"></i>
        `
    });
}

function updateTable() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //get id
    $(".edit").click(function (){
        id = $(this).attr("id");
        data = $(".data", this).text();
    });

    //klo btn-edit diclick update ke db
    $(document).on('click', '.btn-edit', function (){
        changeTo = $(this).attr("id");
        

        // send ajax
        $.ajax({
            url: "/movements",
            method: "POST",
            data: {
                id: id,
                data: data,
                changeTo: changeTo
            },

            success: function (result){
                alert("chech");
                if (result) {
                    $(".toast-body").html("<h5>Sukses Update</h5>");
                    updateData(id, changeTo);
                }else{
                    $(".toast-body").html("<h5>Gagal Update</h5>");
                }

                //trigger toast to show
                showToast();
            },
            error: function (error){

            }
        });
        
    });
}

function showToast() {
    var toastElList = [].slice.call(document.querySelectorAll('.toast'))
    var toastList = toastElList.map(function (toastEl) {
        return new bootstrap.Toast(toastEl)
    })
    toastList.forEach(toast => toast.show())
}

function updateData(id, changeTo) {
    
    icon = [];
    icon[2] = '<i class="bi bi-exclamation-circle-fill text-warning"></i>';
    icon[1] = '<i class="bi bi-check-circle-fill text-success"></i>';
    icon[0] = '<i class="bi bi-x-circle-fill text-danger"></i>';

    fill = `<button type="button" class="btn btn-lg" data-bs-toggle="popover">`;
    fill += icon[changeTo];
    fill += `</button>`;
    fill += `<div class="data" style="display: none">` + changeTo +`</div>`;

    cell = $(".edit#" + id);
    $(".edit#" + id).children("button").html(icon[changeTo]);
    $(".edit#" + id).children(".data").text(changeTo);

    table.cell(cell).data(fill);

    // table.order( [[6, 'desc'], [4, 'desc']] ).draw();
    setPopover();
}

function initTooltip() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
    })
}

</script>
<script type="text/javascript">
    $(document).ready(function () {
          var screenWidth = window.screen.width;

          if (screenWidth<=400){
              $('#haha2').show();
              $('#haha').hide();

          }
          else{
              $('#haha').show();
              $('#haha2').hide();

          }

    });



                var s = skrollr.init();
        // $("body").fadeOut(1000, function(){redirectPage('home.html')});
    // 		$( "#banner" ).click(function() {
    //   $("body").fadeOut(1000);
    //   location.replace("https://www.w3schools.com");
    // });

    // $('.container-fluid').attr('data-1000','transform:translateX(-900%)');
    // alert($('.container-fluid').attr('data-1000'));
    $(document).on('click', "#banner", function(event) {
    event.preventDefault();
    linkLocation = 'www.youtube.com';
    $("body").fadeOut(1000, function(){location.replace("login.html")});
    });


    function openNav() {
    document.getElementById("mySidebar").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    }

    /* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
    function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
    }

</script>
</body>


