@extends('layouts.app')



@section('main-content')

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Default Box Example</h3>
                        <div class="box-tools pull-right">
                            <!-- Buttons, labels, and many other things can be placed here! -->
                            <!-- Here is a label for example -->
                            <span class="label label-primary">Label</span>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        {!! $grid !!}
                    </div><!-- /.box-body -->

                </div><!-- /.box -->
            </div>
        </div>

@endsection
