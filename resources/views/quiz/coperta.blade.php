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
            </div>
        </div>
    </div>
</div>




@section('js')
    @parent

    <script>
        var coperta = $("#coperta").fileinput({
            'dropZoneEnabled' : true,
            'showCaption'     : false,
            'showUpload'      : false,
            'showRemove'      : false,
            'uploadAsync'     : false,
            'uploadAsync'     : true,
            'uploadUrl'       : "{!! route('quiz.coordonate') !!}",
        });
    </script>
@stop
