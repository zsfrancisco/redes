<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200102142240 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE equipo ADD marca_equipo_id INT NOT NULL');
        $this->addSql('ALTER TABLE equipo ADD CONSTRAINT FK_C49C530BC022561E FOREIGN KEY (marca_equipo_id) REFERENCES marca (id)');
        $this->addSql('CREATE INDEX IDX_C49C530BC022561E ON equipo (marca_equipo_id)');
        $this->addSql('ALTER TABLE bloque ADD campo_bloque_id INT NOT NULL');
        $this->addSql('ALTER TABLE bloque ADD CONSTRAINT FK_F1DA68E89F7F4CDF FOREIGN KEY (campo_bloque_id) REFERENCES campo (id)');
        $this->addSql('CREATE INDEX IDX_F1DA68E89F7F4CDF ON bloque (campo_bloque_id)');
        $this->addSql('ALTER TABLE ubicacion ADD bloque_ubicacion_id INT NOT NULL');
        $this->addSql('ALTER TABLE ubicacion ADD CONSTRAINT FK_DC158CB8C5065A0B FOREIGN KEY (bloque_ubicacion_id) REFERENCES bloque (id)');
        $this->addSql('CREATE INDEX IDX_DC158CB8C5065A0B ON ubicacion (bloque_ubicacion_id)');
        $this->addSql('ALTER TABLE registro ADD estado_equipo_id INT NOT NULL, ADD equipo_id INT NOT NULL, ADD sede_id INT NOT NULL, ADD bloque_id INT NOT NULL, ADD ubicacion_id INT NOT NULL');
        $this->addSql('ALTER TABLE registro ADD CONSTRAINT FK_397CA85BDC71939B FOREIGN KEY (estado_equipo_id) REFERENCES estado (id)');
        $this->addSql('ALTER TABLE registro ADD CONSTRAINT FK_397CA85B23BFBED FOREIGN KEY (equipo_id) REFERENCES equipo (id)');
        $this->addSql('ALTER TABLE registro ADD CONSTRAINT FK_397CA85BE19F41BF FOREIGN KEY (sede_id) REFERENCES campo (id)');
        $this->addSql('ALTER TABLE registro ADD CONSTRAINT FK_397CA85BA929EBC FOREIGN KEY (bloque_id) REFERENCES bloque (id)');
        $this->addSql('ALTER TABLE registro ADD CONSTRAINT FK_397CA85B57E759E8 FOREIGN KEY (ubicacion_id) REFERENCES ubicacion (id)');
        $this->addSql('CREATE INDEX IDX_397CA85BDC71939B ON registro (estado_equipo_id)');
        $this->addSql('CREATE INDEX IDX_397CA85B23BFBED ON registro (equipo_id)');
        $this->addSql('CREATE INDEX IDX_397CA85BE19F41BF ON registro (sede_id)');
        $this->addSql('CREATE INDEX IDX_397CA85BA929EBC ON registro (bloque_id)');
        $this->addSql('CREATE INDEX IDX_397CA85B57E759E8 ON registro (ubicacion_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bloque DROP FOREIGN KEY FK_F1DA68E89F7F4CDF');
        $this->addSql('DROP INDEX IDX_F1DA68E89F7F4CDF ON bloque');
        $this->addSql('ALTER TABLE bloque DROP campo_bloque_id');
        $this->addSql('ALTER TABLE equipo DROP FOREIGN KEY FK_C49C530BC022561E');
        $this->addSql('DROP INDEX IDX_C49C530BC022561E ON equipo');
        $this->addSql('ALTER TABLE equipo DROP marca_equipo_id');
        $this->addSql('ALTER TABLE registro DROP FOREIGN KEY FK_397CA85BDC71939B');
        $this->addSql('ALTER TABLE registro DROP FOREIGN KEY FK_397CA85B23BFBED');
        $this->addSql('ALTER TABLE registro DROP FOREIGN KEY FK_397CA85BE19F41BF');
        $this->addSql('ALTER TABLE registro DROP FOREIGN KEY FK_397CA85BA929EBC');
        $this->addSql('ALTER TABLE registro DROP FOREIGN KEY FK_397CA85B57E759E8');
        $this->addSql('DROP INDEX IDX_397CA85BDC71939B ON registro');
        $this->addSql('DROP INDEX IDX_397CA85B23BFBED ON registro');
        $this->addSql('DROP INDEX IDX_397CA85BE19F41BF ON registro');
        $this->addSql('DROP INDEX IDX_397CA85BA929EBC ON registro');
        $this->addSql('DROP INDEX IDX_397CA85B57E759E8 ON registro');
        $this->addSql('ALTER TABLE registro DROP estado_equipo_id, DROP equipo_id, DROP sede_id, DROP bloque_id, DROP ubicacion_id');
        $this->addSql('ALTER TABLE ubicacion DROP FOREIGN KEY FK_DC158CB8C5065A0B');
        $this->addSql('DROP INDEX IDX_DC158CB8C5065A0B ON ubicacion');
        $this->addSql('ALTER TABLE ubicacion DROP bloque_ubicacion_id');
    }
}
