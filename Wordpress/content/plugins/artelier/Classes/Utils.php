<?php

namespace Artelier\Classes;

class Utils
{

    static public function disableOthersPosts($wp_query)
    {
        // wp_get_current_user() renvoie un objet correspondant au user connecté / 0 si non connecté
        $user = wp_get_current_user();
        // var_dump($user);
        // si on est sur le Back-office et que l'utilisateur a le rôle professeur
        if (is_admin() && in_array('professor', $user->roles)) {
            // on modifie la requête pour aller chercher uniquement les posts du user courant
            $wp_query->set('author', $user->ID);
        }
    }

    static public function hideOthersPostsCounters()
    {
        $user = wp_get_current_user();
        if (in_array('professor', $user->roles)) {
            wp_enqueue_style('hide_others_posts_counters', plugin_dir_url(ARTELIER_PLUGIN_FILE) . '/assets/css/hide_others_posts_counter.css');
        }
    }

    static public function hideMenuItemsForProfessors()
    {
        $user = wp_get_current_user();
        if (in_array('professor', $user->roles)) {
            remove_menu_page('edit.php');
            remove_menu_page('edit-comments.php');
            remove_menu_page('tools.php');
        }
    }

    static public function hideAdminBarItemsForProfessors()
    {
        $user = wp_get_current_user();
        if (in_array('professor', $user->roles)) {
            global $wp_admin_bar;
            $wp_admin_bar->remove_node('new-post');
            $wp_admin_bar->remove_node('comments');
        }
    }

    static public function showAdminBarItemsForProfessors($wp_admin_bar)
    {
        $user = wp_get_current_user();
        if (in_array('professor', $user->roles)) {
            $args = array(
                'id' => 'professor-dashboard',
                'title' => 'Dashboard Professeur',
                'href' => home_url('professor/dashboard')
            );
            $wp_admin_bar->add_node($args);

          
        }
    }
}
