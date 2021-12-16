<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .all {
      background-color: #2d197c;
      height: 100vh;
      width: 100vw;
      position: relative;
    }

    .card {
      position: absolute;
      margin: 0 auto;
      background-color: white;
      padding: 30px;
      height: 50%;
      width: 50%;
      border-radius: 10px;
    }
  </style>
</head>

<body>
  <div class=card>
    <h1 class="title">Todo List</h1>
    <div class="todo">
      <div class="todo-create">
        <input class="todo-create-text" type="text">
        <input class="button-add " type="submit" value="追加">
      </div>
      <tr class=item-text>
        <th>作成日</th>
        <th>タスク名</th>
        <th>更新</th>
        <th>削除</th>
      </tr>
      @foreach ($items as $item)
      <tr class=todo-list>
        <th>
          {{$item->created_at}}
        </th>
        <th>
          {{$item->content}}
        </th>
        <th>
          <a href="/todo/update/{{$todo->id}}	">更新</a>
        </th>
        <th>
          <a href="/todo/delete/{{$todo->id}}	">削除</a>
        </th>
      </tr>
      @endforeach
    </div>
  </div>
</body>

</html>