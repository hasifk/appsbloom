@extends('clientadmin.layouts.client_dashboard_layout')
@section('content')
<h3><b><center>Price Lists</center></b></h3>
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Price Lists</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="box-body pad">
                        @if(!empty($pricelists[0]->price_lists))
                        {!!$pricelists[0]->price_lists!!}
                        @else
                        Empty Price Lists
                        @endif
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add/Update Price lists</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(array('url' => 'pricelists_save')) !!}
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <textarea id="offer_info" class="to_ck" name="price_lists" rows="10" cols="80">
                            <?php
                            if (!empty($pricelists[0]->price_lists)):
                                echo $pricelists[0]->price_lists;
                            endif;
                            ?>
                        </textarea>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                {!! Form::close() !!}
            </div><!-- /.box -->
        </div>
    </div>
</section>
@endsection