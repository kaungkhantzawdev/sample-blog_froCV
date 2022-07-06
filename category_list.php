<table class="table table-hover table-bordered mt-3">
    <thead>
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>User</th>
        <th>Control</th>
        <th>Created</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach (categories() as $cat){ ?>
            <tr class="<?php echo $cat['ordering']==1?'table-info':''; ?>">
                <td><?php echo $cat['id'] ; ?></td>
                <td><?php echo $cat['title'] ; ?></td>
                <td><?php echo user($cat['user_id'])['name'] ; ?></td>
                <td>
                    <a href="category_update.php?id=<?php echo $cat['id'] ; ?>" class="btn btn-sm btn-outline-warning">
                        <i class="feather-edit-2 fa-fw"></i>
                    </a>
                    <a href="category_delete.php?id=<?php echo $cat['id'] ; ?>"
                       onclick="return confirm('Are you sure to delete.')"
                       class="btn btn-sm btn-outline-danger">
                        <i class="feather-trash-2 fa-fw"></i>
                    </a>
                    <?php if($cat['ordering']==1){ ?>
                        <a href="category_pinOut.php?id=<?php echo $cat['id'] ; ?>" class="btn btn-sm btn-outline-info">
                            <i class="feather-download fa-fw"></i>
                        </a>

                    <?php }else{ ?>
                        <a href="category_pin.php?id=<?php echo $cat['id'] ; ?>" class="btn btn-sm btn-outline-info">
                            <i class="feather-upload fa-fw"></i>
                        </a>
                    <?php } ?>

                </td>
                <td><?php echo dateTime($cat['created_at']) ; ?></td>
            </tr>
        <?php
            }
        ?>
    </tbody>
</table>
