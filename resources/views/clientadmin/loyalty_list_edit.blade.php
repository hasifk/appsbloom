     @if(isset($loyalty_edit))
           <div class="col-md-12">
         <div class="box box-primary">
              

               {!! Form::open(array('url' => 'updateloyalty','files' => true)) !!} 
                      {{ csrf_field() }}
              <div class="box-body">
            
          
            <div class="form-group">
            <label>Enter Loyalty Title</label>
        <input type="text" id="loyalty_title" name="loyalty_title" class="form-control"
         value="{{$loyalty_edit->title}}" placeholder="Loyalty Title" >
                                  
                    @if ($errors->has('loyalty_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('loyalty_title') }}</strong>
                                    </span>
                        @endif 
               
                 </div> 

                  <div class="form-group">
            <label>Enter Required count</label>
    <input type="text" id="loyalty_count" name="loyalty_count" class="form-control" 
    value="{{$loyalty_edit->count}}" placeholder="Loyalty Count" >
                
                    @if ($errors->has('loyalty_count'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('loyalty_count') }}</strong>
                                    </span>
                        @endif 
               
                 </div> 
                 
                     <div class="form-group">
            <label>Enter 4 digit stamp code</label>
    <input type="text" id="stamp_code" name="stamp_code" class="form-control" 
    value="{{$loyalty_edit->stamp_code}}" placeholder="Stamp Code" >
                
                    @if ($errors->has('stamp_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('stamp_code') }}</strong>
                                    </span>
                        @endif 
               
                 </div>

                  <div class="form-group">
            <label>Enter loyalty Action</label>
           <input type="text" id="loyalty_action" name="loyalty_action" class="form-control"
            value="{{$loyalty_edit->action}}" placeholder="Loyalty Action">
                                  
                    @if ($errors->has('loyalty_action'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('loyalty_action') }}</strong>
                                    </span>
                        @endif 
               
                 </div> 

                 </div> <!-- /.box-body -->
                 <input type="hidden" value="{{$loyalty_edit->id}}" name="loyalty_id">
                <div class="box-footer">
                <input type="submit" value="Update loyalty" class="btn btn-primary"/>
                </div>
                 {!! Form::close() !!}
                  </div><!-- /.box -->
                  </div>
          @endif