
<div class="users form large-6 medium-6" style="margin-left: 25%">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->input('user');
            echo $this->Form->input('password');
            $role['ROLE_ADMIN'] =  'Administrado';
            $role['ROLE_MAN'] =  'Gerente';
            $role['ROLE_SPEC'] =  'Especialista';
            echo $this->Form->input('role', ['options' => $role, 'empty' => false]);
            echo $this->Form->input('specialist_id', ['options' => $specialists, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
