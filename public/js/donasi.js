

$(document).ready(function () {
    $(".imgBukti").hide();

    countDown();
    modalImage();
    copyButton();

    //untuk kategori
    $('#kategori').on('change', function(){
        if($('#kategori').val() == 'umum'){
            $('.sumber').fadeOut();
            $('#sumber').val('umum');
            $('#nrp').val("-")
        }else{
            $('.sumber').fadeIn();
            $('#sumber').val('ukp');
            $('#nrp').val("")
        }
    });
});

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

function modalImage(){
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
            var ket = "Donasi akan dimulai";
        } else {
            var countDownDate = endDonation;
            var ket = "Donasi akan berakhir";
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
            $("#ket-donasi").text("Donasi ditutup");
        }
    }, 1000);
}

function copyButton() {
    var clipboard = new ClipboardJS('#btn-copy');
}