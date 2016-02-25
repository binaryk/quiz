@extends('frontend.layouts.master')
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset('packages/fileinput/css/fileinput.min.css') }}">
@endsection

@section('content')
    <div class="row">

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-home"></i> Quiz nou </div>

                <div class="panel-body">

                    @include('quiz.fields')
                    @include('quiz.coperta')

                </div>
            </div><!-- panel -->

        </div><!-- col-md-10 -->
    </div>
@endsection

@section('after-scripts-end')
    <script type="text/javascript" src = "{{asset( 'packages/fileinput/js/fileinput.min.js') }}"></script>
@stop