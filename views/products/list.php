<div class="product__list__container container">
    <div class="header__container">
        <div class="page__header__title">
            <h1>Product List</h1>
        </div>

        <form class="list__action__form" >

            <div class="delete__switcher__container">
                <select required id="delete__switcher" name="delete__switcher" class="delete__switcher">
                    <option value="0" disabled selected>Mass Delete Action</option>
                    <option value="delete">Delete</option>
                </select>
            </div>

            <div class="delete__btn__container">
                <input class="apply__btn" id="apply__btn" type="submit" value="Apply">
            </div>

        </form>

    </div>


    <div class="product__container">
        <div class="row">

            <?php foreach ($products as $key => $product) : ?>
                <div class="col-md-3 col-xs-12 product__box__container"  id="<?= $product['sku'] ?>">
                    <div class="product__box">

                        <div class="checkbox__container">
                            <input type="checkbox" name="product__checker" data-sku="<?= $product['sku'] ?>">
                        </div>

                        <div class="product__info__container">
                            <p><?= $product['sku']; ?></p>
                            <p><?= $product['name']; ?></p>
                            <p>
                                <?= $product['price']; ?>
                                <span class="type__property">$</span>
                            </p>

                            <?php if($product['type_name'] == 'Book'): ?>
                                <p>
                                    <span class="type__property">Weight:</span>
                                    <?= unserialize($product['prod_info'])['weight'] ; ?>
                                    <span class="type__property">KG</span>

                                </p>
                            <?php elseif($product['type_name'] == 'Dvd'): ?>
                                <p>
                                    <span class="type__property">Size:</span>
                                    <?= unserialize($product['prod_info'])['size']; ?>
                                    <span class="type__property">MB</span>
                                </p>
                            <?php else: ?>
                                <p>
                                    <span class="type__property">Dimension:</span>
                                    <?=
                                        unserialize($product['prod_info'])['height'] . 'x' .
                                        unserialize($product['prod_info'])['width'] . 'x' .
                                        unserialize($product['prod_info'])['length'] . 'x'
                                    ?>
                                </p>
                            <?php endif; ?>

                        </div>

                    </div>
                </div>
            <?php endforeach; ?>


        </div>
    </div>

</div>
