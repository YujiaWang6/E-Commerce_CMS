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
        <h2>Manage Products</h2>
        <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
            <tr class="w3-red">
                <th></th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Brand</th>
                <th>Category</th>
                <th>Created</th>
                <th></th>
                <th></th>
            </tr>
            <?php foreach($products as $product):?>
                <tr>
                    <!--Get the stored img link and display-->
                    <td><a href="<?= $product->url ?>" target="_blank"><img src="<?= $product->image ?>" width="200"></a></td>
                    <td><?= $product->productName ?></td>
                    <td><?= $product->description ?></td>
                    <td><?= $product->price ?></td>
                    <td><?= $product->stockQuantity ?></td>
                    <td><?= $product->brand->brandName?></td>
                    <td><?= $product->category->categoryName?></td>
                    <td><?= $product->created_at->format('M j, Y')?></td>
                    <td><a href="/console/products/edit/<?= $product->id ?>">Edit</a></td>
                    <td><a href="/console/products/delete/<?= $product->id ?>">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <a href="/console/products/add" class="w3-button w3-green">New Product</a>

    </section>
    
</body>
</html>