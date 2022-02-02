var table;

$(document).ready(function () {

    if ($("#table_donasi").length > 0) {
        initDataTable();
        updateTable();
        setPopover();
    }

    if ($("#btn-copy").length > 0) {
        copyButton();
    }

    countDown();
    modalImage();
    initTooltip();

    //untuk kategori
    $('#kategori').on('change', function () {
        if ($('#kategori').val() == 'umum') {
            $('.sumber').fadeOut();
            $('#sumber').val('umum');
            $('#nrp').val("-")
        } else {
            $('.sumber').fadeIn();
            $('#sumber').val('ukp');
            $('#nrp').val("")
        }
    });
});

function initDataTable() {

    //init data table
    var select;
    table = $('#table_donasi').DataTable({
        "order": [],
        initComplete: function () {
            // Apply the dropdown search for column kategory and konfirmasi only
            this.api().columns(2).every(function () {
                var column = this;
                select = $('<select class="form-select"><option value=""></option></select>')
                    .appendTo( $(column.header()) )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
                
            });

            //append option to column kategory
            select = $("select", "#kategori");
            select.append( '<option val="Universitas Kristen Petra" > Universitas Kristen Petra </option>' );
            select.append( '<option val="Universitas Ciputra" > Universitas Ciputra </option>' );
            select.append( '<option val="Universitas Katolik Widya Mandala" > Universitas Katolik Widya Mandala </option>' );
            select.append( '<option val="Universitas Surabaya" > Universitas Surabaya </option>' );
            select.append( '<option val="Umum" > Umum </option>' );

            this.api().columns(6).every(function () {
                var column = this;
                select = $('<select class="form-select"><option value=""></option></select>')
                    .appendTo( $(column.header()) )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val  )
                            .draw();
                    } );
                
            });

            //append option to column konfirmasi
            select = $("select", "#konfirmasi");
            select.append( '<option value="2" >  Belum dikonfirmasi</option>' );
            select.append( '<option value="1" >  Verified</option>' );
            select.append( '<option value="0" >  Data salah</option>' );
            
            //append input search to column nama and nrp (bukti but disabled)
            $("#nama").append('<input class="form-control" type="text" />');
            $("#nrp").append('<input class="form-control" type="text" />');
            $("#nominal").append('<input class="form-control" type="text" />');
            $("#submit-at").append('<input class="form-control" type="text" />');
            $("#bukti").append('<input class="form-control" type="text" disabled />');
            
            //apply search for column nama and nrp
            this.api().columns().every(function () {
                var that = this;
    
                // search for input text
                $('input', this.header()).on('keyup change clear', function () {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });
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
            <i class="btn btn-outline-secondary btn-edit bi bi-check-circle-fill text-success" id="1"></i>
            <i class="btn btn-outline-secondary btn-edit bi bi-x-circle-fill text-danger" id="0"></i>
            <i class="btn btn-outline-secondary btn-edit bi bi-exclamation-circle-fill text-warning" id="2"></i>
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
            url: "/donasi/admin",
            method: "POST",
            data: {
                id: id,
                data: data,
                changeTo: changeTo
            },

            success: function (result){
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

    table.order( [[6, 'desc'], [4, 'desc']] ).draw();
    setPopover();
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.imgBukti')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);

        $(".imgBukti").show();

    }
}

function modalImage() {
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var modalImg = document.getElementById("img01");

    $(".myImg").click(function () {
        modal.style.display = "block";
        modalImg.src = $(this).attr('src');
    });

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }
}

function countDown() {
    // for countdown

    // Get today's date and time
    var now = new Date().getTime();

    var startDonation = new Date("Feb 7, 2022 00:00:00").getTime();
    var endDonation = new Date("Mar 5, 2022 00:00:00").getTime(); //end tgl 4 maret 2359


    // Update the count down every 1 second
    var x = setInterval(function () {

        // Get today's date and time
        var now = new Date().getTime();

        // Set the date we're counting down to
        if (now < startDonation) {
            var countDownDate = startDonation;
            var ket = "Penggalangan dana akan dimulai";
        } else {
            var countDownDate = endDonation;
            var ket = "Penggalangan dana akan berakhir";
        }

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result
        $("#hari").text(days);
        $("#jam").text(hours);
        $("#menit").text(minutes);
        $("#detik").text(seconds);
        $("#ket-donasi").text(ket);

        // If the count down is over, write some text 
        if (distance <= 0) {
            clearInterval(x);
            $("#hari").text("0");
            $("#jam").text("0");
            $("#menit").text("0");
            $("#detik").text("0");
            $("#ket-donasi").text("Penggalangan dana ditutup");
        }
    }, 1000);
}

function copyButton() {
    var clipboard = new ClipboardJS('#btn-copy');
}

function initTooltip() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
    })
}
