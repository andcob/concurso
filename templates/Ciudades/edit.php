<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ciudade $ciudade
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ciudade->id],
                ['confirm' => __('Está seguro que de sea eliminar la ciudad con Id # {0}?', $ciudade->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Listar Ciudades'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ciudades form content">
            <?= $this->Form->create($ciudade) ?>
            <fieldset>
                <legend><?= __('Editar Ciudad') ?></legend>
                <?php
                    echo $this->Form->control('name', ['label' => 'Nombre']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Editar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
