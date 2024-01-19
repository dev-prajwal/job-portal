<div class="pagination-list text-center" id="pagination" ></br></br>
    
    <?php if(($total > $start) && ($total < $limit)): ?>
        <button class="btn btn-primary btn-block"  style="height: 30px;font-size: 14px;" onclick="loadCan(<?= $limit ?>,<?= $start ?>)">Load More</button>     
    <?php else: ?>        
        <h6>End of result set!</h6>
    <?php endif; ?>
</div>