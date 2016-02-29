@extends('frontend.layouts.master')
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset('packages/fileinput/css/fileinput.min.css') }}">
    <link rel="stylesheet" href="{!! asset('components/cropper/dist/cropper.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('components/colorpicker/jquery.colorpicker.css') !!}">
@endsection

@section('content')
    <div class="row">

        <div class="col-md-10 col-md-offset-1">
            {!! Form::open(array('url'=>route('quiz.store'),'method'=>'POST', 'files'=>true)) !!}
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> Quiz nou </div>
                    {!! $image !!}
                    <div class="panel-body">
                            @include('quiz.lang')
                            @include('quiz.fields')
                            @include('quiz.coperta')
                            @include('quiz.select')
                            @include('quiz.coordonate')
                            @include('quiz.name')
                            @include('quiz.poze')
                            @include('quiz.colorpicker')
                        <input type="hidden" class="hidden" name="_token" value="{!! csrf_token() !!}">
                    </div>
                </div><!-- panel -->

                <div class="panel-footer">
                    <button type="submit" class="btn btn-default">Save</button>
                </div>
            {!! Form::close() !!}

        </div><!-- col-md-10 -->
    </div>
@endsection

@section('after-scripts-end')
    <script type="text/javascript" src = "{{asset( 'packages/fileinput/js/fileinput.min.js') }}"></script>
    <script src="{!! asset('components/cropper/dist/cropper.min.js') !!}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.js" type="text/javascript"></script>
    <script src="{!! asset('components/colorpicker/jquery.colorpicker.js') !!}"></script>
    <!-- Plugin -->
    <script src="{!! asset('components/colorpicker/jquery.colorpicker.js') !!}"></script>
    <link href="{!! asset('components/colorpicker/jquery.colorpicker.css') !!}" rel="stylesheet" type="text/css"/>
    <!-- Plugin extensions -->
    <script src="{!! asset('components/colorpicker/i18n/jquery.ui.colorpicker-nl.js') !!}"></script>
    <script src="{!! asset('components/colorpicker/parts/jquery.ui.colorpicker-rgbslider.js') !!}"></script>
    <script src="{!! asset('components/colorpicker/parts/jquery.ui.colorpicker-memory.js') !!}"></script>

    <script>
        (function($) {
            if (!$.curCSS) {
                $.curCSS = $.css;
            }
        })(jQuery);
        $(function() {
            $('#colorpicker-popup').colorpicker({
                colorFormat : 'RGB'
            });
        });
    </script>
@stop