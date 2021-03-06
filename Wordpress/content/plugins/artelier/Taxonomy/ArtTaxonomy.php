<?php

namespace Artelier\Taxonomy;

use Artelier\PostType\ExercicePostType;

class ArtTaxonomy extends Taxonomy
{

    const TAXONOMY_LABELS = [
        'name' => 'Arts',
        'singular_name' => 'Art',
        'add_new_item' => 'Ajouter une nouvelle catégorie d\'art'
        
    ];

    const TAXONOMY_KEY = 'art';

    const RELATED_CPT_LIST = [ExercicePostType::POST_TYPE_KEY];

    const CAPABILITIES =  [
        'manage_terms' => 'manage_arts',
        'edit_terms' => 'edit_arts',
        'delete_terms' => 'delete_arts',
        'assign_terms' => 'assign_arts'
    ];
   
}