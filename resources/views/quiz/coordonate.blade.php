<div class="panel panel-default" id="photo_box">
    <div class="panel-heading">
        <h3 class="panel-title">Coordonate poza</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <label for="round" class="control-label">Round photo</label>
                <input type="checkbox" id="round" name="round">
                <hr>
            </div>
            <div class="col-md-12">
                <div class="half-center send-pass">
                    <img src=""  id="image" style="max-width: 500px; max-height: 500px;">
                    <hr>
                </div>
            </div>
            <div class="col-md-12" style="margin-bottom: 30px;">
                <div class="half-center send-pass">
                    <input id="coordonate" name="coordonate" type="file"/>
                </div>
            </div>
            <br>
            <hr>
            <div class="col-md-12">
                <label for="">X</label>
                <input type="text" readonly="readonly" name="x">
                <label for="">Y</label>
                <input type="text" readonly="readonly" name="y">
                <label for="">Height</label>
                <input type="text" readonly="readonly" name="height">
                <label for="">Width</label>
                <input type="text" readonly="readonly" name="width">
                <input type="hidden" name="coordonate_name">
            </div>
        </div>
    </div>
</div>

@section('js')
    @parent

    <script>
        var coordonate = $("#coordonate").fileinput({
            'dropZoneEnabled' : true,
            'showCaption'     : false,
            'showUpload'      : true,
            'showRemove'      : false,
            'uploadAsync'     : true,
            'uploadUrl'       : "{!! route('quiz.coordonate') !!}",
        });

        coordonate.on('fileuploaded', function(event, data, previewId, index){
            console.log(data);
            console.log(data.response.path);
            $('[name=coordonate_name]').val(data.response.name);
            $('#image').attr('src',data.response.path);
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
@endsection                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 0...........................
