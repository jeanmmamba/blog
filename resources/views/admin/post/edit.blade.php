@extends('admin.layout.master')
@section('content')

<div class="row">
<div class="col-md-12">
        
<div class="card">
    <div class="card-header">
        <strong class="card-title">formulaire de modification</strong>
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
              {{ Form::model($post,['route' => ['post-update',$post->id],'method'=>'put']) }}
            

              <div class="form-group">
                  {{ Form::label('title','title',['class'=>'control-label mb-1']) }}
                  {{  Form::text('title',null,['class'=>'form-control','id'=>'title'])  }}
                 
              </div>

              <div class="form-group">
                {{ Form::label('category','category',['class'=>'control-label mb-1']) }}
                {{  Form::select('category_id',$categories,null,['class'=>'form-control myselect','data-placeholder'=>'select category','multiple'])}}                  
            </div>

            <div class="form-group">
                {{ Form::label('short_description','short description',['class'=>'control-label mb-1']) }}
                {{  Form::textarea('short_description',null,['class'=>'form-control','id'=>'short_description'])  }}                   
            </div>

            
            <div class="form-group">
                {{ Form::label('description','description',['class'=>'control-label mb-1']) }}
                {{  Form::textarea('description',null,['class'=>'form-control my-editor','id'=>'description'])  }}                   
            </div>

            <div class="form-group">
                {{ Form::label('image','image',['class'=>'control-label mb-1']) }}
                {{  Form::file('img',['class'=>'form-control'])  }}                   
            </div>

                  <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                      <i class="fa fa-lock fa-lg"></i>&nbsp;
                      <span id="payment-button-amount"> update </span>
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