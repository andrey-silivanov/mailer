@extends('layouts.app')



@section('main-content')

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <a href="{{asset('/new')}}">  <button class = "btn btn-success">
                            <span class = "glyphicon glyphicon-pencil"></span> Написать письмо
                        </button></a>
                        <button class = "btn btn-danger">
                            <span class = "glyphicon glyphicon-trash"></span> Удалить выбранные письма
                        </button>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        {!! $grid !!}
                    </div><!-- /.box-body -->

                </div><!-- /.box -->
            </div>
        </div>

@endsection
