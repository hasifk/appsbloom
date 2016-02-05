 @if(isset($loyalty_list))
              @foreach($loyalty_list as $key => $value)
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <p>Loyalty Title:{{$value->title}}</p>
                  <p>Loyalty Count:{{$value->count}}</p>
                  <p>Loyalty Action:{{$value->action}}</p>
                  <div class="col-md-6">
<button class="glyphicon glyphicon-trash loyalty_delete" style="color:red" name="{{$value->id}}"></button>
<button class="glyphicon glyphicon-pencil loyalty_edit" style="color:red" name="{{$value->id}}"></button>
                </div>
              
             
              </div>
            </div>
            </div>
              @endforeach
              @endif