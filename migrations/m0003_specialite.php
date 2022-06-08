<?php

/**
 * User: Abdessamad
 * Date: 7/10/2020
 * Time: 8:07 AM
 */

class m0003_specialite
{
    public function up()
    {
        $db = \app\core\Application::$app->db;
        $SQL = "CREATE TABLE specialite (
                specialite_id INT AUTO_INCREMENT PRIMARY KEY,
                specialite VARCHAR(255) NOT NULL
            )  ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = \app\core\Application::$app->db;
        $SQL = "DROP TABLE specialite;";
        $db->pdo->exec($SQL);
    }
}