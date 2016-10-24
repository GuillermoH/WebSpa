
<div class="users form large-6 medium-6" style="margin-left: 25%">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->input('user');
            echo $this->Form->input('password');
            echo $this->Form->input('rol', ['options' => array('ROLE_ADMIN', 'ROLE_SPECIALIST', 'ROLE_MANAGER'), 'empty' => false ]);
            echo $this->Form->input('specialist_id', ['options' => $specialists, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
