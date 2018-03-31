@extends('layouts.master')

@section('首页', 'Page Title')

@section('sidebar')
    @parent
@endsection
<div>
    1
</div>
<div>
    1
</div>
<div>
    1
</div>


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a href="./newpart"><button class="btn btn-success">新增软件</button></a>
                <a href="./newdll"><button class="btn btn-success">新增组件</button></a>
                <a href="./dll"><button class="btn btn-success">所有组件</button></a>
                <a href="./index"><button class="btn btn-success">所有软件</button></a>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                    <td>名称</td>
                    <td>版本</td>
                    <td>作者</td>
                    <td>最近更新</td>
                    <td></td>
                    <td>操作</td>
                    </thead>
                    <tbody>
                    @foreach ($parts as $part)
                        <tr>
                            <td><a href="./partdetail/{{$part->id}}">{{$part->name}} </td>
                            <td>{{$part->version}}</td>
                            <td>{{$part->auth}}</td>
                            <td>{{$part->updated_at}}</td>
                            <td>{{$part->status}}</td>
                            <td><a href="./del/{{$part->id}}"><button class="btn btn-danger">删除</button></a>
                                <a href="./{{$part->name}}/{{$part->name}}"><button class="btn btn-danger">下载</button></a>
                                {{--<a href="./product/detail/{{$product->id}}"><button class="btn btn-danger">详情介绍</button></a>--}}
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection