<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Coperta</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <div class="half-center send-pass">
                    <input id="coperta" name="coperta" type="file"/>
                </div>
            </div>
            <hr>
            <div class="col-md-12">
                <img src=""  id="image" >
                <hr>
                <label for="">X</label>
                <input type="text" readonly="readonly" name="x">
                <label for="">Y</label>
                <input type="text" readonly="readonly" name="y">
                <label for="">Height</label>
                <input type="text" readonly="readonly" name="height">
                <label for="">Width</label>
                <input type="text" readonly="readonly" name="width">
                <input type="hidden" name="coperta_name">

            </div>
        </div>
    </div>
</div>

@section('js')
    @parent

    <script>
        var upload_document = $("#coperta").fileinput({
        'dropZoneEnabled' : true,
        'showCaption'     : false,
        'showUpload'      : true,
        'showRemove'      : false,
        'uploadAsync'     : true,
        'uploadUrl'       : "{!! route('quiz.coperta') !!}",
        });

        upload_document.on('fileuploaded', function(event, data, previewId, index){
            console.log(data);
            console.log(data.response.path);
            $('[name=coperta_name]').val(data.response.name)
            $('#image').attr('src',"{!!public_path()!!}" + "/uploads/"+data.response.name);
            initCrop();
        });

        function initCrop(){
            $('#image').cropper({
                aspectRatio: 1 / 1,
                modal: true,
                zoomable: false,
                crop: function(e) {
                    // Output the result data for cropping image.
                    console.log(e.x);
                    console.log(e.y);
                    console.log(e.width);
                    console.log(e.height);
                    $('[name=x]').val(e.x)
                    $('[name=y]').val(e.y)
                    $('[name=height]').val(e.height)
                    $('[name=width]').val(e.width)
                    console.log(e.rotate);
                    console.log(e.scaleX);
                    console.log(e.scaleY);
                }
            });
        }
    </script>
@endsection
@section('css')
    @parent
    <style>
    </style>
@stop