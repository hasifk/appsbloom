   <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        @if(isset($loyalty_list))
                        {!! $loyalty_list->links() !!}
                    @foreach($loyalty_list as $key => $value)
                       
                       <div class="panel panel-default" id="removal">
                           <div class="panel-heading" role="tab" id="heading_{{$value->id}}">
                               <h4 class="panel-title">
                                   <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$value->id}}" aria-expanded="false" aria-controls="collapse_{{$value->id}}">

                                       <span class="text">{{$value->title}}</span>
                                   </a>
                                   <!-- General tools such as edit or delete-->
                                   <span class="tools pull-right">
                                       {!! date('d - m - Y',strtotime($value->created_at))!!} &nbsp;&nbsp;&nbsp;
                                 <i class="fa fa-edit loyalty_edit" name="{{$value->id}}"></i>
                                       <i class="fa fa-trash-o loyalty_delete" name="{{$value->id}}"></i>
                                   </span>
                               </h4>
                           </div>
                           <div id="collapse_{{$value->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_{{$value->id}}">
                               <div class="panel-body">
                                <p>Loyalty Title:{{$value->title}}</p>
                                <p>Loyalty Count:{{$value->count}}</p>
                                <p>Stamp Code:{{$value->stamp_code}}</p>
                                <p>Loyalty Action:{{$value->action}}</p>
                                   
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