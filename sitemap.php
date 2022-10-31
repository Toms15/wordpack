<?php
/**
 * Template name: Sitemap
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPack
 */

get_header();

class Menu
{
    public $title;
    public $id;
    public $url;
    public $class;
    public $submenu;
}

$menu_name = 'sitemap';
$locations = get_nav_menu_locations('sitemap');
$menu = wp_get_nav_menu_object($locations[ $menu_name ]);
$menuitems = wp_get_nav_menu_items($menu->term_id, array('order' => 'ASC'));
// $columns = get_field('columns', 'menu_' . $menu->term_id);
$submenu = false;
$previous_id = 0;
$set_menu = false;
foreach( $menuitems as $item ):
    if (!$item->menu_item_parent){
        if ($set_menu == true) { $menus[] = $myMenu;  $set_menu = false;}
        if ($set_menu == false) { $set_menu = true;}
        $myMenu = new Menu();
        $myMenu->title = $item->title;
        $myMenu->id = $item->ID;
        $myMenu->url = $item->url;
        $myMenu->class = $item->classes;
    } 
    else 
    { 
        if ($previous_id != $item->menu_item_parent) { 
            $mySubmenu = new Menu();
            $mySubmenu->title = $item->title;
            $mySubmenu->id = $item->ID;
            $mySubmenu->url = $item->url;
            $myMenu->submenu[] = $mySubmenu; 
        }
        if ($previous_id == $item->menu_item_parent) { 
            $mySubSubmenu = new Menu();
            $mySubSubmenu->title = $item->title;
            $mySubSubmenu->id = $item->ID;
            $mySubSubmenu->url =  $item->url;
            $mySubmenu->submenu[] = $mySubSubmenu; 
        }
        if ($previous_id != $item->menu_item_parent){
            $previous_id = $item->ID; 
        }
    }  
endforeach; 
$menus[] = $myMenu;
?>

	<main id="primary" class="site-main">
        <section class="section--content py-mega mb-medium">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 col-md-12 col-12 mb-medium-large text-center">
                        <h1 class="heading"><?php echo the_title(); ?></h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 col-md-12 col-12">
                        <nav class="sitemap--menu">
                            <div class="row">
                                <?php foreach ($menus as $menu) { ?>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <a href="<?= $menu->url; ?>" class="sitemap--menu-item <?= implode(' ', $menu->class); ?>">
                                            <?= $menu->title; ?> 
                                        </a>
                                        <?php if ($menu->submenu){ ?>
                                            <ul class="sitemap--menu-sub-menu">
                                                <?php foreach ($menu->submenu as $submenu) { ?>
                                                    <li class="sitemap--menu-sub-menu-item">
                                                        <a href="<?= $submenu->url; ?>">
                                                            <?= $submenu->title; ?> 
                                                        </a> 
                                                    </li>
                                                    <?php if ($submenu->submenu){ ?>
                                                        <ul class="sitemap--menu-sub-menu sitemap--menu-sub-menu-third-level">
                                                            <?php foreach ($submenu->submenu as $submenu) { ?>
                                                                <li class="sitemap--menu-sub-menu-item sitemap--menu-sub-menu-item-third-level">
                                                                    <a href="<?= $submenu->url; ?>">
                                                                        <?= $submenu->title; ?> 
                                                                    </a> 
                                                                </li>  
                                                            <?php } ?>
                                                        </ul>           
                                                    <?php } ?>
                                                <?php } ?>
                                            </ul>          
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
	</main><!-- #main -->

<?php
get_footer();
