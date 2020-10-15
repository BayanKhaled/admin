@include('admin.layout.header')
@include('admin.layout.nav')
@include('admin.layout.menu')


@section('buttonDashbord')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Movie Table</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td>Title</td>
          <td>{{ $movie->title }}</td>
        </tr>
        <tr>
          <td>Desc</td>
          <td>{{ $movie->desc }}</td>
        </tr>
        <tr>
          <td>Date</td>
          <td>{{ $movie->date }}</td>
        </tr>
        <tr>
          <td>Rate</td>
          <td>{{ $movie->rate }}</td>
        </tr>
        <tr>
          <td>Actor</td>
          <td>{{ $movie->actor->name }}</td>
        </tr>
        <tr>
          <td>  
            {!! Form::open(array('url' => '/movie/'.$movie->id,'method'=>'DELETE')) !!}
            {{ Form::submit('Delete',array('class'=>'btn btn-info btn-sm','style'=>'width: 100%' )) }}
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

@endsection

@include('admin.layout.wrapper')
@include('admin.layout.footer')