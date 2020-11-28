@extends('admin.layout.master')
@section('content')

<div class="row">
<div class="col-md-12">
        
<div class="card">
    <div class="card-header">
        <strong class="card-title">{{ $page_name }}</strong>
    </div>
    <div class="card-body">
      <!-- Credit Card -->

      @if(count($errors)>0)
      <div class="alert alert-danger" role="alert">
        @foreach($errors->All() as $error)
        <li>{{ $error }}</li>
      @endforeach
      </div>

      @endif
   
              <hr>
              {!! Form::open(array('url'=>'back/category/store' , 'method'=>'post')) !!}           

                  <div class="form-group">
                      {{ Form::label('name','name',['class'=>'control-label mb-1']) }}
                      {{  Form::text('name',null,['class'=>'form-control','id'=>'name'])  }}
                     
                  </div>

                      <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                          <i class="fa fa-lock fa-lg"></i>&nbsp;
                          <span id="payment-button-amount">enregistrez</span>
                          <span id="payment-button-sending" style="display:none;">Sending…</span>
                      </button>
                  </div>
                  {!! Form::close() !!}
          </div>
      </div>

    </div>
</div> 


</div>
</div>

@endsection