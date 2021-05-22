<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ciudade[]|\Cake\Collection\CollectionInterface $ciudades
 */
?>
<div class="ciudades index content">
    <?= $this->Html->link(__('Adicionar Ciudad'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Ciudades') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name', 'Nombre') ?></th>
                    <th><?= $this->Paginator->sort('created', 'Creado') ?></th>
                    <th><?= $this->Paginator->sort('modified', 'Modificado') ?></th>
                    <th class="actions"><?= __('Actions', 'Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ciudades as $ciudade): ?>
                <tr>
                    <td><?= $this->Number->format($ciudade->id) ?></td>
                    <td><?= h($ciudade->name) ?></td>
                    <td><?= h($ciudade->created) ?></td>
                    <td><?= h($ciudade->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $ciudade->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $ciudade->id]) ?>
                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $ciudade->id], ['confirm' => __('Está seguro que desea eliminar la ciudad con Id # {0}?', $ciudade->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
