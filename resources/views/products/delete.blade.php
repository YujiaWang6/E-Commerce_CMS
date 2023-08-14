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

    <?php if(session()->has('message')):?>
        <div class="w3-padding w3-margin-top w3-margin-bottom">
            <div class="w3-red w3-center w3-padding">
                <?= session()->get('message')?>
            </div>
        </div>
    
    <?php endif;?>

    <section class="w3-padding">
            <h2>Product Delete Confirm: <?= $product->productName ?></h2>
            <form method="post" action="/console/products/deleted/<?= $product->id ?>" novalidate>
                <?= csrf_field() ?>
                <button type="submit" class="w3-button w3-red">Confirm</button>
                <a href="/console/products/list" class="w3-button w3-gray">Back to the Product list</a>

            </form>

    </section>
    
</body>
</html>