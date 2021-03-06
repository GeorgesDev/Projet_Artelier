<?php

namespace Artelier\PostType;

class PostType
{
    /**
     * Register the custom post type
     *
     */
    static public function register()
    {
        $labels = static::POST_TYPE_LABELS;

        register_post_type(
            static::POST_TYPE_KEY,
            [
                'labels' => $labels,
                'public' => true,
                'hierarchical' => false,
                'show_in_rest' => true,
                'has_archive' => true,
                'menu_icon' => 'dashicons-media-document',
                'supports' => [
                    'title',
                    'editor',
                    'thumbnail',
                    'custom-fields',
                    'excerpt'
                ],

                'capabilities' => static::CAPABILITIES
            ]
        );
    }

    static public function registerMetas()
    {
        // si on a des meta à déclarer pour notre CPT
        if (static::POST_TYPE_META_KEYS) {
            // pour chacune de ces meta
            foreach(static::POST_TYPE_META_KEYS as $post_meta_key)
            // on la déclare
            register_post_meta(
                static::POST_TYPE_KEY, // la clef du CPT
                $post_meta_key, // la clef de la meta courante
                [
                    // on la rend accessible dans la REST API
                    'show_in_rest' => true
                ]
            );
        }
    }
    
    /**
     * Add admin caps for the CPT
     
     */
    static public function addAdminCaps()
    {
        // récupération du rôle administrateur
        $adminRole = get_role('administrator');

        // pour chaque capability, on l'ajoute pour l'admin
        foreach(static::CAPABILITIES as $cap => $cptCap) {
            $adminRole->add_cap($cptCap);
        }
    }

    /**
     * Remove admin caps for the CPT
     *
     */
    static public function removeAdminCaps()
    {
        // récupération du rôle administrateur
        $adminRole = get_role('administrator');

        // pour chaque capability, on la supprime pour l'admin
        foreach(static::CAPABILITIES as $cap => $cptCap) {
            $adminRole->remove_cap($cptCap);
        }
    }
     
}

