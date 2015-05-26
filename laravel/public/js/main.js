$( document ).ready(function( $ ) {

    $("#next-mod-btn").hide();
    $("#execut-mod-2 button").click(function(){
        $("#tab2").show();
        $("#next-mod-btn").show();
    });


    $("#url-container").hide();
    jQuery("input[name=file_url]").click(function(){
        $("#url-container").hide();
        $("#browse").hide();
        if($('#inlineRadio1').is(':checked')) {
            $("#browse").show();
            $("#url-container").hide();
        }else if($('#inlineRadio2').is(':checked')) {
            $("#browse").hide();
            $("#url-container").show();
        }
    });
});
$(document).ready( function() {
    $('.pub-citation').each(function(){
       $(this).hide();
    });
    $('.publication button').click(function(){
        var pubID = $(this).attr('data-pub');
        var btnDB = $(this).attr('data-db');
        var citID = 'cit-of-pub-id-'+pubID+'-'+btnDB;
        $('#'+citID).toggleClass('active');
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
        url: "http://localhost:81/proiect-ip/laravel/public/modul2",
        data: {execJAR: "true"}
    }).success(function() {
        {
            $("#spinner").hide();
        }
    });
}