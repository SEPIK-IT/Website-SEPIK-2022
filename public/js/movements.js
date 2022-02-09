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
            url: "{{ url('movements.update', {id}) }}",
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

    // table.order( [[6, 'desc'], [4, 'desc']] ).draw();
    setPopover();
}

function initTooltip() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
    })
}
