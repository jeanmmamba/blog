@extends('admin.layout.master')
@section('content')


<link rel="stylesheet" href="{{ asset('/public/admin/assets/css/lib/chosen/chosen.css') }}">
<script src="{{ asset('/public/admin/assets/js/lib/chosen/chosen.jquery.js') }}"></script>


<script>
    jQuery(document).ready(function(){
        jQuery(".myselect").chosen({
            disable_search_threshold:10,
            no_results_text:"Oops, nothing found!",
            width:100%
        });
    });
</script>

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
              {{ Form::model($role,['route' => ['role-update',$role->id],'method'=>'put']) }}
            

                  <div class="form-group">
                      {{ Form::label('name','name',['class'=>'control-label mb-1']) }}
                      {{  Form::text('name',null,['class'=>'form-control','id'=>'name'])  }}
                     
                  </div>

                  <div class="form-group">
                    {{ Form::label('display_name','display name',['class'=>'control-label mb-1']) }}
                    {{  Form::text('display_name',null,['class'=>'form-control','id'=>'display_name'])  }}
                   
                </div>

                <div class="form-group">
                    {{ Form::label('description','description',['class'=>'control-label mb-1']) }}
                    {{  Form::textarea('description',null,['class'=>'form-control','id'=>'description'])  }}
                   
                </div>

                <div class="form-group">
                    {{ Form::label('permission','permission',['class'=>'control-label mb-1']) }}
                    {{  Form::select('permission[]',$permission,$selectedPermission,['class'=>'myselect','data-placeholder'=>'select permissions','multiple'])  }}
                   
                </div>

                      <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                          <i class="fa fa-lock fa-lg"></i>&nbsp;
                          <span id="payment-button-amount">update</span>
                          <span id="payment-button-sending" style="display:none;">Sending…</span>
                      </button>
                  </div>
                  {{ Form::close() }}
          </div>
      </div>

    </div>
</div> 


</div>
</div>

@endsection