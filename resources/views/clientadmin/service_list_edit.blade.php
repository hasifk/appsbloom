     @if(isset($service_edit))
         <div class="col-md-6">
         <div class="box box-primary">
              

               {!! Form::open(array('url' => 'updateservice','files' => true)) !!} 
                      {{ csrf_field() }}
              <div class="box-body">
               <img class="img-responsive pad" src="{{$service_edit->image}}" alt="Photo">
               <div class="form-group">
              <label>Upload Service Image</label>
              <input type="file" name="service_image" class="form-control" id="service_image">
              @if ($errors->has('service_image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('service_image') }}</strong>
                                    </span>
                        @endif 
              </div>
          
              
            <div class="form-group">
            <label>Enter Service Description</label>
           <textarea id="service_content" name="service_content" class="form-control" rows="5" cols="80">
                    {{$service_edit->description}}              
                    </textarea>
                    @if ($errors->has('service_content'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('service_content') }}</strong>
                                    </span>
                        @endif 
               
                 </div>   
                 </div> <!-- /.box-body -->
                 <input type="hidden" value="{{$service_edit->id}}" name="service_id">
                  <input type="hidden" value="{{$service_edit->image}}" name="service_image1">
                <div class="box-footer">
                <input type="submit" value="Update Service" class="btn btn-primary"/>
                </div>
                 {!! Form::close() !!}
                  </div><!-- /.box -->
                  </div>
          @endif