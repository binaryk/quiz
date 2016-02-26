@extends('frontend.layouts.master')
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset('packages/fileinput/css/fileinput.min.css') }}">
@endsection

@section('content')
    <div class="row">

        <div class="col-md-10 col-md-offset-1">
            {!! Form::open(array('url'=>route('quiz.store'),'method'=>'POST', 'files'=>true)) !!}
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> Quiz nou </div>

                    <div class="panel-body">
                            @include('quiz.fields')
                            @include('quiz.coperta')
                            @include('quiz.poze')
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
@stop