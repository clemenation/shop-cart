<ul>
    <h5>BÁN HÀNG ONLINE</h5>
    <?php foreach ($sales as $item): ?>
          <li>
          <div class="desc">
            <a href="<?php if($item->type == 'yahoo') echo 'ymsgr:sendim?' . $item->username; else echo 'skype:' . $item->username . '?chat' ; ?>"><img width="125" border="0" src="http://opi.yahoo.com/online?u=<?php echo $item->username ?>&amp;m=g&amp;t=2" alt="<?php echo $item->username ?>" title="<?php echo $item->username ?>"/></a>            
          </div>
          </li>
    <?php endforeach; ?>
</ul>
<ul>
    <h5>HỖ TRỢ KĨ THUẬT</h5>
    <?php foreach ($supports as $item): ?>
          <li>          
          <div class="desc">
            <a href="<?php if($item->type == 'yahoo') echo 'ymsgr:sendim?' . $item->username; else echo 'skype:' . $item->username . '?chat' ; ?>"><img width="125" border="0" src="http://opi.yahoo.com/online?u=<?php echo $item->username ?>&amp;m=g&amp;t=2" alt="<?php echo $item->username ?>" title="<?php echo $item->username ?>"/></a>           
          </div>
          </li>
    <?php endforeach; ?>
</ul>