@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    新任務
                </div>

                <div class="panel-body">
                    <!-- 顯示驗證錯誤 -->
                @include('common.errors')

                <!-- 新任務的表單 -->
                    <form action="{{ route('tasks.index') }}" method="POST" class="form-horizontal">
                    @method('POST')
                    @csrf

                    <!-- 任務名稱 -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">任務</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">
                            </div>
                        </div>

                        <!-- 增加任務按鈕 -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>增加任務
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- 目前任務 -->
            @if (count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        目前任務
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                            <th>任務</th>
                            <th>&nbsp;</th>
                            </thead>
                            <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td class="table-text"><div>{{ $task->name }}</div></td>

                                    <!-- 任務刪除按鈕 -->
                                    <td>
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf

                                            <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>刪除
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
