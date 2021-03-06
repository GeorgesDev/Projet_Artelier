<?php

namespace Artelier\Classes;

use Artelier\PostType\ExercicePostType;
use Artelier\PostType\LessonPostType;

//include "../../wp/wp-includes/rest-api/class-wp-rest-request.php";

class Database
{

    const TABLE_NAME = 'lesson_content';

    // https://developer.wordpress.org/reference/classes/wpdb/

    /**
     * Create lesson_content table
     *
     */
    static public function generateLessonContentTable()
    {
        // on récupère le connecteur à la BDD de WordPress
        global $wpdb;

        // on récupère le charset actuel
        $charsetCollate = $wpdb->get_charset_collate();

        $tableName = self::TABLE_NAME;

        // on écrit notre requête SQL qui permet de créé la table
        // https://sql.sh/cours/create-table
        $sql = "
        CREATE TABLE IF NOT EXISTS `{$tableName}` (
                `lesson_id` BIGINT(20)  NOT NULL REFERENCES lessons (lesson_id),
                `exercice_id` BIGINT(20)  NOT NULL REFERENCES exercices (exercice_id),
                PRIMARY KEY(`lesson_id`, `exercice_id`)
                ) {$charsetCollate};
        ";

        // exécution de la requête
        $wpdb->query($sql);
    }
    

   
    static public function createLesson ( $request )
    {
        $paramsLesson = $request->get_json_params();

        //1. Créer le cours (et récupérer l'id du cours créé) => wp_insert_post()
        $lesson = [
            'post_type'=> 'lesson',
            'post_title'=> $paramsLesson['post_title'],
            'post_status'=> 'publish',
            'post_author'=> get_current_user_id(),
        ];

        // obtenir le nouvel ID de publication après avoir créé un nouveau cours
        $lessonId = wp_insert_post( $lesson, true);
        $exerciceId = [4,5,6];
        //return ($paramsLesson['exercices_list']);
        return ([$lessonId, $exerciceId]);
        //return ([$lessonId, $lesson, $request->get_json_params()]);
    }


      
        //2. Associer chaque id d'exercice transmis lors de l'appel à l'api (= chaque valeur dans $request->get_param('exercices_list')) au nouveau cours
        // => utiliser addExerciceToLesson() pour chaque id

    /**
     * Create a new relationship between a lesson and an exercice
     *
     * @param int $lessonId
     * @param int $exerciceId
     * @param int 
     * @return void
     */
    static public function addExerciceToLesson($lessonId, $exerciceId)
    {
        global $wpdb;

        $tableName = self::TABLE_NAME;

        $sql = "
            INSERT INTO `{$tableName}`
            (`lesson_id`, `exercice_id`)
            VALUES
            (%d, %d)
        ";

        // la chaine $sql contient des parties variables (%d)
        $preparedQuery = $wpdb->prepare(
            $sql,
            [
                $lessonId,
                $exerciceId
            ]
        );

        $wpdb->query($preparedQuery);
    }

    /**
     * Delete an exercice-lesson relation
     *
     * @param int $lessonId
     * @param int $exerciceId
     */
    static public function deleteExerciceInLesson($lessonId, $exerciceId)
    {
        global $wpdb;

        $tableName = self::TABLE_NAME;

        $sql = "
            DELETE FROM `{$tableName}`
            WHERE `lesson_id`=%d
            AND `exercice_id`=%d
        ";

        $preparedQuery = $wpdb->prepare(
            $sql,
            [
                $lessonId,
                $exerciceId,
            ]
        );

        $wpdb->query($preparedQuery);
    }

    /**
     * get exercices for a lesson
     *
     * @param int $lessonId
     */
    static public function getExercicesToLesson($lessonId)
    {
        global $wpdb;

        $tableName = self::TABLE_NAME;;

        $sql = "
            SELECT * FROM `{$tableName}` WHERE `lesson_id`={$lessonId}
        ";

        $exerciceLessonRelationshipList = $wpdb->get_results($sql);


        // https://www.php.net/manual/fr/function.array-map.php
        // array_map() permet d'executer une fonction sur chaque élément d'un array
        // $element => objet "courant" de l'array
        $exerciceList = array_map(function ($element) {
            $exerciceTerm = get_term(
                $element->exercice_id,
                ExercicePostType::POST_TYPE_KEY
            );
            // var_dump($exerciceTerm);
            return [
                'exerciceId' => $exerciceTerm->term_id,
                'exerciceTitle' => $exerciceTerm->title,
                
            ];
        },  $exerciceLessonRelationshipList);

        // var_dump($exerciceList);

        return $exerciceList;
    }
}