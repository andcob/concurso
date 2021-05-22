<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Participante Entity
 *
 * @property int $id
 * @property string $dni
 * @property string $name
 * @property bool $winner
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $ciudad_id
 *
 * @property \App\Model\Entity\Ciudade $ciudade
 */
class Participante extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'dni' => true,
        'name' => true,
        'winner' => true,
        'created' => true,
        'modified' => true,
        'ciudad_id' => true,
        'ciudade' => true,
    ];
}
