@section('additionalInfo')
	<!-- Select2 -->
	<link rel="stylesheet" href="{{ url('/') }}/AdminLTE/plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="{{ url('/') }}/AdminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<script src="{{ url('/') }}/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
@endsection
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
    <div class="col-sm-6">
    </div>
    <div class="col-sm-6">
	    <div class="form-group">
	      	{{ Form::label('Technician', 'Technician')  }}
			{{ Form::select('sports[]', $cars,null,['multiple'=>'multiple','id'=>'sports','class' => 'select2 select2-hidden-accessible','data-placeholder' => 'Select a State','style' => 'width: 100%;', 'data-select2-id' => '7', 'aria-hidden' => 'true'])  }}
	    </div>
	</div>

	
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


@section('additionalFooter')
<script src="{{ url('/') }}/AdminLTE/plugins/select2/js/select2.full.min.js"></script>
<script>
$('.select2').select2({
      theme: 'bootstrap4'
    })
$('.select3').select2()
</script>

@endsection
@include('admin.layout.footer')