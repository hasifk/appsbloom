 @if(isset($service_list))
              @foreach($service_list as $key => $value)
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <img class="img-responsive pad" src="{{$value->image}}" alt="Photo">
                  <p>{{$value->description}}</p>
                  <div class="col-md-6">
<button class="glyphicon glyphicon-trash service_delete" style="color:red" name="{{$value->id}}"></button>
<button class="glyphicon glyphicon-pencil service_edit" style="color:red" name="{{$value->id}}"></button>
                </div>
              
             
              </div>
            </div>
            </div>
              @endforeach
              @endif