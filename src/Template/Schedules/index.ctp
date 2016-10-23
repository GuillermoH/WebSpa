<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Schedule'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Specialists'), ['controller' => 'Specialists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Specialist'), ['controller' => 'Specialists', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sesions'), ['controller' => 'Sesions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sesion'), ['controller' => 'Sesions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="schedules index large-9 medium-8 columns content">
    <h3><?= __('Schedules') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('specialist_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sesion_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($schedules as $schedule): ?>
            <tr>
                <td><?= $this->Number->format($schedule->id) ?></td>
                <td><?= h($schedule->date) ?></td>
                <td><?= $schedule->has('specialist') ? $this->Html->link($schedule->specialist->name, ['controller' => 'Specialists', 'action' => 'view', $schedule->specialist->id]) : '' ?></td>
                <td><?= $schedule->has('sesion') ? $this->Html->link($schedule->sesion->id, ['controller' => 'Sesions', 'action' => 'view', $schedule->sesion->id]) : '' ?></td>
                <td><?= h($schedule->created) ?></td>
                <td><?= h($schedule->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $schedule->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $schedule->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $schedule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $schedule->id)]) ?>
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
