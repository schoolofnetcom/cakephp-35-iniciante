<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading">Ações</li>
        <li><?php echo $this->Html->link('Listar Páginas', ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
    <h3>Visualizando página</h3>
    <ul>
        <li><?php echo $page->title; ?></li>
        <li>/<?php echo $page->url; ?></li>
        <li><?php echo $page->body; ?></li>
        <li><?php echo $page->title_url; ?></li>
    </ul>
</div>
