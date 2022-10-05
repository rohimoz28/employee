<table class="table table-striped" id="table_list">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th>NIK</th>
            <th>Name</th>
            <th>mobile</th>
            <th style="text-align: right;">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($employees as $employee) : ?>
            <tr>
                <th scope="row"><?= $no++ ?></th>
                <td><?= $employee->nik ?></td>
                <td><?= $employee->name ?></td>
                <td><?= $employee->mobile ?></td>
                <td style="text-align: right;">
                    <a href="" class="btn btn-info btn-sm">Edit</a>
                    <a href="" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#table_list').DataTable()
    })
</script>