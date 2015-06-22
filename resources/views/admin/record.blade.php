@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{$details['title']}}</div>

				<div class="panel-body">
						@if(isset($record->{$details['pk']}) )
							<form action="{{url("/{$details['route']}/$record->{$details['pk']}")}}" method="POST" class="form-horizontal">
							<input type="hidden" name="_method" value="PUT"/>
						@else
							<form action="{{url("/{$details['route']}")}}" method="POST" class="form-horizontal">
						@endif
						<input type="hidden" name="_token" value="{{csrf_token()}}"/>

						@foreach($details['fields'] as $kfield => $field)
							@include("form.{$field['type']}",['name' => $field['name'],'designation' => $field['designation'],'visible' => $field['visible'],'value' => isset($record->{$field['name']}) ? $record->{$field['name']} : '', 'list' => isset($field['list']) ? ${$field['list']} : [] ])
						@endforeach
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
