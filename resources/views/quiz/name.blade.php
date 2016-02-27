<div class="panel panel-default" id="text_box">
    <div class="panel-heading">
        <h3 class="panel-title">Coordonate text </h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <div class="half-center send-pass">
                    <input id="coordonate_text" name="coordonate_text" type="file"/>
                    <div class="col-md-12">{!! $controls['text'] !!}</div>
                </div>
            </div>
            <hr>
            <div class="col-md-12">
                <img src=""  id="text_image" style="max-width: 500px; max-height: 500px;">
                <hr>
                <label for="">X</label>
                <input type="text" readonly="readonly" name="text_x">
                <label for="">Y</label>
                <input type="text" readonly="readonly" name="text_y">
                <label for="">Height</label>
                <input type="text" readonly="readonly" name="text_height">
                <label for="">Width</label>
                <input type="text" readonly="readonly" name="text_width">
                <input type="hidden" name="coordonate_name">
            </div>
        </div>
    </div>
</div>

@section('js')
    @parent

    <script>
        var coordonate_text = $("#coordonate_text").fileinput({
            'dropZoneEnabled' : true,
            'showCaption'     : false,
            'showUpload'      : true,
            'showRemove'      : false,
            'uploadAsync'     : true,
            'uploadUrl'       : "{!! route('quiz.coordonate_text') !!}",
        });

        coordonate_text.on('fileuploaded', function(event, data, previewId, index){
            console.log(data);
            console.log(data.response.path);
            $('[name=coordonate_name]').val(data.response.name);
            $('#text_image').attr('src',data.response.path);
            initCropText();
        });

        function initCropText(){
            $('#text_image').cropper({
                aspectRatio: NaN,
                modal: true,
                zoomable: false,
                crop: function(e) {
                    // Output the result data for cropping image.
                    console.log(e.x);
                    console.log(e.y);
                    console.log(e.width);
                    console.log(e.height);
                    $('[name=text_x]').val(e.x)
                    $('[name=text_y]').val(e.y)
                    $('[name=text_height]').val(e.height)
                    $('[name=text_width]').val(e.width)
                    console.log(e.rotate);
                    console.log(e.scaleX);
                    console.log(e.scaleY);
                }
            });
        }
    </script>
@endsection                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 0...........................
