<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $service->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $service->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Services'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sesions'), ['controller' => 'Sesions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sesion'), ['controller' => 'Sesions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="services form large-9 medium-8 columns content">
    <?= $this->Form->create($service) ?>
    <fieldset>
        <legend><?= __('Edit Service') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('duration', ['empty' => true]);
            echo $this->Form->input('price');
            echo $this->Form->input('type');
            echo $this->Form->input('active');
            echo $this->Form->input('uses_equipment');
            echo $this->Form->input('sesions._ids', ['options' => $sesions]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
