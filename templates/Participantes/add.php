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
            <?= $this->Html->link(__('Listar Participantes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="participantes form content">
            <?= $this->Form->create($participante) ?>
            <fieldset>
                <legend><?= __('Adicionar Participante') ?></legend>
                <?php
                    echo $this->Form->control('dni', ['label' => 'Documento']);
                    echo $this->Form->control('name', ['label' => 'Nombre']);
                    echo $this->Form->control('winner', ['type' => 'hidden', 'value' => false]);
                    echo $this->Form->control('ciudad_id', ['options' => $ciudades, 'label' => 'Ciudad']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Enviar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
