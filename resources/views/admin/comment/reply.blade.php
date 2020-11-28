@extends('admin.layout.master')
@section('content')

<script src="{{ asset('public/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('public/vendor/unisharp/laravel-ckeditor/adapters/jquery.js') }}"></script>



<script>
    jQuery(document).ready(function() {
        jQuery(".myselect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });

         jQuery('textarea.my-editor').ckeditor({
          filebrowserImageBrowseUrl: '{{ url("/public") }}/laravel-filemanager?type=Images',
          filebrowserImageUploadUrl: '{{ url("/public") }}/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
          filebrowserBrowseUrl: '{{ url("/public") }}/laravel-filemanager?type=Files',
          filebrowserUploadUrl: '{{ url("/public") }}/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
      });
    });
   
</script>


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
              {!! Form::open(array('url'=>'back/comment/reply' , 'method'=>'POST')) !!}
            

                <div class="form-group">
                    {{ Form::label('comment','comment',['class'=>'control-label mb-1']) }}
                    {{  Form::textarea('comment',null,['class'=>'form-control','id'=>'comment'])  }}   
                    {{  Form::hidden('post_id',$id)  }}                  
                </div>

           

                      <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                          <i class="fa fa-lock fa-lg"></i>&nbsp;
                          <span id="payment-button-amount">validez</span>               
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