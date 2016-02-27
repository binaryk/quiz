<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Photos</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <div class="half-center send-pass">
                    <input id="photos" name="photos[]" type="file" multiple/>
                </div>
            </div>
        </div>
    </div>
</div>


@section('js')
    @parent


    <script>

        var photos = $("#photos").fileinput({
            'dropZoneEnabled' : true,
            'showCaption'     : false,
            'showUpload'      : false,
            'showRemove'      : false,
            'uploadAsync'     : true,
            'uploadUrl'       : "{!! route('quiz.coordonate') !!}",
        });

        </script>
@stop