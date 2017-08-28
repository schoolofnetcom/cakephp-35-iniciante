<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading">Ações</li>
        <li><?php echo $this->Html->link('Nova Página', ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
    <h3>Páginas</h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>titulo</th>
                <th>url</th>
                <th>ação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pages as $page): ?>
                <tr>
                    <td><?php echo $page->title; ?></td>
                    <td><?php echo $page->url; ?></td>
                    <td>
                        <?php echo $this->Html->link('ver', '/pages/view/' . $page->id); ?>
                        <?php echo $this->Html->link('edit', ['action' => 'edit', $page->id]); ?>
                        <?php echo $this->Form->postLink('Remover', ['action'=>'delete', $page->id], ['confirm'=>'Você tem certeza que quer remover ' . $page->title . ' ?']); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?php echo $this->Paginator->first('<< ' . __('first')) ?>
            <?php echo $this->Paginator->prev('< ' . __('previous')) ?>
            <?php echo $this->Paginator->numbers() ?>
            <?php echo $this->Paginator->next(__('next') . ' >') ?>
            <?php echo $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?php echo $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, exibindo {{current}} registro(s) de um total de {{count}}')]) ?></p>
    </div>
</div>
