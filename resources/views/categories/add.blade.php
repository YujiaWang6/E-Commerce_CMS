<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="/app.css">
    <script src="/app.js"></script>
</head>
<body>
    <header class="w3-padding">
        <h1 class="w3-text-red">Products CMS Dashboard</h1>
        <?php if(Auth::check()): ?>
            You are logged in as
            <?= auth()->user()->first ?> <?= auth()->user()->last?> |
            <a href="/console/logout">Logout</a> |
            <a href="/console/dashboard">Dashboard</a> |
            <a href="/">Website Home Page</a>
        <?php else: ?>
            <a href="/">Return to Products Page</a>
        <?php endif; ?>
    </header>

    <section class="w3-padding">
            <h2>Add Category</h2>
            <form action="/console/categories/add" method="post" novalidate class="w3-margin-bottom">
                <?= csrf_field() ?>

                <div class="w3-margin-bottom">
                    <label for="categoryName">Category Name:</label>
                    <input type="text" id="categoryName" name="categoryName" required value="<?= old('categoryName') ?>">

                    <?php if($errors->first('categoryName')):?>
                        <span class="w3-text-red"><?= $errors->first('categoryName')?></span>
                    <?php endif; ?>
                </div>

                <button type="submit" class="w3-button w3-green">Add Category</button>

            </form>

            <a href="/console/categories/list">Back to Categories List</a>

    </section>
</body>
</html>