<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <style>
    p {
      color: red;
      font-weight: bold;
    }

    .flash_message {
      font-weight: bold;
      text-align: center;
    }

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
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      border-radius: 10px;
    }

    .title-text {
      font-weight: bold;
      font-size: 24px;
      margin-bottom: 0px;
    }

    .add-form {
      text-align: center;
      padding: 0px;
      margin-bottom: 10px;
      vertical-align: baseline;
    }

    .add-text {
      border-radius: 5px;
      width: 80%;
      border: 1px solid #ccc;
      padding: 7px;
    }

    .add-botten {
      border-radius: 5px;
      color: #dc70fa;
      border: 2px solid #dc70fa;
      background-color: white;
      padding: 5px 10px;
      cursor: pointer;
      transition: 0.4s;
      white-space: nowrap;
    }

    .add-botten:hover {
      background-color: #dc70fa;
      color: white;
    }

    .items {
      width: 100%;
      text-align: center;
    }

    .items-table {
      margin: 0;
      width: 100%;
    }

    .items-text {
      height: 50px;
    }

    .update-text {
      border-radius: 5px;
      font-size: 14px;
      border: 1px solid #ccc;
      width: 80%;
      margin: 0px 10px;
      padding: 10px;
    }

    .update-botten-table {
      white-space: nowrap;
    }

    .update-botten {
      border: 2px solid #fa9770;
      font-size: 12px;
      color: #fa9770;
      background-color: #fff;
      font-weight: bold;
      padding: 8px 16px;
      margin-left: 10px;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.4s;

    }

    .update-botten:hover {
      background-color: #fa9770;
      border-color: #fa9770;
      color: #fff;
    }

    .delete-botten-table {
      white-space: nowrap;
    }


    .delete-botten {
      border: 2px solid #71fadc;
      font-size: 12px;
      color: #71fadc;
      background-color: #fff;
      font-weight: bold;
      padding: 8px 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.4s;
    }

    .delete-botten:hover {
      background-color: #71fadc;
      border-color: #71fadc;
      color: #fff;
    }
  </style>
</head>

<body>
  <div class="card">
    <!-- フラッシュメッセージ -->
    @if (session('flash_message'))
    <div class="flash_message">
      {{ session('flash_message') }}
    </div>
    @endif
    <h1 class="title-text">Todo List</h1>
    <div class="add-form">
      <form action="/todo/create" method="POST">
        @csrf
        <input class="add-text" type="text" name="content">
        <button class="add-botten">追加</button>
        @error('content')
        <tr>
          <p>※タスク名は20文字以内です。</p>
        </tr>
        @enderror
      </form>
    </div>
    <div class="items">
      <table class=items-table>
        <tr class="items-text">
          <th>作成日</th>
          <th>タスク名</th>
          <th>更新</th>
          <th>削除</th>
        </tr>
        @foreach ($items as $item)
        <tr>
          <td>
            {{$item->created_at}}
          </td>
          <td>
            <form action="todo/update" method="POST">
              @csrf
              <input type="hidden" name="id" value="{{$item->id}}">
              <input class="update-text" type=" text" name="content" value="{{$item->content}}">
          </td>
          <td class="update-botten-table">
            <button class="update-botten">更新</button>
          </td>
          </form>
          <td class="delete-botten-table">
            <form action="todo/delete" method="POST">
              @csrf
              <input type="hidden" name="id" value="{{$item->id}}">
              <button class="delete-botten">削除</button>
          </td>
          </form>
        </tr>
        @endforeach
      </table>
    </div>
</body>

</html>