# Projet Art'elier

## Aide

https://github.com/O-clock-Alumni/fiches-recap/tree/master/wordpress/plugins

### Exemple (light) de création d'un plugin avec table custom

'<?php
//mon fichier s'appelerai theoriquement monplugin.class et se situerai dans content > plugins > monplugin > monplugin.class

/*
Plugin Name: monplugin
Description: 
Author: aremplir
Version: 1.0.0
*/


// Sécurisation

if (!defined('WPINC')) {die();}


class monplugin {

    public function __construct()
    {
        add_action('init', [$this, 'registerCpt']) ;
    }


    public function registerCpt()
    {
            //liste des options possible doc wp : https://developer.wordpress.org/reference/functions/register_post_type/
            //ceci est un exemple de la doc WP , il serait a adapter avec notre table qui ne contient qu'une description
            $labels = array(
                'name'                  => _x( 'Books', 'Post type general name', 'textdomain' ),
                'singular_name'         => _x( 'Book', 'Post type singular name', 'textdomain' ),
                'menu_name'             => _x( 'Books', 'Admin Menu text', 'textdomain' ),
                'name_admin_bar'        => _x( 'Book', 'Add New on Toolbar', 'textdomain' ),
                'add_new'               => __( 'Add New', 'textdomain' ),
                'add_new_item'          => __( 'Add New Book', 'textdomain' ),
                'new_item'              => __( 'New Book', 'textdomain' ),
                'edit_item'             => __( 'Edit Book', 'textdomain' ),
                'view_item'             => __( 'View Book', 'textdomain' ),
                'all_items'             => __( 'All Books', 'textdomain' ),
                'search_items'          => __( 'Search Books', 'textdomain' ),
                'parent_item_colon'     => __( 'Parent Books:', 'textdomain' ),
                'not_found'             => __( 'No books found.', 'textdomain' ),
                'not_found_in_trash'    => __( 'No books found in Trash.', 'textdomain' ),
                'featured_image'        => _x( 'Book Cover Image', 'Overrides the "Featured Image" phrase for this post type. Added in 4.3', 'textdomain' ),
                'set_featured_image'    => _x( 'Set cover image', 'Overrides the "Set featured image" phrase for this post type. Added in 4.3', 'textdomain' ),
                'remove_featured_image' => _x( 'Remove cover image', 'Overrides the "Remove featured image" phrase for this post type. Added in 4.3', 'textdomain' ),
                'use_featured_image'    => _x( 'Use as cover image', 'Overrides the "Use as featured image" phrase for this post type. Added in 4.3', 'textdomain' ),
                'archives'              => _x( 'Book archives', 'The post type archive label used in nav menus. Default "Post Archives". Added in 4.4', 'textdomain' ),
                'insert_into_item'      => _x( 'Insert into book', 'Overrides the "Insert into post"/"Insert into page" phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
                'uploaded_to_this_item' => _x( 'Uploaded to this book', 'Overrides the "Uploaded to this post"/"Uploaded to this page" phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
                'filter_items_list'     => _x( 'Filter books list', 'Screen reader text for the filter links heading on the post type listing screen. Default "Filter posts list"/"Filter pages list". Added in 4.4', 'textdomain' ),
                'items_list_navigation' => _x( 'Books list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default "Posts list navigation"/"Pages list navigation". Added in 4.4', 'textdomain' ),
                'items_list'            => _x( 'Books list', 'Screen reader text for the items list heading on the post type listing screen. Default "Posts list"/"Pages list". Added in 4.4', 'textdomain' ),
            );

            
            $args = [
                 'labels'             => $labels,
                'public'             => true,
                'publicly_queryable' => true,
                'show_ui'            => true,
                'show_in_menu'       => true,
                'query_var'          => true,
                'rewrite'            => array( 'slug' => 'book' ),
                'capability_type'    => 'post',
                'has_archive'        => true,
                'hierarchical'       => false,
                'menu_position'      => null,
                'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
            ];
            
        register_post_type('monplugin', $args); //enregistle le CPT

    }

    public function activate()
    {
       
        $this->registerCpt(); //créé mon plugin
        $this->createTable(); // créé la table lorsque je click dans le back office sur "activer" du plugin concerné 

        flush_rewrite_rules();
    }

    public function createTable()
    {
        global $wpdb;
        
        $sql = 'CREATE TABLE `wp_matableoustockerlesinfos` (
            `id` int(100) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `description` varchar(100) NOT NULL,
          )
        
        '.$wpdb->get_charset_collate().';';
        
        $wpdb->query($sql);

       
    }


    public function deactivate()
    {
        global $wpdb;
        $sql = "DROP TABLE IF EXISTS `wp_matableoustockerlesinfos`";
        $wpdb->query($sql);

      }
  
  
   
public function createView() 
{

        global $wpdb;

        //il faut récupérer les données du formulaire get ou en post (selon la methode choisie) avec => $_POST['description']; (ici je n'aurai qu'une description dans mon exemple)
        // ne pas oublier de faire les tests eventuelles isset empty etc ...
        // autre exemple : https://wordpress.stackexchange.com/questions/165408/inserting-data-into-custom-tables
        $wpdb->insert(
            'wp_matableoustockerlesinfos', 
            array(
                'description' =>  'mesdonnee', // remplacer "mesdonnee" par la valeur en POST / GET 
        ));
}


}     

$monplugin = new monplugin();

// A l'activation du plugin
register_activation_hook(__FILE__, [$monplugin, 'activate']);

// A la désactivation du plugin
register_deactivation_hook(__FILE__, [$monplugin, 'deactivate']);

// Pour l'insertion des données dans la table
register_activation_hook( __FILE__, [$monplugin,'createView']);'
