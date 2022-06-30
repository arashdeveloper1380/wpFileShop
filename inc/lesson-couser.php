<?php 
    $course = get_post_meta(get_the_ID(), 'arash_group_lesson',true);
    if(!empty($course)):
        foreach($course as $value):
?>
<div class="lesson-course">
    <ul>
        <li>
            <h4>
                <?= $value['course_chapter_title'] ?>
                <i class="fas fa-angle-down"></i>
            </h4>
            <ul>
                <div class="meta-course">
                    <div class="time-course">
                        <i class="fas fa-clock"></i>
                        <span>مدت زمان فصل :</span>
                        <span><?= $value['course_chapter_time'] ?></span>
                    </div>
                    <?php 
                    global $product;
                    global $current_user;
                    $id = $product->id;
                    if(is_user_logged_in()){
                        $current_user = wp_get_current_user();
                    }
                    if(wc_customer_bought_product($current_user->user_email,$current_user->ID, $id)){?>
                    <div class="dl-course">
                        <a href="<?= $value['course_chapter_link'] ?>" target="_blank">
                            <i class="fas fa-download"></i>
                            لینک دانلود فصل
                        </a>
                    </div>
                    <?php }else{?>
                        <div class="dl-course">
                            <a style="background-color: #ccc">
                                <i class="fas fa-download"></i>
                                لینک دانلود غیر فعال
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <div class="clear"></div>

                <?php foreach($value['course_chapter_lesson'] as $item): ?>
                    <li>
                        <i class="fas fa-check"></i> 
                        <?= $item ?>
                    </li>
                <?php endforeach; ?>

            </ul>
        </li>
    </ul>
</div>
<?php endforeach; endif; ?>