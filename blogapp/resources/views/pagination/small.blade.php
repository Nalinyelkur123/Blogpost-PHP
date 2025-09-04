<?php

if ($paginator->hasPages()) {
?>
    <nav role="navigation" aria-label="Pagination Navigation" style="display:flex; gap:8px; align-items:center; font-size:12px;">
        <?php if (!$paginator->onFirstPage()) { ?>
            <a href="<?= $paginator->previousPageUrl() ?>" rel="prev" style="padding:6px 8px; border:1px solid #e2e8f0; border-radius:6px; text-decoration:none; color:#0f172a;">«</a>
        <?php } else { ?>
            <span style="padding:6px 8px; border:1px solid #e2e8f0; border-radius:6px; color:#94a3b8;">«</span>
        <?php } ?>

        <?php foreach ($elements as $element) { ?>
            <?php if (is_string($element)) { ?>
                <span style="padding:6px 8px; color:#94a3b8;">...</span>
            <?php } ?>

            <?php if (is_array($element)) { ?>
                <?php foreach ($element as $page => $url) { ?>
                    <?php if ($page == $paginator->currentPage()) { ?>
                        <span style="padding:6px 8px; border:1px solid #0ea5e9; background:#e0f2fe; border-radius:6px; color:#0369a1; font-weight:600;"><?= $page ?></span>
                    <?php } else { ?>
                        <a href="<?= $url ?>" style="padding:6px 8px; border:1px solid #e2e8f0; border-radius:6px; text-decoration:none; color:#0f172a;"><?= $page ?></a>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        <?php } ?>

        <?php if ($paginator->hasMorePages()) { ?>
            <a href="<?= $paginator->nextPageUrl() ?>" rel="next" style="padding:6px 8px; border:1px solid #e2e8f0; border-radius:6px; text-decoration:none; color:#0f172a;">»</a>
        <?php } else { ?>
            <span style="padding:6px 8px; border:1px solid #e2e8f0; border-radius:6px; color:#94a3b8;">»</span>
        <?php } ?>
    </nav>
<?php }
