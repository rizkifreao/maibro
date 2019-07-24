<?php
    $user = $this->UserModels->getDetail($this->session->userdata('user_id'));
    
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->

        <div class="user-panel" style="margin-bottom: 15px">
            <div class="pull-left image">
                <img src="<?php echo base_url('public').'/web/user-profile/'.$this->UserModels->getDetail($this->session->userdata('user_id'))->avatar;?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info" >
                <?php
                    $userid = $this->session->userdata('user_id');
                    $user = $this->UserModels->getDetail($userid);
                    $id_bank = $user->id_bank;
                ?>
                <p style="white-space: normal;"><?php echo ($this->ion_auth->is_admin()) ? 'Maibro' : $this->BankModels->getDetail($user->id_bank)->nama_bank ; ?></p>
                <p><?= $user->first_name ?>  </p>
            </div>
        </div>

        <!-- search form -->                    
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header ">NAVIGASI UTAMA</li>     
                <?php
                if ($this->ion_auth->is_admin()) {
                    $main = $this->db->get_where('tb_menu', array('parent' => 0, 'role' => 'Admin'));
                    foreach ($main->result() as $m) {
                        // chek ada submenu atau tidak
                        $sub = $this->db->get_where('tb_menu', array('parent' => $m->id_menu));
                        if ($sub->num_rows() > 0) {
                            // buat menu + sub menu
                            $uri = $this->uri->segment(1);
                            $idclass = $this->db->get_where('tb_menu', array('link' => $uri))->row_array();
                            if ($m->id_menu == $idclass['parent']) {
                                $class = "<li class ='treeview active'>";
                            } else {
                                $class = "<li class ='treeview'>";
                            }
                            echo $class . anchor($m->link, '<i class="' . $m->icon . '"></i>
                            <span>' . $m->nama_menu . '</span>
                            <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>');
                            echo "<ul class='treeview-menu'>";
                            foreach ($sub->result() as $s) {
                                $uri = $this->uri->segment(1);
                                $uri2 = $this->uri->segment(2);
                                if ($s->link == $uri) {
                                    $class1 = "active";
                                } else {
                                    $class1 = "";
                                }
                                echo '<li class=' . $class1 . '>' . anchor($s->link, '<i class="' . $s->icon . '"></i>' . $s->nama_menu) . '</li>';
                            }
                            echo "</ul>";
                            echo '</li>';
                        } else {
                            // single menu
                            $uri = $this->uri->segment(1);
                            if ($m->link == $uri) {
                                $class2 = "active";
                            } else {
                                $class2 = "";
                            }
                            echo '<li class=' . $class2 . '>' . anchor($m->link, '<i class="' . $m->icon . '">
                            </i>  <span>' . $m->nama_menu . '</span>') . '</li>';
                        }
                    }

                    echo '<li class="header">MENU ADMIN</li> ';
                    $admin = $this->db->get_where('tb_menu', array('parent' => 0, 'role' => 'Administrator'));
                    foreach ($admin->result() as $m) {
                        // chek ada submenu atau tidak
                        $sub = $this->db->get_where('tb_menu', array('parent' => $m->id_menu));
                        if ($sub->num_rows() > 0) {
                            // buat menu + sub menu
                            $uri = $this->uri->segment(1);
                            $idclass = $this->db->get_where('tb_menu', array('link' => $uri))->row_array();
                            if ($m->id_menu == $idclass['parent']) {
                                $class = "<li class ='treeview active'>";
                            } else {
                                $class = "<li class ='treeview'>";
                            }
                            echo $class . anchor($m->link, '<i class="' . $m->icon . '"></i>
                                <span>' . $m->nama_menu . '</span>
                                <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>');
                            echo "<ul class='treeview-menu'>";
                            foreach ($sub->result() as $s) {
                                $uri = $this->uri->segment(1);
                                if ($s->link == $uri) {
                                    $class1 = "active";
                                } else {
                                    $class1 = "";
                                }
                                echo '<li class=' . $class1 . '>' . anchor($s->link, '<i class="' . $s->icon . '"></i>' . $s->nama_menu) . '</li>';
                            }
                            echo "</ul>";
                            echo '</li>';
                        } else {
                            // single menu
                            $uri = $this->uri->segment(1);
                            if ($m->link == $uri) {
                                $class2 = "active";
                            } else {
                                $class2 = "";
                            }
                            echo '<li class=' . $class2 . '>' . anchor($m->link, '<i class="' . $m->icon . '">
                                </i>  <span>' . $m->nama_menu . '</span>') . '</li>';
                        }
                    }
                } else {
                    $main = $this->db->get_where('tb_menu', array('parent' => 0, 'role' => 'Admin'));
                    foreach ($main->result() as $m) {
                        // chek ada submenu atau tidak
                        $sub = $this->db->get_where('tb_menu', array('parent' => $m->id_menu));
                        if ($sub->num_rows() > 0) {
                            // buat menu + sub menu
                            $uri = $this->uri->segment(1);
                            $idclass = $this->db->get_where('tb_menu', array('link' => $uri))->row_array();
                            if ($m->id_menu == $idclass['parent']) {
                                $class = "<li class ='treeview active'>";
                            } else {
                                $class = "<li class ='treeview'>";
                            }
                            echo $class . anchor($m->link, '<i class="' . $m->icon . '"></i>
                            <span>' . $m->nama_menu . '</span>
                            <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>');
                            echo "<ul class='treeview-menu'>";
                            foreach ($sub->result() as $s) {
                                $uri = $this->uri->segment(1);
                                if ($s->link == $uri) {
                                    $class1 = "active";
                                } else {
                                    $class1 = "";
                                }
                                echo '<li class=' . $class1 . '>' . anchor($s->link, '<i class="' . $s->icon . '"></i>' . $s->nama_menu) . '</li>';
                            }
                            echo "</ul>";
                            echo '</li>';
                        } else {
                            // single menu
                            $uri = $this->uri->segment(1);
                            if ($m->link == $uri) {
                                $class2 = "active";
                            } else {
                                $class2 = "";
                            }
                            echo '<li class=' . $class2 . '>' . anchor($m->link, '<i class="' . $m->icon . '">
                            </i>  <span>' . $m->nama_menu . '</span>') . '</li>';
                        }
                    }
                }
                ?>

        </ul><!--/.nav-list-->             
    </section>
    <!-- /.sidebar -->
</aside>
