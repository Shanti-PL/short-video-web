<div class="container">
    <div class="col-4 offset-4">
        <br />
        <h2 class="text-center">All comments</h2>
        <tbody>
        <?php foreach($query as $row): ?>
        <ul>   
            <td><?php echo $row->id; ?></td>
            <td><?php echo $row->username; ?></td>
            <td><?php echo $row->comment; ?></td>
        </ul>
        <?php endforeach; ?>
        </tbody>

    </div>
</div>
