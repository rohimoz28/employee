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
                    <button type="button" class="btn btn-info btn-sm" onclick="edit('<?= $employee->id ?>')">Update</button>
                    <button type="button" class="btn btn-danger btn-sm" onclick="destroy('<?= $employee->id ?>')">Delete</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#table_list').DataTable()
    })

    function edit(id) {
        $.ajax({
            type: "POST",
            url: "<?= site_url('employee/edit') ?>",
            dataType: "json",
            data: {
                id
            },
            success: function(response) {
                if (response.success) {
                    $('.view_modal').html(response.success).show()
                    $('#Modal_Edit').modal('show')
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
            }
        })
    }
</script>