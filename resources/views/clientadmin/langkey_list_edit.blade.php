     @if(isset($langkey_edit))
           <div class="col-md-12">
         <div class="box box-primary">
              

               {!! Form::open(array('url' => 'updatelangkey','files' => true)) !!} 
                      {{ csrf_field() }}
              <div class="box-body">
            
          
             <div class="form-group">
            <label>Enter language Key</label>
        <input type="text" id="language_key" name="language_key" class="form-control"
         value="{{$langkey_edit->key}}" placeholder="Language Key" >
                                  
                    @if ($errors->has('language_key'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('language_key') }}</strong>
                                    </span>
                        @endif 
               
                 </div> 


                      <div class="form-group">
            <label>Enter language Value</label>
        <input type="text" id="language_value" name="language_value" class="form-control"
         value="{{$langkey_edit->lang_value}}" placeholder="Language Value" >
                                  
                    @if ($errors->has('language_value'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('language_value') }}</strong>
                                    </span>
                        @endif 
               
                 </div> 

                 </div> <!-- /.box-body -->
                 <input type="hidden" value="{{$langkey_edit->id}}" name="langkey_id">
                <div class="box-footer">
                <input type="submit" value="Update language" class="btn btn-primary"/>
                </div>
                 {!! Form::close() !!}
                  </div><!-- /.box -->
                  </div>
          @endif