@extends('frontend.layouts.master')
@section('css')
    @parent
@endsection


@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row">
                <div class="col-xs-12">
                    <div class="portlet box red">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-requests"></i><b>Quizes</b>
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-scrollable">
                                @if(count($quizes) > 0)
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Title quiz
                                        </th>
                                        <th>
                                            Lang
                                        </th>
                                        <th>
                                            Title
                                        </th>
                                        <th>
                                            Ogtitle
                                        </th>
                                        <th>
                                            Title view
                                        </th>
                                        <th>
                                            Text
                                        </th>
                                        <th>
                                            Color
                                        </th>
                                        <th>
                                            Description
                                        </th>
                                        <th>
                                            Sample path
                                        </th>
                                        <th>
                                            Controller path
                                        </th>
                                        <th>
                                            View path
                                        </th>
                                        <th>
                                            Upload path
                                        </th>
                                        <th>
                                            Created at
                                        </th>
                                        <th>
                                            Actions
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($quizes as $key => $quiz)
                                        <tr data-id="{!! $quiz->id !!}">
                                            <td>
                                                {!! $key !!}
                                            </td>
                                            <td class="active">
                                                {!! $quiz->title_quiz !!}
                                            </td>
                                            <td class="active">
                                                {!! $quiz->lang !!}
                                            </td>
                                            <td class="success">
                                                {!!  $quiz->title !!}
                                            </td>
                                            <td class="warning">
                                                {!!  $quiz->ogtitle  !!}
                                            </td>
                                            <td class="success">
                                                {!! $quiz->title_view !!}
                                            </td>
                                            <td class="success">
                                                {!!  $quiz->text  !!}
                                            </td>
                                            <td class="success">
                                                {!!  $quiz->color  !!}
                                            </td>
                                            <td class="success">
                                                {!!  $quiz->description  !!}
                                            </td>
                                            <td class="success">
                                                {!!  $quiz->sample_path   !!}
                                            </td>
                                            <td class="success">
                                                {!! $quiz->controller_path !!}
                                            </td>
                                            <td class="success">
                                                {!! $quiz->view_path !!}
                                            </td>
                                            <td class="success">
                                                {!! $quiz->upload_path !!}
                                            </td>
                                            <td class="success">
                                                {!! $quiz->created_at !!}
                                            </td>
                                            <td class="danger">
                                                <a class="remove" data-url="{!! route('quiz.remove',[$quiz->id]) !!}">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                    @else
                                <p>Nu sunt quizuri</p>
                                    @endif
                            </div>
                        </div>
                    </div>
                    <!-- END SAMPLE TABLE PORTLET-->
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    @parent
    <script>
        $('.remove').on('click',function(){
            var conf = confirm('Are you sure ? ');
            if(conf){
                var that = this,
                        url = $(this).data('url');
                $.ajax({
                    method: "POST",
                    url: url,
                    data: {}
                }).done(function(res){
                    $(that).closest('tr').hide();
                    console.log(res);
                })
            }

        });
    </script>
@stop