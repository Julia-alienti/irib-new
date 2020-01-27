<li class="news__list-item">
    <a href="javascript:void(0)">
                            <span class="news__item-body">
                                <span class="news__list-img">
                                    <span class="news__list-img-wrap">
                                        <img src="<?php the_post_thumbnail_url('large'); ?>" data-srcset="<?php the_post_thumbnail_url('full'); ?> 2x" alt="" class="js-img">
                                    </span>
                                </span>
                                <span class="news__list-content">
                                    <span class="news__list-hd"><?php the_title(); ?></span>
                                    <span class="news__list-text"><?php echo get_the_excerpt(); ?></span>
                                    <span class="news__list-big-text"><?php echo $post->post_content; ?></span>
                                </span>
                            </span>
        <span class="leaves"></span>
    </a>
</li>