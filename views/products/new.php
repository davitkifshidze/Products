<div class="product__add__container container">
    <div class="header__container">
        <div class="page__header__title">
            <h1>Product Add</h1>
        </div>
        <div class="product__save__btn">
            <input class="save__btn" id="save__btn" type="submit" value="Save">
        </div>
    </div>

    <div class="form__container">
        <form id="product__form" action="/products/new" method="post">
            <div class="form__group">
                <label for="sku" class="input__name">SKU</label>
                <input required id="sku" type="text" name="sku">

                <?php if (isset($error['sku__error'])) { ?>
                    <label id="sku-error" class="error fail-alert" for="sku"><?= $error['sku__error'] ?></label>
                <?php } ?>

            </div>
            <div class="form__group">
                <label for="name" class="input__name">name</label>
                <input required id="name" type="text" name="name" value="<?= $product['price'] ?>">
            </div>
            <div class="form__group">
                <label for="price" class="input__name">price</label>
                <input required id="price" type="text" name="price" value="<?= $product['price'] ?>">
            </div>
            <div class="form__group">
                <label for="type__switcher" class="input__name">Type Switcher</label>
                <select  id="type__switcher" name="type" class="type__switcher">
                    <option value="0" disabled selected>Type Switcher</option>
                    <?php foreach ($product__type as $key => $item): ?>
                        <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="type__switcher__content">
                <div class="custom__form__group">

                </div>
            </div>
        </form>
    </div>
</div>
