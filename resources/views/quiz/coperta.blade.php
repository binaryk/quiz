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
        </div>
    </div>
</div>

@section('js')
    @parent

    <script>
        var upload_document = $("#coperta").fileinput({
        'previewSettings' : {},
        'dropZoneEnabled' : false,
        'showCaption'     : false,
        'browseLabel'     : 'Alege fisier',
        'removeLabel'     : 'Sterge selectia',
        'uploadLabel'     : 'Incarca fisierul',
        'uploadAsync'     : false,
        'uploadUrl'       : "{!! route('quiz.coperta') !!}",
        'uploadExtraData' :
        {
        title : 'xxxxxxxxxxxxxxxx'
        }
        ,
        'fileActionSettings' :
        {
        'removeTitle' : 'Sterge selectia',
        'uploadTitle' : 'Incarca fisierul',
        'indicatorNewTitle' : 'Fisierul nu este incarcat'
        }
        });

        upload_document.on('filepreajax', function(event, previewId, index) {
        $(this).fileinput({
        'uploadExtraData' :
        {
        title : 'gggggggg'
        }
        });
        console.log('File pre ajax triggered', index);
        });

        upload_document.on('fileuploaded', function(event, data, previewId, index){
        var file_name = data.files[0].name;
        var extention = file_name.split('.')[1];
        var file_name = file_name.split('.')[0];
        var MyDate = new Date();
        var MyDateString;
        console.log(MyDateString);
        MyDateString =  MyDate.getFullYear() + '-' + ('0' + (MyDate.getMonth()+1)).slice(-2)   + '-' + ('0' + MyDate.getDate()).slice(-2) ;
        });
    </script>
@endsection