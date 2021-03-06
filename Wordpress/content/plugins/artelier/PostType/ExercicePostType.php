<?php

namespace Artelier\PostType;

class ExercicePostType extends PostType
{

    const POST_TYPE_LABELS = [
        'name' => 'Exercices',
        'singular_name' => 'Exercice',
        'edit_item' => 'Editer un exercice',
        'search_items' => 'Rechercher un exercice'
    ];

    const POST_TYPE_KEY = 'exercice';

    const CAPABILITIES = [
        'edit_posts' => 'edit_exercices',
        'publish_posts' => 'publish_exercices',
        'read_post' => 'read_exercice',
        'delete_post' => 'delete_exercice',
        'edit_others_posts' => 'edit_others_exercices',
        'delete_others_posts' => 'delete_others_exercices',
        'edit_post' => 'edit_exercice'
    ];

     // array des meta à déclarer
    const POST_TYPE_META_KEYS = [
        'duree_de_lexercice',
        'description_courte',
        'niveau',
        'media',
        'statut',
        'type_dexercice',
        'materiel_eleve',
        'materiel_global'
    ];
}