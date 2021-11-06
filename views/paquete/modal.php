<?php

use yii\bootstrap4\Html;
?>
<div class="cont_central row justify-content-center">
    <div id="modal-text" class="cont_modal ">
        <div class="cont_photo">
            <div class="cont_img_back">
                <?= Html::img("@web/img/paquete/default.jpg") ?>
                <!-- <img src="assets/img/57989f2a2e186e38bf93429aa395120c.jpg"> -->
            </div>
            <div class="cont_mins">
                <div class="sub_mins">
                    <h3 class="text-sub">50</h3>
                    <h4 class="subtext-sub">MINS</h4>
                </div>
                <div class="cont_icon_right"><a href="#"><i class="fas fa-shopping-cart"></i></a></div>
            </div>
            <div class="cont_servings">
                <h3 class="text-sub">4</h3>
                <h4 class="subtext-sub">SERVINGS</h4>
            </div>
            <div class="cont_detalles">
                <h3>Shakshuka With Feta</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sagittis est est aliquam, sed faucibus massa lobortis. Maecenas non est justo.</p>
            </div>
        </div>
        <div class="cont_text_ingredients">
            <div class="cont_over_hidden">
                <div class="cont_tabs">
                    <ul>
                        <li><a href="#">
                                <h4 class="title-package">INGREDIENTS</h4>
                            </a></li>
                        <li><a href="#">
                                <h4 class="title-package">PREPARATION</h4>
                            </a></li>
                    </ul>
                </div>
                <div class="cont_text_det_preparation">
                    <div class="cont_title_preparation">
                        <p>STEP 1</p>
                    </div>
                    <div class="cont_info_preparation">
                        <p>Heat oven to 375 degrees</p>
                    </div>
                    <div class="cont_text_det_preparation">
                        <div class="cont_title_preparation">
                            <p>STEP 2</p>
                        </div>
                        <div class="cont_info_preparation">
                            <p>Heat oil in a large skillet over medium-low head. Add onion and bell papper. Cook gently until very soft, about 20 minutes. Add garlic and cook until tender, 1 to 2 minutes; stir in cumin, paprika and cook 1 minute. Pour in tomatoes and season with 3/4 teaspoon salt and 1/4 teaspoon pepper;</p>
                        </div>
                    </div>
                </div>
            </div>
            <?= Html::button('<i class="fas fa-arrow-left"></i>', ['id' => 'btn-close', 'class' => 'cont_btn_open_dets']) ?>
        </div>
    </div>
</div>
