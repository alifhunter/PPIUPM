<?php
/**
 * Template Name: Template: Home
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<main>
<!-- Header jumbotron -->
<section class="jumbotron jumbotron-fluid jumbs">
    <div class="container vertical-center">
        <div class="row">
            <div class="col-md-7">
                <h1 class="color2">
                    Persatuan Pelajar Indonesia Universiti Putra Malaysia
                </h1>
                <p class="lead color2 mb-3"><?php bloginfo('description'); ?></p>
                <a class="btn-custom text-uppercase" href="<?php echo esc_url( home_url( '/' ) ); ?>tentang-kami">tentang kami</a>
            </div>
        </div>
    </div>
</section>
<!-- kegiatan -->
<section class="event-musician">
    <div class="container">
        <div class="row pt-5 pb-5">
            <div class="col-lg-12">
                <h3><?php echo get_cat_name( $category_id = '2' );  //get kategori name by id -> Kegiatan idnya 3 ?></h3>
                <p>Ikuti kegiatan-kegiatan menarik PPI UPM</p>
                <div class="row">
                    <div class="col-lg-10">
                        <div class="card-deck">
                        <?php
                            $kegiatan = array(
                                'post_type' => 'post',
                                'posts_per_page' => 3,
                                'category_name' => 'Kegiatan'
                            );
                            $kegiatan2 = new wp_Query($kegiatan);

                            while ($kegiatan2->have_posts()) : $kegiatan2->the_post();
                                echo '<div class="card event-card">';
                                echo '<div class="card-body">';
                                echo '<div class="card-title">'.the_date('d', '<h3>', '</h3>').'</div>';
                                echo '<p class="card-text">'.the_title().'</p></div>';
                                echo '<div class="card-footer">';
                                echo '<a href="'.get_permalink().'" class="btn-custom text-uppercase">Selengkapnya</a>';
                                echo '</div></div>';
                            endwhile;
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Informasi -->
<section class="bg-color2">
    <div class="container">
        <div class="row py-5">
            <div class="col-lg-6 align-self-center">
                <div class="col-sm-12">
                    <h3><?php echo get_cat_name( $category_id = '5' );  //get kategori name by id -> informasi idnya 4 ?></h3>
                    <p class="color5"><?php echo category_description(5);?></p>
                </div>
            </div>
            <div class="col-lg-6">
                <?php 
                    $informasi = array(
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'category_name' => 'Informasi'
                    );
                    $informasi2 = new wp_Query($informasi);

                    while($informasi2->have_posts()) : $informasi2->the_post();
                        echo '<div class="col-lg-12 pb-2">';
                        echo '<h6 class="color5 font-weight-bold">'.get_cat_name( $category_id = '5' ).'</h6>';
                        echo '<p>'.the_title().'</p>';
                        echo '<a class="btn-custom-inverted text-uppercase" href="'.get_permalink().'">selengkapnya</a>';
                        echo '</div><hr>';
                    endwhile;
                ?>
            </div>
        </div>
    </div>
</section>
<!-- Artikel -->
<section class="bg-color5">
    <img class="artikel-bg" src="clip-411.png" alt="">
    <div class="container">
        <div class="row py-5">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="d-flex">
                            <h3 class="color2 mr-auto">Artikel Terbaru</h3>
                            <a class="color2 text-right small" href="<?php echo esc_url( home_url( '/' ) ); ?>category/artikel/">Artikel lainnya ></a>
                        </div>
                    </div>
                </div>
                <p class="color2 font-weight-light small">"Reading is an exercise in empathy; an exercise in walking in someone else’s shoes for a while. —Malorie Blackman"</p>
                <div class="custom-card-deck mt-5">
                    <?php
                        //ngambil category_name pakai array
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 3,
                            'category_name'=>'Artikel',
                        );
                        $loop = new wp_Query($args);
                                
                        //di loop buat nampilin 
                        while($loop->have_posts()) : $loop->the_post();
                            echo '<div class="custom-card">';
                            echo '<div class="custom-card-header">';
                            echo '<img alt="" src="'.get_the_post_thumbnail($post->ID, 'category-thumb').'';
                            echo '</div>';
                            echo '<div class="custom-card-subtitle">'.get_cat_name($category_id = '3').'</div>';
                            echo '<div class="custom-card-title"><a href="'.get_permalink().'">';
                            the_title( '<h6>', '</h6>' );
                            echo '</a></div>';
                            echo '<div class="custom-card-text">';
                            echo the_content();
                            echo '</div>';
                            echo '<div class="custom-card-footer">';
                            echo the_time('F jS, Y');
                            echo '</div>';
                            echo '</div>';
                        endwhile;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- store *for later* -->
<section>
    <div class="container">
        <div class="row py-5">
            <div class="col-md-3 align-self-center">
                <h3>Store</h3>
                <p></p>
                <a class="btn-store" href="<?php echo esc_url( home_url( '/' ) ); ?>store">Lihat katalog</a>
                <!-- <a class="btn-store" href="http://"><i class="fa fa-arrow-right" aria-hidden="true"></i></a> -->
            </div>
            <div class="col-md-9">
                    <div class="card-deck">
                        <div class="card">                           
                            <img class="card-img2" src="<?php echo get_template_directory_uri(); ?>/img/gelas.png" alt="Card image">
                        </div>
                        <div class="card">                           
                            <img class="card-img2" src="<?php echo get_template_directory_uri(); ?>/img/totebag.png" alt="Card image">
                        </div>
                        <div class="card">                           
                            <img class="card-img2" src="<?php echo get_template_directory_uri(); ?>/img/pulpen.png" alt="Card image">
                        </div>
                    </div>
            </div>
        </div>
    </div>
</section> 
<!-- Galeri -->
<section class="bg-color2">
    <div class="container">
        <div class="row py-5">
            <div class="col-md-12">
                <div class="d-flex">
                    <h3 class="color5 mr-auto">Galeri</h3>
                    <a class="color5 text-right small" href="<?php echo esc_url( home_url( '/' ) ); ?>galeri">lihat selengkapnya ></a>
                </div>
                <?php
                    echo display_images_from_media_library(); 
                ?>
            </div>
        </div>
    </div>
</section>
<!-- youtube -->
<section class="vp-bg">
    <div class="container">
        <div class="row py-5">
            <div class="col-md-6">
                <div class="video-box py-5">
                    <div class="iframe-container">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/HsAX6GpEXRE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-6 align-self-center">
                <h2 class="color2 text-right font-weight-bold">Video Profil</h2>
                <h3 class="color2 text-right font-weight-light">Kunjungi kanal Youtube kami untuk video lainnya!</h3>
            </div>
        </div>
    </div>
</section>
<!-- about dan saran -->
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 bg-color1 mx-auto">
                <div class="container py-5">
                    <div class="d-flex flex-row-reverse">
                        <h3 class="color2">Siapa Kami?</h3>
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <div class="col-md-8 mt-3">
                            <p class="color2">
                                PPI UPM adalah perhimpunan pelajar indonesia
                                yang berkuliah di UPM, Serdang, Malaysia. PPI
                                UPM adalah organisasi mahasiswa yang
                                produktif, kritis, dan harmonis yang berbasiskan
                                kekeluargaan dikalangan mahasiswa S1, S2, dan
                                S3.
                                <?php 
                                    //echo do_shortcode('[tentangkami]');
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 bg-color4 mx-auto">
                <div class="container py-5">
                    <div class="col-md-8">
                        <h3 class="color2">Saran</h3>
                        <?php get_template_part( 'page-templates/contact' ); ?>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</section>
<!-- media sosial -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="py-5 text-center">
                    <a href="https://www.instagram.com/ppi_upm" target="_blank" title="Linkedin"><i class="fa fa-2x fa-instagram"></i></a>
                    <a href="https://www.youtube.com/channel/UCe3T3LLG3z27X3nJ85uQ_rg" target="_blank" title="Linkedin"><i class="fa fa-2x fa-youtube"></i></a>
                    <a href="https://www.facebook.com/" target="_blank" title="Linkedin"><i class="fa fa-2x fa-facebook"></i></a>
                    <a href="https://www.twitter.com/" target="_blank" title="Linkedin"><i class="fa fa-2x fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
</main>

<?php
get_footer();
?>