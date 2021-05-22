<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateParticipantes extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('participantes');
        $table->addColumn('dni', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('winner', 'boolean', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
        
        $refTable = $this->table('participantes');
        $refTable->addColumn('ciudad_id', 'integer', array('signed' => 'disable'))
                         ->addForeignKey('ciudad_id', 'ciudades', 'id', array('delete' => 'NO_ACTION', 'update' => 'CASCADE'))
                         ->update();	
    }
}
