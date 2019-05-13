<aside class="main-sidebar no-print" >
    <section class="sidebar"> 
        <div class="" align="center" style="margin-top:14px" ></div> 

        <ul class="sidebar-menu">
            <?php 
            foreach ($menus as $menu) {
                if(empty($menu->children))
                {
                    ?>
                    <li class="">
                        <?= $this->Html->link($this->Html->tag('i', '', ['class'=>$menu->icon_class_name]).' '.$this->Html->tag('span', $menu->menu_name),['controller'=>$menu->controller,'action'=>$menu->action,$menu->query_string],['escape'=>false]) ?>
                    </li>
                    <?php
                }
                else if(!empty($menu->children))
                {
                    ?>
                    <li class="treeview">
                        <?= $this->Html->link($this->Html->tag('i', '', ['class'=>$menu->icon_class_name]).' '.$this->Html->tag('span', $menu->menu_name).$this->Html->tag('span', $this->Html->tag('i', '', ['class'=>'fa fa-angle-left pull-right']), ['class'=>'pull-right-container']),'javascript:;',['escape'=>false]) ?>
                        <ul class="treeview-menu">
                    <?php
                    foreach ($menu->children as $childrenMenu) {
                        if(!empty($childrenMenu->children))
                        {
                            ?>
                            <li class="treeview">
                                <?= $this->Html->link($this->Html->tag('i', '', ['class'=>$childrenMenu->icon_class_name]).' '.$this->Html->tag('span', $childrenMenu->menu_name).$this->Html->tag('span', $this->Html->tag('i', '', ['class'=>'fa fa-angle-left pull-right']), ['class'=>'pull-right-container']),'javascript:;',['escape'=>false]) ?>
                                <ul class="treeview-menu">
                                <?php
                                foreach ($childrenMenu->children as $childrenSubMenu) {
                                    ?>
                                    <li class="">
                                        <?= $this->Html->link($this->Html->tag('i', '', ['class'=>$childrenSubMenu->icon_class_name]).' '.$this->Html->tag('span', $childrenSubMenu->menu_name),['controller'=>$childrenSubMenu->controller,'action'=>$childrenSubMenu->action,$childrenSubMenu->query_string],['escape'=>false]) ?>
                                    </li>
                                    <?php
                                }
                                ?>
                                </ul>
                            </li>
                            <?php
                        }
                        else
                        {
                            ?>
                            <li class="">
                                <?= $this->Html->link($this->Html->tag('i', '', ['class'=>$childrenMenu->icon_class_name]).' '.$this->Html->tag('span', $childrenMenu->menu_name),['controller'=>$childrenMenu->controller,'action'=>$childrenMenu->action,$childrenMenu->query_string],['escape'=>false]) ?>
                            </li>
                            <?php
                        }
                            
                    }
                    ?>
                        </ul>
                    </li>
                    <?php
                }
            }
            ?>
            <div align="center" style="margin-top:20px">   
                <a class="btn" style="background: #FF6468;color: #fff;border-radius: 4px;width: 111px;" href="<?= $this->Url->build(['controller'=>'Logins','action' =>'logout'])?>"><i class="fa fa-sign-out"></i> Logout</a>
            </div>
        </ul>
    </section>
</aside>