     @if(isset($event_edit))
      <script type="text/javascript">
        $( document ).ajaxComplete(function () { 
        $( '.to_ck').each( function() {

    CKEDITOR.replace( $(this).attr('id') );
       });
        $('#event_reservation').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm'});
       });

      </script>
         <div class="col-md-12">
         <div class="box box-primary">
              

               {!! Form::open(array('url' => 'updateevent','files' => true)) !!} 
                      {{ csrf_field() }}
              <div class="box-body">
              <div class="form-group">
            <label>Enter event Title</label>
        <input type="text" id="event_title" name="event_title" class="form-control"
         value="{{$event_edit->title}}" placeholder="event Title" >
                                  
                    @if ($errors->has('event_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('event_title') }}</strong>
                                    </span>
                        @endif 
               
                 </div> 
            
                <div class="form-group">
            <label>Enter event Description</label>
           <textarea id="event_description" name="event_description" class="form-control to_ck">
            {{$event_edit->description}}</textarea>
                                  
                    @if ($errors->has('event_description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('event_description') }}</strong>
                                    </span>
                        @endif 
               
                 </div> 

            
               <div class="form-group">
                    <label>Date and time range:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                      <input type="text" class="form-control pull-right reservation"
                       id="event_reservation"
                      name="event_reservation" 
                      value="{{date("d/m/Y h:i:s", strtotime($event_edit->start_time))}}-{{date("d/m/Y h:i:s", strtotime($event_edit->end_time))}}">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
               <img class="img-responsive pad" src="{{$event_edit->photo}}" alt="Photo">
               <div class="form-group">
              <label>Upload event Image</label>
              <input type="file" name="event_image" class="form-control" id="event_image">
              @if ($errors->has('event_image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('event_image') }}</strong>
                                    </span>
                        @endif 
              </div>
          
              
        
                 </div> <!-- /.box-body -->
                 <input type="hidden" value="{{$event_edit->id}}" name="event_id">
                  <input type="hidden" value="{{$event_edit->photo}}" name="event_image1">
                <div class="box-footer">
                <input type="submit" value="Update event" class="btn btn-primary"/>
                </div>
                 {!! Form::close() !!}
                  </div><!-- /.box -->
                  </div>
          @endif