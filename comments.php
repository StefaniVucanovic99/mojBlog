<?php ?>

<div class="blog-post-comments"> 
    <h5>Komentari</h5>
    <ul>
        
        <?php 
            $commentsql = "SELECT * FROM comments WHERE Post_id = $id";
            $comments = getDataFromDatabase($connection, $commentsql);
            foreach ($comments as $comment) {
            ?>
            <li>
                <span> Postavio: <strong><?php echo $comment['Author']?> </strong></span>
                <div>
                    <?php echo $comment['Text']?>
                </div>
        
                </li>
            <br>
            <?php }?>
    </ul>
</div>