<?php

namespace Artelier\Rest;

use Artelier\PostType\LessonPostType;

class RestFields
{
    static public function registerMetaFields()
    {
        // si on a des meta
        if (LessonPostType::POST_TYPE_META_KEYS) {
            // pour chaque meta
            foreach (LessonPostType::POST_TYPE_META_KEYS as $post_meta_key) {
                register_rest_field(
                    // la meta courante
                    LessonPostType::POST_TYPE_KEY,
                    $post_meta_key,
                    [
                        // callback d'ajout / édition d'un cours'
                        'update_callback' => function ($value, $post, $meta_key) {
                            // $value => valeur de la meta
                            // $post => objet du cours courant
                            // $meta_key => clé de la meta
                            update_post_meta($post->ID, $meta_key, $value);
                        }
                    ]
                );
            }
        }

        if (LessonPostType::POST_TYPE_META_KEYS) {
            foreach (LessonPostType::POST_TYPE_META_KEYS as $post_meta_key) {
                register_rest_field(
                    LessonPostType::POST_TYPE_KEY,
                    $post_meta_key,
                    [
                        'update_callback' => function ($value, $post, $meta_key) {
                          
                            update_post_meta($post->ID, $meta_key, $value);
                        }
                    ]
                );
            }
        }
    }

}