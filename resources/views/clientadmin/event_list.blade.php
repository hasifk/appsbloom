    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                         @if(isset($event_list))
              @foreach($event_list as $key => $value)
                       
                       <div class="panel panel-default" id="removal">
                           <div class="panel-heading" role="tab" id="heading_{{$value->id}}">
                               <h4 class="panel-title">
                                   <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$value->id}}" aria-expanded="false" aria-controls="collapse_{{$value->id}}">

                                       <span class="text">{{$value->title}}</span>
                                   </a>
                                   <!-- General tools such as edit or delete-->
                                   <span class="tools pull-right">
                                       {!! date('d - m - Y',strtotime($value->created_at))!!} &nbsp;&nbsp;&nbsp;
                                 <i class="fa fa-edit event_edit" name="{{$value->id}}"></i>
                                       <i class="fa fa-trash-o event_delete" name="{{$value->id}}"></i>
                                   </span>
                               </h4>
                           </div>
                           <div id="collapse_{{$value->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_{{$value->id}}">
                               <div class="panel-body">
                                <p>event Title:{{$value->title}}</p>
                  <p>event Start:{{date("d/m/Y h:i:s", strtotime($value->start_time))}}</p>
                  <p>event End:{{date("d/m/Y h:i:s", strtotime($value->end_time))}}</p>
                       <p>event Title:{{$value->description}}</p>  
                       <img class="img-responsive pad" src="{{$value->photo}}" alt="Photo">           
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