<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body {
      background-color: #2d197c;
      height: 100vh;
      width: 100vw;
      position: relative;
    }

    .card {
      position: absolute;
      background-color: white;
      width: 50vw;
      padding: 20px;
      height: 30%;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      border-radius: 10px;
    }

    .title {
      margin: 0;
    }

    .todo {
      width: 100%;
      margin: 10px;
      text-align: center;
    }

    .todo-create {
      width: 100%;
    }

    .text-add {
      width: 80%;
      border: 1px solid #ccc;
    }

    .item {
      width: 100%;
      display: flex;
      justify-content: space-between;
    }

    .item-text {
      width: 100%;
    }
  </style>
</head>

<body>
  <div class="card">
    <h1 class="title">Todo List</h1>
    <div class="todo">
      <div class="todo-create">
        <input class="text-add" type="text">
        <button>送信</button>
      </div>
      <dl class="item">
        <dt class="item-text">作成日</dt>
        <dt class="item-text">タスク名</dt>
        <dt class="item-text">更新</dt>
        <dt class="item-text">削除</dt>
      </dl>
      @foreach ($items as $item)
      <tr class=todo-list>
        <th>
          {{$item->created_at}}
        </th>
        <th>
          {{$item->content}}
        </th>
        <th>
          <a href="">更新</a>
        </th>
        <th>
          <a href="">削除</a>
        </th>
      </tr>
      @endforeach
    </div>
  </div>
</body>

</html>