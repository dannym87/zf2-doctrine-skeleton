<?php

namespace Migration;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140609230324 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql("INSERT INTO `user` (`email`) VALUES
            ('test1@test.com'),
            ('test2@test.com')
        ");
    }

    public function down(Schema $schema)
    {
        $this->addSql("DELETE FROM `user` WHERE
            `email`='test1@test.com' OR
            `email`='test2@test.com'
        ");
    }
}
