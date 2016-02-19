@extends('clientadmin.layouts.client_dashboard_layout')

@section('content')

<h3><b><center>Contact Us</center></b></h3>

   <section class="content">
          <div class="row">
            <div class="col-md-12">
               <div class="box">
            
                 <div class="box-body pad"> 
                 {!! Form::open(array('url' => 'savecontact')) !!} 
                      {{ csrf_field() }}
           <textarea id="contact_us_content" name="contact_us_content" rows="10" cols="80" class="to_ck">
                                   @if(isset($contact_us)) {{$contact_us->contact_us}} @endif
                    </textarea>
                    @if ($errors->has('contact_us_content'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contact_us_content') }}</strong>
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