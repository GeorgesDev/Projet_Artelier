<?php

namespace Artelier\Role;

class ProfessorRole 
{
    
            const ROLE_KEY = 'professor';
            const ROLE_NAME = 'Professeur';

            /**
             * Add the custom Professor role
             *
             */
            static public function add()
            {
                add_role(
                    self::ROLE_KEY, 
                    self::ROLE_NAME, 
                    [
                    'read' => true,
                    'edit_posts' => true, 
                    'upload_files' => false,
                    'edit_others_posts' => true, //a tester a false

                    'edit_exercices' => true,
                    'publish_exercices' => false,
                    'read_exercice' => true,
                    'delete_exercice' => true,
                    //'delete_exercices' => true,
                    'edit_others_exercices' => false,
                    'delete_others_exercices' => false,
                    'edit_exercice' => true,

                    'edit_lessons' => true,
                    'publish_lessons' => true,
                    'read_lesson' => true,
                    'delete_lesson' => true,
                    'edit_others_lessons' => false,
                    'delete_others_lessons' => false,
                    'edit_lesson' => true,

                    'manage_arts' => false,
                    'edit_arts' => false,
                    'delete_arts' => false,
                    'assign_arts' => true,   
                 ]

            );
         }
        
            /**
             * Register a Professor role for a new user
             *
            */
            static public function user_registered($user)
            {
                $user->set_role(self::ROLE_KEY);
            }


            /**
             * Remove the custom Developer role
             *
            */
            static public function remove()
            {
                remove_role(self::ROLE_KEY);
            }


}
