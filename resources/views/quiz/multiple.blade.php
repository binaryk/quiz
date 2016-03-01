@section('js')
@parent
<script>
    $('#add_text').on('click', function(){
        var data = cropper.cropper("getData");
        data['title'] = $('#text').val();
        textes.push(data);
        $('#textes').val(JSON.stringify(textes))
        $('#text').val('');
        cropper.cropper('setData',initData);

    });
</script>

@stop