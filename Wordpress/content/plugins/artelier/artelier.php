<?php

namespace Artelier;

/**
 * Plugin Name: Artelier
 * Plugin URI: https://oclock.io
 * Version: 1.0
 * Author: Saltimbanque Team
 * Description: Art’elier est une application web, orientée mobile first, permettant de répertorier, classer et organiser des exercices selon un type d’activité afin de programmer les cours à donner en fonction du niveau des élèves, du temps, et du matériel disponible.Cette application est destinée aux personnes enseignant dans le milieu artistique.

 */

require __DIR__ . '/vendor/autoload.php';

define ( 'ARTELIER_PLUGIN_FILE', __FILE__);

Plugin::run();