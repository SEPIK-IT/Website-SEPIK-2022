$(document).ready(function(){
    $(".imgBukti").hide();
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.imgBukti')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);

        setTimeout(function() {
            $(".imgBukti").show();
        }, 1000);
        
    }
}