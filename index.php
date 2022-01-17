<?php require('top.php')?>
<div class="body__overlay"></div>
        
        <!-- Start Slider Area -->
        <div class="slider__container slider--one bg__cat--3">
            <div class="slide__container slider__activation__wrap owl-carousel">
                <!-- Start Single Slide -->
                <div class="single__slide animation__style01 slider__fixed--height">
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                        <h2>collection 2018</h2>
                                        <h1>NICE CHAIR</h1>
                                        <div class="cr__btn">
                                            <a href="cart.html">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb">
                                    <img src="images/slider/fornt-img/1.png" alt="slider images">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->
                <!-- Start Single Slide -->
                <div class="single__slide animation__style01 slider__fixed--height">
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                        <h2>collection 2022</h2>
                                        <h1>NICE CAR</h1>
                                        <div class="cr__btn">
                                            <a href="cart.html">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb">
                                    <img src="images/slider/fornt-img/2.png" alt="slider images">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->
            </div>
        </div>
        <!-- Start Slider Area -->
        <!-- Start Category Area -->
        <section class="htc__category__area ptb--100">

        <!-- looping of category -->

        <?php
			foreach($cat_arr as $list){?>

			
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="section__title--2 text-center">
                                <h2 class="title__line"><a href="categories.php?id=<?php echo $list['id']?>"><?php echo $list['categories']?></a></h2>
                                <p>But I must explain to you how all this mistaken idea</p>
                            </div>
                        </div>
                    </div>
                    <div class="htc__product__container">
                        <div class="row">
                            <div class="product__list clearfix mt--30">
                                <?php
                                $get_product=get_product($con,4,$list['id']);
                                foreach($get_product as $list2){
                                    ?>
                                        <!-- Start Single Category -->
                                        <div class="card_p col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                            <div class="category">
                                                <div class="ht__cat__thumb">
                                                    <a href="product.php?id=<?php echo $list2['id']?>">
                                                        <img style="height: 10rem;" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list2['image']?>" alt="product images">
                                                    </a>
                                                </div>
                                                
                                                <div class="fr__product__inner">
                                                    <h4><a href="product-details.html"><?php echo $list2['name']?></a></h4>
                                                    <ul class="fr__pro__prize">
                                                        <li class="old__prize"><?php echo $list2['mrp']?></li>
                                                        <li><?php echo $list2['price']?></li>
                                                    </ul>
                                                   
                                                </div>
                                                 <div style="display: flex;flex-direction: row-reverse;margin: 10px 0;"><a href="get_link.php?id=<?php echo $list2['id']?>" class="btn btn-primary" target="_blank">Enroll Now</a></div>
                                            </div>
                                        </div>
                                        <!-- End Single Category -->

                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="display: flex;flex-direction: row-reverse;position: relative;right: 50px;"><a href="categories.php?id=<?php echo $list['id']?>" class="btn btn-primary">More..</a></div>
                

            <hr>
            <?php
			}
			?>

        </section>
        <!-- End Category Area -->
<?php require('footer.php')?>        