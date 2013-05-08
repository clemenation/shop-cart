<ul>
    <?php foreach ($reports as $item): ?>
          <li>
            <a href="/files/docs/<?php echo $item->file ?>"><?php echo $item->title ?></a>
          </li>
    <?php endforeach; ?>
</ul>