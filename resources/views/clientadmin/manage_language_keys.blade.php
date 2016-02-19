@extends('clientadmin.layouts.client_dashboard_layout')

@section('content')

<h3><b><center>Manage Language Keys</center></b></h3>
   <div class="box-body" id="show_langKey_list">
                   <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        @if(isset($langkey_list))
                    @foreach($langkey_list as $key => $value)
                       
                       <div class="panel panel-default" id="removal">
                           <div class="panel-heading" role="tab" id="heading_{{$value->id}}">
                               <h4 class="panel-title">
                                   <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$value->id}}" aria-expanded="false" aria-controls="collapse_{{$value->id}}">

                                       <span class="text">{{$value->key}}</span>
                                   </a>
                                   <!-- General tools such as edit or delete-->
                                   <span class="tools pull-right">
                                       {!! date('d - m - Y',strtotime($value->created_at))!!} &nbsp;&nbsp;&nbsp;
                                 <i class="fa fa-edit langkey_edit" name="{{$value->id}}"></i>
                                       <i class="fa fa-trash-o langkey_delete" name="{{$value->id}}"></i>
                                   </span>
                               </h4>
                           </div>
                           <div id="collapse_{{$value->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_{{$value->id}}">
                               <div class="panel-body">
                                 Key:  {!!$value->key!!}
                                      <br>
                                 value: {!!$value->lang_value!!}
                                
                                   
                               </div>
                           </div>
                       </div>
                       @endforeach
                       @else
                       <div class="panel panel-default">
                           <div class="panel-heading" role="tab" id="heading">
                               <h4 class="panel-title">
                                       <span class="text">No Language Keys</span>
                               </h4>
                           </div>
                       </div>
                       @endif
                   </div>
               </div>
   <section class="content" id="show_langKey_list_edit">
         <div class="col-md-12">
         <div class="box box-primary">
              

   {!! Form::open(array('url' => 'savelangkey','files' => true)) !!} 
                      {{ csrf_field() }}
              <div class="box-body">
            
          
            <div class="form-group">
            <label>Select Language</label>
       @if(isset($language_list))
       <select name="lang_selected" id="lang_selected">
       @foreach($language_list as $key=>$value)
       <option id="{{$value->id}}">{{$value->language}}</option>
       @endforeach
       </select>
       @endif
               
                 </div> 


                      <div class="form-group">
            <label>Enter language Key</label>
        <input type="text" id="language_key" name="language_key" class="form-control"
         value="{{ old('language_key') }}" placeholder="Language Key" >
                                  
                    @if ($errors->has('language_key'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('language_key') }}</strong>
                                    </span>
                        @endif 
               
                 </div> 


                      <div class="form-group">
            <label>Enter language Value</label>
        <input type="text" id="language_value" name="language_value" class="form-control"
         value="{{ old('language_value') }}" placeholder="Language Value" >
                                  
                    @if ($errors->has('language_value'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('language_value') }}</strong>
                                    </span>
                        @endif 
               
                 </div> 

         
    <input type="hidden" name="lang_selected_id" id="lang_selected_id">
                 </div> <!-- /.box-body -->
                <div class="box-footer">
                <input type="submit" value="Save language Key" class="btn btn-primary"/>
                </div>
                 {!! Form::close() !!}
                  </div><!-- /.box -->
                  </div>
      </section>

            
       
@endsection