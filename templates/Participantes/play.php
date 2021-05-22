<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Participante $participante
 */
?>
<?php echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', ['block' => 'script']); ?>
<?php echo $this->Html->script('play', ['block' => 'script']); ?>
<div class="row">
    <aside class="column">    
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Listar Participantes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Adicionar Participante'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div id="error" class="message error" style="visibility: hidden"></div>
        <div class="participantes view content">
            <?= $this->Form->button(__('Jugar'), ['class' => 'button float-right', 'id' => 'play-button']) ?>            
            <h3><?= __('Ganadores') ?></h3>
            <div class="table-responsive">
                <table id="winners-table">
                    <thead>
                        <tr>
                            <th><?= $this->Paginator->sort('id') ?></th>
                            <th><?= $this->Paginator->sort('dni', 'Documento') ?></th>
                            <th><?= $this->Paginator->sort('name', 'Nombre') ?></th>
                            <th><?= $this->Paginator->sort('ciudad_id') ?></th>                    
                            <th><?= $this->Paginator->sort('created', 'Creado') ?></th>
                            <th><?= $this->Paginator->sort('modified', 'Modificado') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($winners as $winner): ?>
                        <tr>
                            <td><?= $this->Number->format($winner->id) ?></td>
                            <td><?= h($winner->dni) ?></td>
                            <td><?= h($winner->name) ?></td>
                            <td><?= $winner->has('ciudade') ? $this->Html->link($winner->ciudade->name, ['controller' => 'Ciudades', 'action' => 'view', $winner->ciudade->id]) : '' ?></td>                    
                            <td><?= h($winner->created) ?></td>
                            <td><?= h($winner->modified) ?></td>                    
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
