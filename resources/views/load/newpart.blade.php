
@extends('layouts.master')

@section('新增商品', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">新增组件</div>
        </div>
        <div class="panel-body" >
            <form method="POST" action="./savepart" class="form-horizontal" enctype="multipart/form-data" role="form">
                {!! csrf_field() !!}
                <fieldset>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">名称</label>
                        <div class="col-md-9">
                            <input id="name" name="name" type="text" placeholder="项目名称" class="form-control input-md" required="">

                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="name">版本</label>
                            <div class="col-md-9">
                                <input id="version" name="version" type="text" placeholder="项目版本" class="form-control input-md" required="">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="price">作者</label>
                            <div class="col-md-9">
                                <input id="auth" name="auth" type="text" placeholder="软件作者" class="form-control input-md" required="">

                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-md-3 control-label" for="file">文件</label>
                            <div class="col-md-9">
                                <input id="file" name="file" class="input-file" type="file">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="submit"></label>
                            <div class="col-md-9">
                                <button id="submit" name="submit" class="btn btn-primary">提交</button>
                            </div>
                        </div>

                </fieldset>

            </form>
        </div>
    </div>


@endsection