<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Schedule'), ['action' => 'edit', $schedule->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Schedule'), ['action' => 'delete', $schedule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $schedule->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Schedules'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Schedule'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Specialists'), ['controller' => 'Specialists', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Specialist'), ['controller' => 'Specialists', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sesions'), ['controller' => 'Sesions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sesion'), ['controller' => 'Sesions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="schedules view large-9 medium-8 columns content">
    <h3><?= h($schedule->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Specialist') ?></th>
            <td><?= $schedule->has('specialist') ? $this->Html->link($schedule->specialist->name, ['controller' => 'Specialists', 'action' => 'view', $schedule->specialist->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sesion') ?></th>
            <td><?= $schedule->has('sesion') ? $this->Html->link($schedule->sesion->id, ['controller' => 'Sesions', 'action' => 'view', $schedule->sesion->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($schedule->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($schedule->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($schedule->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($schedule->modified) ?></td>
        </tr>
    </table>
</div>
