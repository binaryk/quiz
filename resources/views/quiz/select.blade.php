<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Coperta</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <div class="half-center send-pass">
                    <select class="form-control select" name="option" id="option">
                        <option value="1">Ambele</option>
                        <option value="2">Poza</option>
                        <option value="3">Text</option>
                    </select>
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
       $('#option').on('change', function(){
           switch($(this).val()){
               case '1':
                       $('#photo_box').show();
                       $('#text_box').show();
                   break;
               case '2':
                       $('#photo_box').show();
                       $('#text_box').hide();
                   break;
               case '3':
                       $('#photo_box').hide();
                       $('#text_box').show();
                   break;
           }
           console.log($(this).val());
       });
    </script>
@stop
