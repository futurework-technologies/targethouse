<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>


<div class="content">
    <div class="header">

        <h1 class="page-title">Add News</h1>
        <ul class="breadcrumb">
            <li class="active">Add News</li>
        </ul>

    </div>
    <div class="main-content">


        <div>
            <form method="post">
                <div class="well">
                    <div class="row">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-default">Save</button>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table table-bordered table-responsive table-striped">
                            <tbody>
                <?php 
                $cnt = 0;
        foreach ($entries as $entry) {
            ?>
                                <tr>
                                    <td width='50%'>
                        <?php echo $entry['msgid']; ?>
                                    </td>
                                    <td>
                                        <input name="data[<?php echo $cnt; ?>][msgid]" type="hidden" value="<?php echo $entry['msgid']; ?>" />
                                        <textarea style="width: 100%" name="data[<?php echo $cnt; ?>][msgstr]"><?php echo $entry['msgstr'][0]; ?></textarea>
                                    </td>
                                </tr>
        <?php $cnt++; } ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-default">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>