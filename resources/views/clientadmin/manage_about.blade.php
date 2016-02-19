@extends('clientadmin.layouts.client_dashboard_layout')

@section('content')

<h3><b><center>About Us</center></b></h3>

   <section class="content">
          <div class="row">
            <div class="col-md-12">
               <div class="box">
             
                 <div class="box-body pad"> 
                 {!! Form::open(array('url' => 'saveabout')) !!} 
                      {{ csrf_field() }}
                <textarea id="about_us_content" name="about_us_content" rows="10" cols="80" class="to_ck">
                                   @if(isset($about_us)) {{$about_us->aboutus}} @endif
                    </textarea>
                    @if ($errors->has('about_us_content'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('about_us_content') }}</strong>
                                    </span>
                        @endif 
               
                    
                 
                 <input type="submit" value="GO" />
                 {!! Form::close() !!}
               </div>
              </div>
            </div><!-- /.col-->
          </div><!-- ./row -->
        </section>
@endsection