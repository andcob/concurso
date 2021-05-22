<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Participante[]|\Cake\Collection\CollectionInterface $participantes
 */
?>
<div class="participantes index content">
    <?= $this->Html->link(__('Adicionar Participante'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Cinco últimos Participantes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('dni', 'Documento') ?></th>
                    <th><?= $this->Paginator->sort('name', 'Nombre') ?></th>
                    <th><?= $this->Paginator->sort('winner', 'Ganador') ?></th>
                    <th><?= $this->Paginator->sort('ciudad_id') ?></th>                    
                    <th><?= $this->Paginator->sort('created', 'Creado') ?></th>
                    <th><?= $this->Paginator->sort('modified', 'Modificado') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($participantes as $participante): ?>
                <tr>
                    <td><?= $this->Number->format($participante->id) ?></td>
                    <td><?= h($participante->dni) ?></td>
                    <td><?= h($participante->name) ?></td>
                    <td><?= $participante->winner ? __('Si') : __('No'); ?></td>
                    <td><?= $participante->has('ciudade') ? $this->Html->link($participante->ciudade->name, ['controller' => 'Ciudades', 'action' => 'view', $participante->ciudade->id]) : '' ?></td>                    
                    <td><?= h($participante->created) ?></td>
                    <td><?= h($participante->modified) ?></td>                    
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $participante->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $participante->id]) ?>
                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $participante->id], ['confirm' => __('Está seguro que desea eliminar el participante con Id # {0}?', $participante->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
