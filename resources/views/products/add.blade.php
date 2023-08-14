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
            <h2>Add Product</h2>
            <form action="/console/products/add" method="post" novalidate class="w3-margin-bottom">
                <?= csrf_field() ?>

                <div class="w3-margin-bottom">
                    <label for="productName">Product Name:</label>
                    <input type="text" id="productName" name="productName" required value="<?= old('productName') ?>">

                    <?php if($errors->first('productName')): ?>
                        <div class="w3-text-red"><?= $errors->first('productName'); ?></div>
                    <?php endif; ?>
                </div>
                <div class="w3-margin-bottom">
                    <label for="description">Product Description:</label>
                    <input type="text" id="description" name="description" required value="<?= old('description') ?>">

                    <?php if($errors->first('description')): ?>
                        <div class="w3-text-red"><?= $errors->first('description'); ?></div>
                    <?php endif; ?>
                </div>
                <div class="w3-margin-bottom">
                    <label for="url">Product url:</label>
                    <input type="url" id="url" name="url" required value="<?= old('url') ?>">

                    <?php if($errors->first('url')): ?>
                        <div class="w3-text-red"><?= $errors->first('url'); ?></div>
                    <?php endif; ?>
                </div>
                <div class="w3-margin-bottom">
                    <label for="image">Product image link:</label>
                    <input type="text" id="image" name="image" required value="<?= old('image') ?>">

                    <?php if($errors->first('image')): ?>
                        <div class="w3-text-red"><?= $errors->first('image'); ?></div>
                    <?php endif; ?>
                </div>
                <div class="w3-margin-bottom">
                    <label for="price">Product price:</label>
                    <input type="text" id="price" name="price" required value="<?= old('price') ?>">

                    <?php if($errors->first('price')): ?>
                        <div class="w3-text-red"><?= $errors->first('price'); ?></div>
                    <?php endif; ?>
                </div>
                <div class="w3-margin-bottom">
                    <label for="stockQuantity">Product Quantity:</label>
                    <input type="number" id="stockQuantity" name="stockQuantity" required value="<?= old('stockQuantity') ?>">

                    <?php if($errors->first('stockQuantity')): ?>
                        <div class="w3-text-red"><?= $errors->first('stockQuantity'); ?></div>
                    <?php endif; ?>
                </div>

                <div class="w3-margin-bottom">
                    <label for="brand_id">Product Brand:</label>
                    <select name="brand_id" id="brand_id">
                        <option disabled selected>Select the Brand</option>
                        <?php foreach($brands as $brand): ?>
                            <option value="<?=$brand->id?>" <?= $brand->id == old('brand_id') ? 'selected' : '' ?>>
                                <?= $brand->brandName ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <?php if($errors->first('brand_id')): ?>
                        <div class="w3-text-red"><?= $errors->first('brand_id'); ?></div>
                    <?php endif; ?>
                </div>

                <div class="w3-margin-bottom">
                    <label for="category_id">Product Category:</label>
                    <select name="category_id" id="category_id">
                        <option disabled selected>Select the Category</option>
                        <?php foreach($categories as $category): ?>
                            <option value="<?=$category->id?>" <?= $category->id == old('category_id') ? 'selected' : '' ?>>
                                <?= $category->categoryName ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <?php if($errors->first('category_id')): ?>
                        <div class="w3-text-red"><?= $errors->first('category_id'); ?></div>
                    <?php endif; ?>
                </div>
                
                <button type="submit" class="w3-button w3-green">Add Product</button>

            </form>

            <a href="/console/products/list">Back to Products List</a>

    </section>
</body>
</html>