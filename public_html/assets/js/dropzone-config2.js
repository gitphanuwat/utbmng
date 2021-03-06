var photo_counter = 0;
var file_id = $('#file_id').val();;
Dropzone.options.realDropzone = {

    uploadMultiple: false,
    parallelUploads: 100,
    maxFilesize: 20,
    previewsContainer: '#dropzonePreview',
    previewTemplate: document.querySelector('#preview-template').innerHTML,
    addRemoveLinks: true,
    dictRemoveFile: 'Remove',
    dictFileTooBig: 'Image is bigger than 20MB',
    dictRemoveFileConfirmation: "Are you sure you wish to delete this image?",

    // The setting up of the dropzone
    init:function() {

        // Add server images
        var myDropzone = this;
        //var cururl = '/lrd/public_html';
        //var cururl = '/public_html';
        $.get('../../../user/server-images/'+file_id, function(data) {

            $.each(data.images, function (key, value) {

                var file = {name: value.original, size: value.size};
                myDropzone.options.addedfile.call(myDropzone, file);
                myDropzone.createThumbnailFromUrl(file, '/files/' + value.server);
                myDropzone.emit("complete", file);
                $('.serverfilename', file.previewElement).val(value.server);
                photo_counter++;
                $("#photoCounter").text( "(" + photo_counter + ")");
            });
        });

        this.on("removedfile", function(file) {

            $.ajax({
                type: 'POST',
                url : '../../upload/delete',
                //url: 'upload/delete',
                data: {id: $('.serverfilename', file.previewElement).val() , _token: $('#csrf-token').val()},
                dataType: 'html',
                success: function(data){
                    var rep = JSON.parse(data);
                    if(rep.code == 200)
                    {
                        photo_counter--;
                        $("#photoCounter").text( "(" + photo_counter + ")");
                    }

                }
            });

        } );
    },
    error: function(file, response) {
        if($.type(response) === "string")
            var message = response; //dropzone sends it's own error messages in string
        else
            var message = response.message;
        file.previewElement.classList.add("dz-error");
        _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
        _results = [];
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i];
            _results.push(node.textContent = message);
        }
        return _results;
    },
    success: function(file,response) {
        $('.serverfilename', file.previewElement).val(response.filename);
        photo_counter++;
        $("#photoCounter").text( "(" + photo_counter + ")");
    }
}
