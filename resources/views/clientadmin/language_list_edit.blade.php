@if(isset($language_edit))
<div class="col-md-12">
         <div class="box box-primary">
              

               {!! Form::open(array('url' => 'updatelanguage','files' => true)) !!} 
                      {{ csrf_field() }}
              <div class="box-body">
            
          
            <div class="form-group">
            <label>Enter language Title</label>
        <input type="text" id="language" name="language" class="form-control"
         value="{{$language_edit->language}}" placeholder="Language Name" >
                                  
                    @if ($errors->has('language'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('language') }}</strong>
                                    </span>
                        @endif 
               
                 </div> 

         
    <input type="hidden" value="{{$language_edit->id}}" name="language_id">
                 </div> <!-- /.box-body -->
                <div class="box-footer">
                <input type="submit" value="Update language" class="btn btn-primary"/>
                </div>
                 {!! Form::close() !!}
                  </div><!-- /.box -->
                  </div>
  @endif