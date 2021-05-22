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
            <?= $this->Html->link(__('Listar Ciudades'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ciudades form content">
            <?= $this->Form->create($ciudade) ?>
            <fieldset>
                <legend><?= __('Adicionar Ciudad') ?></legend>
                <?php
                    echo $this->Form->control('name', ['label' => 'Nombre']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Enviar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
