<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Participante $participante
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Editar Participante'), ['action' => 'edit', $participante->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Eliminar Participante'), ['action' => 'delete', $participante->id], ['confirm' => __('Está seguro que desea eliminar el participante con Id # {0}?', $participante->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Listar Participantes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Adicionar Participante'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="participantes view content">
            <h3><?= h($participante->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Documento') ?></th>
                    <td><?= h($participante->dni) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($participante->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ciudad') ?></th>
                    <td><?= $participante->has('ciudade') ? $this->Html->link($participante->ciudade->name, ['controller' => 'Ciudades', 'action' => 'view', $participante->ciudade->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($participante->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Creado') ?></th>
                    <td><?= h($participante->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modificado') ?></th>
                    <td><?= h($participante->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ganador') ?></th>
                    <td><?= $participante->winner ? __('Si') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
