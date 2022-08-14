@extends('layouts.app')

@section('content')

    <h1>タスク一覧</h1>
        @if(count($tasks) >0)
            <table class="table table-straiped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>タスク</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                    <tr>
                        <th>{!! link_to_route('tasks.show', $task->id, ['task'=>$task->id] ) !!}</th>
                        <th>{{ $task->content }}</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        {{--タスク作成ページへのリンク--}}
        {!! link_to_route('tasks.create', '新規タスクの作成', [], ['class'=>'btn btn-primary']) !!}


@endsection