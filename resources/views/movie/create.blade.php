@include('admin.layout.header')
@include('admin.layout.nav')
@include('admin.layout.menu')


@section('buttonDashbord')
<div class="card card-primary justify-content-md-center">
<div class="card-header">
	<h3 class="card-title">General Elements</h3>
</div>
<div class="card-body">
@if ($errors->all())
<div class="alert alert-danger">
@foreach($errors->all() as $error)
  <li>{{ $error }}</li>
@endforeach
</div>
@endif
{{ Form::open(array('url' => '/movie', 'method' => 'POST')) }}
@csrf
	<div class="col-sm-6">
		<div class="form-group">
		{{ Form::label('title', 'Title')  }}
		{{ Form::text('title',$value = null, ['class' => 'form-control is-valid'])  }}
		</div>
	</div>
	<div class="col-sm-6">
		<div class="form-group">
		{{ Form::label('desc', 'Desc')  }}
		{{ Form::text('desc',$value = null, ['class' => 'form-control is-valid'])  }}
		</div>
	</div>
	<div class="col-sm-6">
		<div class="form-group">
		{{ Form::label('date', 'Date')  }}
		{{ Form::text('date',$value = null, ['class' => 'form-control is-valid'])  }}
		</div>
	</div>
	<div class="col-sm-6">
		<div class="form-group">
		{{ Form::label('rate', 'Rate')  }}
		{{ Form::text('rate',$value = null, ['class' => 'form-control is-valid'])  }}
		</div>
	</div>
	<div class="col-sm-6">
		<div class="form-group">
		{{ Form::label('actor', 'Actor')  }}
		{{ Form::select('actor_id', App\Models\actor::pluck('name', 'id'),null,['class' => 'form-control'])  }}
		</div>
	</div>
	<div class="col-sm-6">
		<div class="form-group">
		{{ Form::submit('save' ,array('class' => 'btn btn-info'))  }}
		</div>
	</div>
	
{{ Form::close() }}		
</div>
</div>

@endsection

@include('admin.layout.wrapper')
@include('admin.layout.footer')