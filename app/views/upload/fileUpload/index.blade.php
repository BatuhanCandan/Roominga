<div class="wrapper">
    <div id="dropzone">
        {{ Form::open(array('url' => 'uploadd', 'class'=>'dropzone', 'id'=>'my-dropzone')) }}
        <!-- Multiple file upload-->
        <div class="fallback">
            <input name="file" type="file" multiple/>
        </div>
        {{ Form::close() }}
    </div>
    <br>
</div>

{{ Form::open(['id'=>'upload','route' => 'uploading_path']) }}

<div class="form-group">
    {{ Form::label('roomname','Room name: ') }}
    {{ Form::text('roomname',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('comment','Comment: (optional)') }}
    {{ Form::text('comment',null,['class' => 'form-control']) }}
</div>



<div class="form-group">
    {{ Form::submit('Create Room',['class' => 'btn btn-primary']) }}
</div>
{{ Form::close() }}





<script language="javascript">


    // myDropzone is the configuration for the element that has an id attribute
    // with the value my-dropzone (or myDropzone)
    Dropzone.options.myDropzone = {
        init: function () {
            this.on("addedfile", function (file) {

                var removeButton = Dropzone.createElement('<a class="dz-remove">Remove file</a>');
                var _this = this;

                removeButton.addEventListener("click", function (e) {
                    e.preventDefault();
                    e.stopPropagation();

                    var fileInfo = new Array();
                    fileInfo['name'] = file.name;

                    $.ajax({
                        type: "POST",
                        url: "{{ url('/delete-image') }}",
                        data: {file: file.name},
                        beforeSend: function () {
                            // before send
                        },
                        success: function (response) {

                            if (response == 'success')
                                alert('deleted');
                        },
                        error: function () {
                            alert("error");
                        }
                    });


                    _this.removeFile(file);

                    // If you want to the delete the file on the server as well,
                    // you can do the AJAX request here.
                });


                // Add the button to the file preview element.
                file.previewElement.appendChild(removeButton);
            });
        }
    };

</script>
