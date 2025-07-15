<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>練習</title>
</head>
<body>
<div class="m-5">
    <div id="errorBox"></div>

    <form method="POST" id="postForm" class="border p-3 mb-3">
        <label for="name" class="form-label">名前</label>
        <input type="text" name="name" id="name" class="form-control">
        <label for="comment" class="form-label">コメント</label>
        <textarea name="comment" id="comment" class="form-control"></textarea>
        <button type="submit" id="postBtn" class="btn btn-primary mt-2">投稿</button>
    </form>

    <div id="commentArea" class="commentArea"></div>
</div>

    <script src="./js/script.js"></script>
    <!-- bootstrap -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>