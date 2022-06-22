<?php

/**
 * User: Abdessamad
 * Date: 7/24/2020
 * Time: 11:18 PM
 */

namespace app\core;


/**
 * Class Session
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package app\core
 */
class Session
{
    protected const FLASH_KEY = 'flash_messages';

    public function __construct() //* pour initialiser la session
    {
        session_start(); //* pour initialiser la session
        $flashMessages = $_SESSION[self::FLASH_KEY] ?? []; //* pour recuperer les messages flash
        foreach ($flashMessages as $key => &$flashMessage) { //* pour chaque message flash
            $flashMessage['remove'] = true; //* pour le supprimer
        }
        $_SESSION[self::FLASH_KEY] = $flashMessages; //* pour les mettre dans la session
    }

    public function setFlash($key, $message) //* pour mettre un message flash
    {
        $_SESSION[self::FLASH_KEY][$key] = [ //* pour mettre le message flash dans la session
            'remove' => false, ///* pour ne pas le supprimer
            'value' => $message //* pour le mettre dans la session
        ];
    }

    public function getFlash($key) //* pour recuperer un message flash
    {
        return $_SESSION[self::FLASH_KEY][$key]['value'] ?? false;  //* pour recuperer le message flash
    }

    public function set($key, $value) //* set session variable with key and value
    {
        $_SESSION[$key] = $value; //* set session variable with key and value
    }

    // ! get id account from session
    public function get($key) //* get session variable with key
    {
        return $_SESSION[$key] ?? false; //* get session variable with key
    }

    public function remove($key) //* remove session variable with key
    {
        unset($_SESSION[$key]); //* remove session variable with key
    }

    public function __destruct() //* pour fermer la session
    {
        $this->removeFlashMessages(); //* pour supprimer les messages flash
    }

    private function removeFlashMessages() 
    {
        $flashMessages = $_SESSION[self::FLASH_KEY] ?? []; //* pour recuperer les messages flash
        foreach ($flashMessages as $key => $flashMessage) { //* pour chaque message flash
            if ($flashMessage['remove']) { //* si le message doit etre supprimer
                unset($flashMessages[$key]); //* pour supprimer le message flash
            }
        }
        $_SESSION[self::FLASH_KEY] = $flashMessages; //* pour les mettre dans la session
    }
}
