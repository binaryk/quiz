@extends('frontend.layouts.master')

@section('content')
	<div class="row">

		<div class="col-md-10 col-md-offset-1">

			<div class="panel panel-default">
				<div class="panel-heading"><i class="fa fa-home"></i> {{ trans('navs.home') }}</div>

				<div class="panel-body">
					{{ trans('strings.welcome_to', ['place' => app_name()]) }}

					<div class="col-md-6">
						<a href="{!! route('quiz.create') !!}">New quiz</a>
					</div>
					<div class="col-md-6">
						<a href="{!! route('quiz.list') !!}">List quizes</a>
					</div>
				</div>
			</div><!-- panel -->

		</div><!-- col-md-10 -->
 </div>
@endsection

@section('after-scripts-end')
	<script>
		//Being injected from FrontendController
		console.log(test);
	</script>
@stop