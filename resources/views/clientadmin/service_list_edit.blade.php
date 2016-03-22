@if(isset($service_edit))
<script src="{{asset('assets/clientassets/js/custom.js')}}"></script>
<div class="col-md-12">
    <div class="box box-primary">
        {!! Form::open(array('url' => 'updateservice','files' => true)) !!} 
        {{ csrf_field() }}
        <div class="box-body">
            <img class="img-responsive pad" src="{{asset($service_edit->image)}}" alt="Photo">
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
                <label for="exampleInputEmail1">Service Title </label>
                {!! Form::text('title',$service_edit->title,array("id"=>"title","class"=>"form-control","placeholder"=>"Service Title")) !!}
                 @if ($errors->has('title'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
                @endif 
            </div>

            <div class="form-group">
                <label>Enter Service Description</label>
                {{ Form::textarea('service_content',$service_edit->description,['id' => 'service_content','class'=>'to_ck']) }}
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