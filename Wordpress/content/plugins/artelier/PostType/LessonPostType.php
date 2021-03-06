<?php

namespace Artelier\PostType;

class LessonPostType extends PostType
{

    const POST_TYPE_LABELS = [
        'name' => 'Cours',
        'singular_name' => 'Cours',
        'edit_item' => 'Editer un cours',
        'search_items' => 'Rechercher un cours'
    ];
    
    const POST_TYPE_KEY = 'lesson';

    const CAPABILITIES = [
        'edit_posts' => 'edit_lessons',
        'publish_posts' => 'publish_lessons',
        'read_post' => 'read_lesson',
        'delete_post' => 'delete_lesson',
        'edit_others_posts' => 'edit_others_lessons',
        'delete_others_posts' => 'delete_others_lessons',
        'edit_post' => 'edit_lesson'
    ];

    // array des meta à déclarer
    const POST_TYPE_META_KEYS = [
        'exercices'
    ];
}

