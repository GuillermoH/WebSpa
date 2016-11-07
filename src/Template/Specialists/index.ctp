<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Specialist'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Schedules'), ['controller' => 'Schedules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Schedule'), ['controller' => 'Schedules', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="specialists index large-9 medium-8 columns content">
    <h3><?= __('Specialists') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('specialty') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($specialists as $specialist): ?>
            <tr>
                <td><?= $this->Number->format($specialist->id) ?></td>
                <td><?= h($specialist->name) ?></td>
                <td><?= h($specialist->last_name) ?></td>
                <td><?= h($specialist->specialty) ?></td>
                <td><?= h($specialist->phone) ?></td>
                <td><?= h($specialist->email) ?></td>
                <td><?= h($specialist->active) ?></td>
                <td><?= h($specialist->created) ?></td>
                <td><?= h($specialist->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $specialist->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $specialist->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $specialist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $specialist->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>



<?php
$session = $this->request->session();
$user_data = $session->read('Auth.User.role');
if(!empty($user_data)){
    if($user_data != 'ROLE_ADMIN'){
        echo "
        <style> 
    .actions{
        visibility: hidden;
    }
    
</style>
        ";
//        $this->redirect('/admin');
    }

}


?>
