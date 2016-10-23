<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Specialists'), ['controller' => 'Specialists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Specialist'), ['controller' => 'Specialists', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->input('user');
            echo $this->Form->input('password');
            echo $this->Form->input('rol');
            echo $this->Form->input('specialist_id', ['options' => $specialists, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
