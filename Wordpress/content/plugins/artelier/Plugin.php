<?php

namespace Artelier;

use Artelier\Classes\Database;
use Artelier\PostType\ExercicePostType;
use Artelier\PostType\LessonPostType;
use Artelier\Role\ProfessorRole;
use Artelier\Taxonomy\ArtTaxonomy;

define('UTILS_CLASS', 'Artelier\Classes\Utils');
define('REST_FIELD_CLASS', 'Artelier\Rest\RestFields');

class Plugin
{

    /**
     * Start the plugin
     *
     */
    static public function run()
    {
        add_action('rest_api_init',[self::class, 'add_cors_http_header'],15);

        add_action('init', [self::class, 'registerPostTypes']);
        add_action('init', [self::class, 'registerTaxonomies']);
        register_activation_hook(ARTELIER_PLUGIN_FILE, [self::class, 'onPluginActivation']);
        register_deactivation_hook(ARTELIER_PLUGIN_FILE, [self::class, 'onPluginDeactivation']);

        add_action('rest_api_init',[REST_FIELD_CLASS, 'registerMetaFields']);

        add_action('wp_rest_user_user_register', ['\Artelier\Role\ProfessorRole', 'user_registered']);

        //Pour cacher les autres Exercices/Cours des autres profs
        add_action('admin_enqueue_scripts', [UTILS_CLASS, 'hideOthersPostsCounters']);
        add_action('admin_menu', [UTILS_CLASS, 'hideMenuItemsForProfessors']);
        add_action('wp_before_admin_bar_render', [UTILS_CLASS, 'hideAdminBarItemsForProfessors']);
        add_action('admin_bar_menu', [UTILS_CLASS, 'showAdminBarItemsForProfessors'], 100);
        

        // création de la route custom pour accéder à la table custom
        add_action( 'rest_api_init', function () {
            register_rest_route('artelier/v1', '/lesson', array(
            'methods' => 'POST',
            'callback' => [Database::class, 'createLesson'],
          ));
         });
       
    }

    /**
     * Register all CPT
     *
     */
    static public function registerPostTypes()
    {
        ExercicePostType::register();
        LessonPostType::register();
        ExercicePostType::registerMetas();
        LessonPostType::registerMetas();
        
    }

    /**
     * Register all Taxonomies
     *
     */
    static public function registerTaxonomies()
    {
        ArtTaxonomy::register();
        ArtTaxonomy::addAdminCaps();
     
    }

    static public function add_cors_http_header(){
        remove_filter( 'rest_pre_serve_request', 'rest_send_cors_headers' );
        add_filter( 'rest_pre_serve_request', function( $value ) {
        header( 'Access-Control-Allow-Origin: *' );
        header( 'Access-Control-Allow-Methods: GET,POST,DELETE,PUT,PATCH' );
        header( 'Access-Control-Allow-Credentials: true' );
        header( 'Access-Control-Expose-Headers: Link', false );
        return $value;
        });
        }
    

    /**
     * Add all Roles
     *
     */
    static public function addRoles()
    {
        ProfessorRole::add();
        ExercicePostType::addAdminCaps();
        LessonPostType::addAdminCaps();
        
    }

    /**
     * Remove all Roles
     *
     */
    static public function removeRoles()
    {
        ProfessorRole::remove();
        ExercicePostType::removeAdminCaps();
        LessonPostType::removeAdminCaps();
       
    }

    /**
     * On Plugin activation
     *
     */
    static public function onPluginActivation()
    {
        Database::generateLessonContentTable();
        self::registerTaxonomies();
        self::addRoles();
        self::registerPostTypes();
        self::registerTaxonomies();
        flush_rewrite_rules();
    }

    /**
     * On Plugin deactivation
     *
     */
    static public function onPluginDeactivation()
    {
        self::removeRoles();
        flush_rewrite_rules();
    }

    
}
