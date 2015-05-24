$( document ).ready(function( $ ) {

    $("#next-mod-btn").hide();
    $("#execut-mod-2 button").click(function(){
        $("#tab2").show();
        $("#next-mod-btn").show();
    });


    $("#URL").hide();
    jQuery("input[name=inlineRadioOptions]").click(function(){
        $("#browse").hide();
        $("#URL").hide();
        if(document.getElementById('inlineRadio1').checked) {
            $("#browse").show();
            $("#URL").hide();
        }else if(document.getElementById('inlineRadio2').checked) {
            $("#browse").hide();
            $("#URL").show();
        }
    });
});
$(document).ready( function() {
    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {

        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;

        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }

    });
});
$(document).on('change', '.btn-file :file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
});

var executeJAR = function () {
    $("#spinner").show();
    $.ajax({

        method: "GET",
        url: "http://localhost:81/Back-End/laravel/public/modul2",
        data: {execJAR: "true"}
    }).success(function() {
        {
            $("#spinner").hide();
        }
    });
}