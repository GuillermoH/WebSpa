<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Schedules'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Specialists'), ['controller' => 'Specialists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Specialist'), ['controller' => 'Specialists', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sesions'), ['controller' => 'Sesions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sesion'), ['controller' => 'Sesions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="schedules form large-9 medium-8 columns content">
    <?= $this->Form->create($schedule) ?>
    <fieldset>
        <legend><?= __('Add Schedule') ?></legend>
        <?php
            echo $this->Form->input('date', ['empty' => true]);
            echo $this->Form->input('specialist_id', ['options' => $specialists]);
            echo $this->Form->input('sesion_id', ['options' => $sesions]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
