@extends('clientadmin.layouts.client_dashboard_layout')

@section('content')

<h3><b><center>Contact Us</center></b></h3>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                {!! Form::open(array('url' => 'savecontact')) !!} 
                <div class="box-body pad"> 
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea id="contact_us_content" name="contact_us_content" rows="10" cols="80" class="to_ck">
                                   @if(isset($contact_us)) {{$contact_us->contact_us}} @endif
                        </textarea>
                        @if ($errors->has('contact_us_content'))
                        <span class="help-block">
                            <strong>{{ $errors->first('contact_us_content') }}</strong>
                        </span>
                        @endif 
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div><!-- /.col-->
    </div><!-- ./row -->
</section>
@endsection