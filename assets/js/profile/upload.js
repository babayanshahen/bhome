$(document).ready(function() {
    var num = 1;

    $(".upload_click").click(function() {

        num++;

        $("#pro-image-" + (num - 1)).click();

        var input = document.createElement("INPUT");
        input.setAttribute("type", "file");
        input.setAttribute("id", "pro-image-" + num);
        input.setAttribute("name", "pro-image[]");
        input.setAttribute("multiple", "multiple");
        input.style.display = "none";

        document.getElementById("myinput").appendChild(input);

        document.getElementById("pro-image-" + (num - 1)).addEventListener('change', function() {


            if (window.File && window.FileList && window.FileReader) {
                var files = event.target.files; //FileList object
                var output = $(".preview-images-zone");

                for (let i = 0; i < files.length; i++) {
                    var file = files[i];
                    if (!file.type.match('image')) continue;

                    var picReader = new FileReader();

                    picReader.addEventListener('load', function(event) {
                        
                        var picFile = event.target;
                        var formData = new FormData();
                        // var file    = document.querySelector('input[type=file]').files[0];
                        // formData.append( "pro-image",  picFile.readAsDataURL(picFile.result) );

                        // $.ajax({
                        //     url: baseUrl+"dashboard/updateImage", // Url to which the request is send
                        //     type: "POST", // Type of request to be send, called as method
                        //     data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                        //     contentType: false, // The content type used when sending data to the server.
                        //     cache: false, // To unable request pages to be cached
                        //     processData: false, // To send DOMDocument or non processed data file it is set to false
                        //     success: function(data) // A function to be called if request succeeds
                        //         {
                        //             // console.log(data);
                        //             // $('#loading').hide();
                        //             // $("#message").html(data);
                        //         }
                        // });
                        // console.log(picFile);
                        var html = '<div class="preview-image preview-show-' + num + '">' +
                            '<div class="image-cancel" data-no="' + num + '">x</div>' +
                            '<div class="image-zone"><img id="pro-img-' + num + '" src="' + picFile.result + '"></div>';

                        output.append(html);
                    });

                    picReader.readAsDataURL(file);
                }
            } else {
                console.log('Browser not support');
            }
        }, false);

        $(document).on('click', '.image-cancel', function() {
            let no = $(this).data('no');
            $("#pro-image-" + (no - 1)).remove();
            $(".preview-image.preview-show-" + no).remove();

        });
    });
});

$(document).on('click', '.image-cancel', function() {
    let no = $(this).data('no');

    $(".preview-image.preview-show-" + no).remove();
});

$(document).on('change', '#upload-avatar', function(event) {
    if (window.File && window.FileList && window.FileReader) {
        var picReader = new FileReader();
        picReader.onload = function(e) {
            console.log(e.target.result);
        };
    }
});

function statementEdit(dataId) {
    window.location.replace(baseUrl + 'dashboard/upload/' + dataId);
}

$('select[name=kind_build]').on('change', function() {
    var type = $('select[name=kind_build]').val();
    // console.log(type);
    if (type == 1) {
        $('select[name=floor]').attr("disabled", "disabled");
        $('select[name=floor_all]').attr("disabled", "disabled");
        $('select[name=size_room]').removeAttr("disabled", "disabled");

        $('select[name=size_floor]').removeAttr("disabled", "disabled");
    }
    if (type == 2) {
        $('select[name=size_floor]').attr("disabled", "disabled");

        $('select[name=floor]').removeAttr("disabled", "disabled");
        $('select[name=floor_all]').removeAttr("disabled", "disabled");
        $('select[name=size_room]').removeAttr("disabled", "disabled");
    }
    if (type == 3) {
        $('select[name=size_floor]').attr("disabled", "disabled");
        $('select[name=floor]').attr("disabled", "disabled");
        $('select[name=floor_all]').attr("disabled", "disabled");
        $('select[name=size_room]').attr("disabled", "disabled");


    }
    if (type == 4) {
        $('select[name=size_floor]').removeAttr("disabled", "disabled");
        $('select[name=floor]').removeAttr("disabled", "disabled");
        $('select[name=floor_all]').removeAttr("disabled", "disabled");
        $('select[name=size_room]').removeAttr("disabled", "disabled");


    }
    if (type == 5) {
        $('select[name=size_floor]').attr("disabled", "disabled");
        $('select[name=floor]').attr("disabled", "disabled");
        $('select[name=floor_all]').attr("disabled", "disabled");
        $('select[name=size_room]').attr("disabled", "disabled");  
        $('select[name=size_room]').attr("disabled", "disabled");
    }
    if (type == 6) {
        $('select[name=size_floor]').removeAttr("disabled", "disabled");
        $('select[name=floor]').removeAttr("disabled", "disabled");
        $('select[name=floor_all]').removeAttr("disabled", "disabled");
        $('select[name=size_room]').removeAttr("disabled", "disabled");
    }
})

if ($('select[name=kind_build]').val() == 3) {
    $('select[name=size_floor]').attr("disabled", "disabled");
    $('select[name=floor]').attr("disabled", "disabled");
    $('select[name=floor_all]').attr("disabled", "disabled");
    $('select[name=size_room]').attr("disabled", "disabled");
}

if ($('select[name=kind_build]').val() == 1) {
    $('select[name=size_floor]').removeAttr("disabled", "disabled");
    $('select[name=floor]').attr("disabled", "disabled");
    $('select[name=floor_all]').attr("disabled", "disabled");
}

if ($('select[name=kind_build]').val() == 2) {
    $('select[name=size_floor]').attr("disabled", "disabled");
    $('select[name=floor]').removeAttr("disabled", "disabled");
    $('select[name=floor_all]').removeAttr("disabled", "disabled");
}

if ($('select[name=kind_build]').val() == 5) {
    $('select[name=size_floor]').attr("disabled", "disabled");
    $('select[name=floor]').attr("disabled", "disabled");
    $('select[name=floor_all]').attr("disabled", "disabled");
}
if ($('select[name=kind_build]').val() == 6) {
    $('select[name=size_floor]').removeAttr("disabled", "disabled");
    $('select[name=floor]').removeAttr("disabled", "disabled");
    $('select[name=floor_all]').removeAttr("disabled", "disabled");
    $('select[name=floor_all]').removeAttr("disabled", "disabled");
}

$('select[name=valute]').on('change', function() {
    if ($('select[name=valute]').val() == 2) {
        $("#valute-icon").attr("src", baseUrl + "assets/img/valute/amd.png");
    } else if ($('select[name=valute]').val() == 1) {
        $("#valute-icon").attr("src", baseUrl + "assets/img/valute/dollar.png");
    }else if ($('select[name=valute]').val() == 3) {
        $("#valute-icon").attr("src", baseUrl + "assets/img/valute/euro.png");
    }
})


function deleteImage(imageKey = false,First,Second) {
    $.ajax({
        url: baseUrl + "dashboard/deleteImage/"+imageKey+'/'+First+'/'+Second,
        success: function(affectDeleteRows) {
            $(this).html('');
            // window.location.reload(true)
            // if (affectDeleteRows) {
            // }
        },
    });
}
