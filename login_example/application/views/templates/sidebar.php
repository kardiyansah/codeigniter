<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-code"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Example Project</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider">


<!-- query from menu -->
<?php 

    $role_id = $this->session->userdata('role_id');
    $query_menu = "SELECT `user_menu`.`id`, `menu` 
                FROM `user_menu` JOIN `user_access_menu` 
                ON `user_menu`.`id` = `user_access_menu`.`menu_id` 
                WHERE `user_access_menu`.`role_id` = $role_id 
            ORDER BY `user_access_menu`.`menu_id` ASC
            "; 

    $menu = $this->db->query($query_menu)->result_array();

?>


<!-- looping menu -->
<?php foreach($menu as $row) : ?>
<!-- Heading -->
<div class="sidebar-heading">
    <?= $row['menu']; ?>
</div>

<!-- looping sub menu -->

<?php 

    $menu_id = $row['id'];
    $query_sub_menu = "SELECT * 
                FROM `user_sub_menu` JOIN `user_menu` 
                ON `user_sub_menu`.`menu_id` = `user_menu`.`id` 
            WHERE `user_sub_menu`.`menu_id` = $menu_id AND 
            `user_sub_menu`.`is_active` = 1
            ";
    $sub_menu = $this->db->query($query_sub_menu)->result_array();

?>

    <?php foreach($sub_menu as $row) : ?>
    <!-- Nav Item -->
    <?php if( $row['title'] == $title ) : ?>
        <li class="nav-item active">
    <?php else : ?>
        <li class="nav-item">
    <?php endif; ?>
        <?php if( $row['title'] == 'Logout' ) : ?>
            <a class="nav-link pb-1" href="<?= base_url() . $row['url']; ?>" data-toggle="modal" data-target="#logoutModal">
        <?php else : ?>
            <a class="nav-link pb-1" href="<?= base_url() . $row['url']; ?>">
        <?php endif; ?>
            <i class="<?= $row['icon']; ?>"></i>
            <span><?= $row['title']; ?></span></a>
    </li>
    <?php endforeach; ?>
    <!-- Divider -->
    <hr class="sidebar-divider mt-2">

<?php endforeach; ?>


<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->