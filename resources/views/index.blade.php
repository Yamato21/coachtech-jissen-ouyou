<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todolist</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/reset.css">

  <style>
  </style>
</head>

<body>
  <div class="all">
    <div class="card">
      <h1 class="title">Todolist</h1>
      <form action="/create{taskname}" method="post" class="flex">
        @csrf
        <input class="border" type="text" name="task_name">
        <input class="plus" type="submit" name="buttton_task" value="追加">
      </form>
      <table class="List">
        <div class="mdiasi"></div>
        <tr class="tble">
          <th class="createday">作成日</th>
          <th class="task_date">タスク名</th>
          <th class="kousin">更新</th>
          <th class="sakujyo">削除</th>
        </tr>
          <div class="naiyou">
        <tr>
          @if ($indexs->isNotEmpty())
          @foreach($indexs as $index)
          <td class="day">{{$index->created_at}}</td>
          <td class="task">{{$index->task_name}}</td>
          <td>
          <form action="/update{id,task_name}" method="post">
          @csrf
          <button class="upd">更新</button>
          </td>
          <td>
          <form action="/delete{id}" method="post">
          @csrf
          <button class="del">削除</button>
          </td>
          @endforeach
          @endif
        </tr>
        </div>
    </table>
  </div>
  </div>
</body>
</html>