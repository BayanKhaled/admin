@include('admin.layout.header')
@include('admin.layout.nav')
@include('admin.layout.menu')


@section('buttonDashbord')
<div class="card card-primary justify-content-md-center">
	<div class="card-header">
		<h3 class="card-title">General Elements</h3>
	</div>
	<div class="card-body">
	{{ Form::open(array('url' => 'movie/'.$movie->id, 'method' => 'put')) }}
		<div class="col-sm-6">
			<div class="form-group">
			{{ Form::label('title', 'Title')  }}
			{{ Form::text('title', $movie->title, ['class' => 'form-control is-valid'])  }}
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
			{{ Form::label('desc', 'Desc')  }}
			{{ Form::text('desc', $movie->desc, ['class' => 'form-control is-valid'])  }}
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
			{{ Form::label('date', 'Date')  }}
			{{ Form::text('date', $movie->date, ['class' => 'form-control is-valid'])  }}
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
			{{ Form::label('rate', 'Rate')  }}
			{{ Form::text('rate', $movie->rate, ['class' => 'form-control is-valid'])  }}
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
			{{ Form::label('actor', 'Actor')  }}
			{{ Form::select('actor_id', App\Models\actor::pluck('name', 'id'), $movie->actor_id, ['class' => 'form-control'])  }}
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
			{{ Form::submit('save' , array('class' => 'btn btn-info'))  }}
			</div>
		</div>
	</div>
	{{ Form::close() }}		
	</div>

@endsection

@include('admin.layout.wrapper')
@include('admin.layout.footer')