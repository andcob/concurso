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
            <?= $this->Html->link(__('Editar Ciudad'), ['action' => 'edit', $ciudade->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Eliminar Ciudad'), ['action' => 'delete', $ciudade->id], ['confirm' => __('Está seguro que de sea eliminar la ciudad con Id # {0}?', $ciudade->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Listar Ciudades'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Adicionar Ciudad'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ciudades view content">
            <h3><?= h($ciudade->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($ciudade->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($ciudade->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Creada') ?></th>
                    <td><?= h($ciudade->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modificada') ?></th>
                    <td><?= h($ciudade->modified) ?></td>
                </tr>
            </table>
            
        
            <div class="participantes index content">
            <div class="box-header with-border">
              <h3 class="box-title"><?= __('Participantes de esta ciudad') ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php if (!empty($ciudade->participantes)): ?>
              <table class="table table-hover">
                  <tr>
                        <th><?= $this->Paginator->sort('id') ?></th>
                        <th><?= $this->Paginator->sort('dni', 'Documento') ?></th>
                        <th><?= $this->Paginator->sort('name', 'Nombre') ?></th>
                        <th><?= $this->Paginator->sort('winner', 'Ganador') ?></th>                  
                        <th><?= $this->Paginator->sort('created', 'Creado') ?></th>
                        <th><?= $this->Paginator->sort('modified', 'Modificado') ?></th>
                  </tr>
                  <?php foreach ($ciudade->participantes as $participante): ?>
                  <tr>
                        <td><?= $this->Number->format($participante->id) ?></td>
                        <td><?= h($participante->dni) ?></td>
                        <td><?= h($participante->name) ?></td>
                        <td><?= $participante->winner ? __('Si') : __('No'); ?></td>
                        <td><?= h($participante->created) ?></td>
                        <td><?= h($participante->modified) ?></td> 
                  </tr>
                  <?php endforeach; ?>
              </table>
              <?php endif; ?>
            </div>
          </div>
            
        </div>            
        
    </div>        
    
</div>
