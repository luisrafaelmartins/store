@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<table class="table table-striped">
				<thead>
					<tr>
						@foreach($details["list"] as $detail)
							<th>{{$detail}}</th>
						@endforeach
						<th>Detalhes</th>
					</tr>
				</thead>
				<tbody>
				@if ($records->count() > 0)
					@foreach($records as $record)
						<tr>
							@foreach($details["list"] as $kdetail => $detail)
								<td>{{$record->$kdetail}}</td>
							@endforeach
							<td>
								@if($details['editable'])
									<a href="{{url("/admin/{$details['route']}/{$record->$details['pk']}/edit")}}" style="text-decoration: none;">
										<button class="btn btn-default recordsInfo">
											<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
										</button>
									</a>
								@endif
								@if($details['deletable'])
									<form style="display: inline;" action="{{url("/admin/{$details['route']}/{$record->$details['pk']}")}}" method="POST" class="form-horizontal">
										<input type="hidden" name="_method" value="DELETE"/>
										<input type="hidden" name="_token" value="{{csrf_token()}}"/>
										<button class="btn btn-default recordsInfo">
											<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
										</button>
									</form>
								@endif
							</td>
						</tr>
					@endforeach
				@else
					<tr><td colspan="10"><b>Sem registos</b></td></tr>
				@endif
				</tbody>
			</table>
			@if($details['create'])
				<a href="{{url("/admin/{$details['route']}/create")}}">
					<button class="btn btn-default">Novo Registo</button>
				</a>
			@endif
		</div>
	</div>
</div>
@endsection
