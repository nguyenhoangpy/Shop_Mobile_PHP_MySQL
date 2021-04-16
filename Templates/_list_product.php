<?php
$product_shuffle = $product->getData();
$brand = array_map(function ($product) {
    return $product['item_brand'];
}, $product_shuffle);
$unique = array_unique($brand);
sort($unique);
?>
<!-- Special Price -->
<section id="special-price">
    <div class="container">
        <h4 class="font-opensans font-size-20">ĐIỆN THOẠI</h4>
        <div id="filters" class="button-group text-right font-opensans font-size-16">
            <button class="btn is-checked btn-danger" data-filter="*">Tất cả</button>
            <?php
            array_map(function ($brand) {
                echo "  <button class='btn btn-danger' data-filter='.$brand'>$brand</button>";
            }, $unique);
            ?>
        </div>

        <div class="grid">
            <?php array_map(function ($item) { ?>
                <div class="grid-item border <?php echo $item['item_brand'] ?? "Brand" ?>">
                    <div class="item py-2" style="width: 200px;">
                        <div class="product font-opensans">
                            <div class="heightlabel">
                                <label class="installment color-yellow-bg">Trả góp <b>0%</b></label>
                            </div>
                            <a href="#"><img src="<?php echo $item['item_image'] ?? "./assets/products/samsung-galaxy-s21-5g.jpg"; ?>" alt="samsung-galaxy-s21-5g" class="img-fluid"></a>
                            <div class="text-center">
                                <h6 class="font-opensans"><?php echo $item['item_name'] ?? "Unknown"; ?></h6>
                                <div class="rating text-warning font-size-12">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </div>
                                <div class="price py-2">
                                    <strong class="font-opensans color-red"><?php echo (int)$item['item_price'] ?? 0 ?></strong>
                                    <!-- <span class="font-opensans" style="text-decoration: line-through;">33.990.000₫</span> -->
                                </div>

                                <button type="submit" class="btn btn-warning font-size-12">Mua hàng</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }, $product_shuffle) ?>
        </div>
    </div>
</section>
<!-- !Special Price -->